<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    /**
     * Show admin login form
     */
    public function showLoginForm()
    {
        return view('admin.auth.login');
    }

    /**
     * Handle admin login
     */
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if (Auth::guard('admin')->attempt($credentials, $request->filled('remember'))) {
            $admin = Auth::guard('admin')->user();
            
            // Check if admin is active
            if (!$admin->isActive()) {
                Auth::guard('admin')->logout();
                return redirect()->back()
                    ->withErrors(['email' => 'Your account is inactive. Please contact support.'])
                    ->withInput();
            }

            // Update last login
            $admin->update(['last_login_at' => now()]);

            $request->session()->regenerate();
            return redirect()->intended(route('admin.dashboard'));
        }

        return redirect()->back()
            ->withErrors(['email' => 'The provided credentials do not match our records.'])
            ->withInput();
    }

    /**
     * Handle admin logout
     */
    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('admin.login');
    }

    /**
     * Show admin profile
     */
    public function profile()
    {
        $admin = Auth::guard('admin')->user();
        return view('admin.auth.profile', compact('admin'));
    }

    /**
     * Update admin profile
     */
    public function updateProfile(Request $request)
    {
        $admin = Auth::guard('admin')->user();

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:admins,email,' . $admin->id,
            'mobile' => 'nullable|string|max:20',
            'current_password' => 'required_with:password',
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Verify current password if changing password
        if ($request->filled('password')) {
            if (!Hash::check($request->current_password, $admin->password)) {
                return redirect()->back()
                    ->withErrors(['current_password' => 'Current password is incorrect.'])
                    ->withInput();
            }
        }

        $updateData = [
            'name' => $request->name,
            'email' => $request->email,
            'mobile' => $request->mobile,
        ];

        if ($request->filled('password')) {
            $updateData['password'] = Hash::make($request->password);
        }

        $admin->update($updateData);

        return redirect()->back()->with('success', 'Profile updated successfully!');
    }
}
