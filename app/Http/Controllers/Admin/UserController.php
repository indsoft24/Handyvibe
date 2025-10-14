<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    /**
     * Display a listing of users
     */
    public function index(Request $request)
    {
        $query = User::query();

        // Filter by status
        if ($request->filled('status')) {
            $query->where('status', $request->status === 'active');
        }

        // Filter by user type
        if ($request->filled('user_type')) {
            $query->where('user_type', $request->user_type);
        }

        // Search
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%")
                    ->orWhere('mobile', 'like', "%{$search}%");
            });
        }

        // Sort
        $sortBy = $request->get('sort_by', 'created_at');
        $sortOrder = $request->get('sort_order', 'desc');
        $query->orderBy($sortBy, $sortOrder);

        $users = $query->paginate(15);

        // Statistics
        $stats = [
            'total' => User::count(),
            'active' => User::active()->count(),
            'inactive' => User::inactive()->count(),
            'verified' => User::whereNotNull('email_verified_at')->count(),
            'unverified' => User::whereNull('email_verified_at')->count(),
            'by_type' => User::selectRaw('user_type, COUNT(*) as count')
                ->groupBy('user_type')
                ->pluck('count', 'user_type')
                ->toArray(),
            'recent' => User::where('created_at', '>=', now()->subDays(7))->count(),
            'this_month' => User::whereMonth('created_at', now()->month)
                ->whereYear('created_at', now()->year)
                ->count(),
        ];

        // User types for filter
        $userTypes = User::select('user_type')
            ->distinct()
            ->whereNotNull('user_type')
            ->pluck('user_type')
            ->toArray();

        return view('admin.users.index', compact('users', 'stats', 'userTypes'));
    }

    /**
     * Display the specified user
     */
    public function show(User $user)
    {
        // Load user with related data
        $user->load([]);

        // Get user statistics
        $userStats = [
            'total_logins' => 0, // You can implement login tracking
            'last_login' => null, // You can implement login tracking
            'profile_completion' => $this->calculateProfileCompletion($user),
            'account_age' => $user->created_at->diffInDays(now()),
        ];

        return view('admin.users.show', compact('user', 'userStats'));
    }

    /**
     * Show the form for editing the specified user
     */
    public function edit(User $user)
    {
        $userTypes = ['customer', 'vendor', 'contractor', 'business', 'individual'];

        return view('admin.users.edit', compact('user', 'userTypes'));
    }

    /**
     * Update the specified user
     */
    public function update(Request $request, User $user)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => [
                'required',
                'email',
                'max:255',
                Rule::unique('users')->ignore($user->id),
            ],
            'mobile' => 'nullable|string|max:20',
            'user_type' => 'required|in:customer,vendor,contractor,business,individual',
            'status' => 'boolean',
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $data = $request->only(['name', 'email', 'mobile', 'user_type', 'status']);

        // Handle password update
        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        $user->update($data);

        return redirect()->route('admin.users.show', $user)
            ->with('success', 'User updated successfully!');
    }

    /**
     * Remove the specified user
     */
    public function destroy(User $user)
    {
        // Prevent admin from deleting themselves
        if ($user->id === auth('admin')->id()) {
            return redirect()->back()
                ->with('error', 'You cannot delete your own account!');
        }

        $user->delete();

        return redirect()->route('admin.users.index')
            ->with('success', 'User deleted successfully!');
    }

    /**
     * Toggle user status
     */
    public function toggleStatus(User $user)
    {
        // Prevent admin from deactivating themselves
        if ($user->id === auth('admin')->id()) {
            return response()->json([
                'success' => false,
                'message' => 'You cannot deactivate your own account!',
            ]);
        }

        $user->update(['status' => ! $user->status]);

        $message = $user->status ? 'User activated successfully!' : 'User deactivated successfully!';

        return response()->json([
            'success' => true,
            'message' => $message,
            'status' => $user->status,
        ]);
    }

    /**
     * Verify user email
     */
    public function verifyEmail(User $user)
    {
        $user->update(['email_verified_at' => now()]);

        return response()->json([
            'success' => true,
            'message' => 'User email verified successfully!',
        ]);
    }

    /**
     * Unverify user email
     */
    public function unverifyEmail(User $user)
    {
        $user->update(['email_verified_at' => null]);

        return response()->json([
            'success' => true,
            'message' => 'User email verification removed!',
        ]);
    }

    /**
     * Reset user password
     */
    public function resetPassword(Request $request, User $user)
    {
        $validator = Validator::make($request->all(), [
            'password' => 'required|string|min:8|confirmed',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation failed',
                'errors' => $validator->errors(),
            ]);
        }

        $user->update(['password' => Hash::make($request->password)]);

        return response()->json([
            'success' => true,
            'message' => 'Password reset successfully!',
        ]);
    }

    /**
     * Calculate profile completion percentage
     */
    private function calculateProfileCompletion(User $user)
    {
        $fields = ['name', 'email', 'mobile', 'user_type'];
        $completed = 0;

        foreach ($fields as $field) {
            if (! empty($user->$field)) {
                $completed++;
            }
        }

        return round(($completed / count($fields)) * 100);
    }

    /**
     * Get user statistics for dashboard
     */
    public function getStats()
    {
        try {
            // Check if user is authenticated as admin
            if (! auth()->guard('admin')->check()) {
                return response()->json(['error' => 'Unauthorized'], 401);
            }

            $stats = [
                'total' => User::count(),
                'active' => User::active()->count(),
                'inactive' => User::inactive()->count(),
                'verified' => User::whereNotNull('email_verified_at')->count(),
                'unverified' => User::whereNull('email_verified_at')->count(),
                'by_type' => User::selectRaw('user_type, COUNT(*) as count')
                    ->groupBy('user_type')
                    ->pluck('count', 'user_type')
                    ->toArray(),
                'recent' => User::where('created_at', '>=', now()->subDays(7))->count(),
                'this_month' => User::whereMonth('created_at', now()->month)
                    ->whereYear('created_at', now()->year)
                    ->count(),
                'growth_rate' => $this->calculateGrowthRate(),
            ];

            return response()->json($stats);
        } catch (\Exception $e) {
            \Log::error('Error getting user stats: '.$e->getMessage());

            return response()->json(['error' => 'Failed to get stats'], 500);
        }
    }

    /**
     * Calculate user growth rate
     */
    private function calculateGrowthRate()
    {
        $currentMonth = User::whereMonth('created_at', now()->month)
            ->whereYear('created_at', now()->year)
            ->count();

        $lastMonth = User::whereMonth('created_at', now()->subMonth()->month)
            ->whereYear('created_at', now()->subMonth()->year)
            ->count();

        if ($lastMonth == 0) {
            return $currentMonth > 0 ? 100 : 0;
        }

        return round((($currentMonth - $lastMonth) / $lastMonth) * 100, 2);
    }
}
