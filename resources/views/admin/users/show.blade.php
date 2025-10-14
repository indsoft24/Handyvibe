@extends('layouts.admin')

@section('title', 'User Details')

@section('content')
    <div class="space-y-6">
        <!-- Page Header -->
        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6">
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                <div class="flex items-center space-x-3">
                    <div class="h-12 w-12 bg-gray-200 dark:bg-gray-600 rounded-full flex items-center justify-center">
                        <span class="text-lg font-medium text-gray-700 dark:text-gray-300">
                            {{ strtoupper(substr($user->name, 0, 2)) }}
                        </span>
                    </div>
                    <div>
                        <h1 class="text-2xl font-bold text-gray-900 dark:text-white">{{ $user->name }}</h1>
                        <p class="text-sm text-gray-600 dark:text-gray-400">User ID: {{ $user->id }}</p>
                    </div>
                </div>
                <div class="flex items-center space-x-2">
                    <a href="{{ route('admin.users.edit', $user) }}"
                        class="inline-flex items-center px-4 py-2 bg-yellow-600 text-white rounded-lg hover:bg-yellow-700 transition-colors">
                        <svg class="h-4 w-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                        </svg>
                        Edit User
                    </a>
                    <a href="{{ route('admin.users.index') }}"
                        class="inline-flex items-center px-4 py-2 bg-gray-600 text-white rounded-lg hover:bg-gray-700 transition-colors">
                        <svg class="h-4 w-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                        </svg>
                        Back to Users
                    </a>
                </div>
            </div>
        </div>

        <!-- User Information -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <!-- Main Information -->
            <div class="lg:col-span-2 space-y-6">
                <!-- Basic Information -->
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Basic Information</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-500 dark:text-gray-400">Full Name</label>
                            <p class="mt-1 text-sm text-gray-900 dark:text-white">{{ $user->name }}</p>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-500 dark:text-gray-400">Email Address</label>
                            <p class="mt-1 text-sm text-gray-900 dark:text-white">{{ $user->email }}</p>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-500 dark:text-gray-400">Mobile Number</label>
                            <p class="mt-1 text-sm text-gray-900 dark:text-white">{{ $user->mobile ?: 'Not provided' }}</p>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-500 dark:text-gray-400">User Type</label>
                            <span
                                class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-indigo-100 text-indigo-800 dark:bg-indigo-900 dark:text-indigo-200 mt-1">
                                {{ ucfirst($user->user_type ?: 'Not Set') }}
                            </span>
                        </div>
                    </div>
                </div>

                <!-- Account Status -->
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Account Status</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-500 dark:text-gray-400">Status</label>
                            <span
                                class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $user->status ? 'bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200' : 'bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-200' }} mt-1">
                                {{ $user->status ? 'Active' : 'Inactive' }}
                            </span>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-500 dark:text-gray-400">Email
                                Verification</label>
                            @if ($user->email_verified_at)
                                <span
                                    class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200 mt-1">
                                    Verified
                                </span>
                            @else
                                <span
                                    class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-200 mt-1">
                                    Unverified
                                </span>
                            @endif
                        </div>
                        @if ($user->email_verified_at)
                            <div>
                                <label class="block text-sm font-medium text-gray-500 dark:text-gray-400">Verified
                                    At</label>
                                <p class="mt-1 text-sm text-gray-900 dark:text-white">
                                    {{ $user->email_verified_at->format('M d, Y H:i') }}</p>
                            </div>
                        @endif
                    </div>
                </div>

                <!-- Profile Completion -->
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Profile Completion</h3>
                    <div class="space-y-4">
                        <div>
                            <div class="flex justify-between text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                                <span>Profile Completion</span>
                                <span>{{ $userStats['profile_completion'] }}%</span>
                            </div>
                            <div class="w-full bg-gray-200 dark:bg-gray-700 rounded-full h-2">
                                <div class="bg-indigo-600 h-2 rounded-full"
                                    style="width: {{ $userStats['profile_completion'] }}%"></div>
                            </div>
                        </div>
                        <div class="grid grid-cols-2 gap-4 text-sm">
                            <div class="flex items-center">
                                <svg class="h-4 w-4 text-green-500 mr-2" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7" />
                                </svg>
                                <span class="text-gray-600 dark:text-gray-400">Name:
                                    {{ $user->name ? 'Complete' : 'Missing' }}</span>
                            </div>
                            <div class="flex items-center">
                                <svg class="h-4 w-4 text-green-500 mr-2" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7" />
                                </svg>
                                <span class="text-gray-600 dark:text-gray-400">Email:
                                    {{ $user->email ? 'Complete' : 'Missing' }}</span>
                            </div>
                            <div class="flex items-center">
                                @if ($user->mobile)
                                    <svg class="h-4 w-4 text-green-500 mr-2" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7" />
                                    </svg>
                                    <span class="text-gray-600 dark:text-gray-400">Mobile: Complete</span>
                                @else
                                    <svg class="h-4 w-4 text-yellow-500 mr-2" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L3.732 16.5c-.77.833.192 2.5 1.732 2.5z" />
                                    </svg>
                                    <span class="text-gray-600 dark:text-gray-400">Mobile: Missing</span>
                                @endif
                            </div>
                            <div class="flex items-center">
                                @if ($user->user_type)
                                    <svg class="h-4 w-4 text-green-500 mr-2" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7" />
                                    </svg>
                                    <span class="text-gray-600 dark:text-gray-400">Type: Complete</span>
                                @else
                                    <svg class="h-4 w-4 text-yellow-500 mr-2" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L3.732 16.5c-.77.833.192 2.5 1.732 2.5z" />
                                    </svg>
                                    <span class="text-gray-600 dark:text-gray-400">Type: Missing</span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="space-y-6">
                <!-- Account Statistics -->
                <div
                    class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Account Statistics</h3>
                    <div class="space-y-3">
                        <div>
                            <label class="block text-sm font-medium text-gray-500 dark:text-gray-400">Account Age</label>
                            <p class="mt-1 text-sm text-gray-900 dark:text-white">{{ $userStats['account_age'] }} days</p>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-500 dark:text-gray-400">Total Logins</label>
                            <p class="mt-1 text-sm text-gray-900 dark:text-white">{{ $userStats['total_logins'] }}</p>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-500 dark:text-gray-400">Last Login</label>
                            <p class="mt-1 text-sm text-gray-900 dark:text-white">
                                {{ $userStats['last_login'] ?: 'Never' }}</p>
                        </div>
                    </div>
                </div>

                <!-- Quick Actions -->
                <div
                    class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Quick Actions</h3>
                    <div class="space-y-2">
                        @if ($user->id !== auth('admin')->id())
                            <button onclick="toggleStatus({{ $user->id }})"
                                class="w-full text-left px-3 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 rounded-lg transition-colors">
                                {{ $user->status ? 'Deactivate' : 'Activate' }} User
                            </button>
                        @endif
                        @if (!$user->email_verified_at)
                            <button onclick="verifyEmail({{ $user->id }})"
                                class="w-full text-left px-3 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 rounded-lg transition-colors">
                                Verify Email
                            </button>
                        @else
                            <button onclick="unverifyEmail({{ $user->id }})"
                                class="w-full text-left px-3 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 rounded-lg transition-colors">
                                Unverify Email
                            </button>
                        @endif
                        <button onclick="resetPassword({{ $user->id }})"
                            class="w-full text-left px-3 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 rounded-lg transition-colors">
                            Reset Password
                        </button>
                        @if ($user->id !== auth('admin')->id())
                            <form method="POST" action="{{ route('admin.users.destroy', $user) }}"
                                onsubmit="return confirm('Are you sure you want to delete this user?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="w-full text-left px-3 py-2 text-sm text-red-600 dark:text-red-400 hover:bg-red-50 dark:hover:bg-red-900 rounded-lg transition-colors">
                                    Delete User
                                </button>
                            </form>
                        @endif
                    </div>
                </div>

                <!-- Timestamps -->
                <div
                    class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Timestamps</h3>
                    <div class="space-y-3">
                        <div>
                            <label class="block text-sm font-medium text-gray-500 dark:text-gray-400">Created</label>
                            <p class="mt-1 text-sm text-gray-900 dark:text-white">
                                {{ $user->created_at->format('M d, Y H:i') }}</p>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-500 dark:text-gray-400">Last Updated</label>
                            <p class="mt-1 text-sm text-gray-900 dark:text-white">
                                {{ $user->updated_at->format('M d, Y H:i') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Reset Password Modal -->
    <div id="resetPasswordModal"
        class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full hidden z-50 flex items-center justify-center">
        <div class="relative p-5 border w-full max-w-md shadow-lg rounded-md bg-white dark:bg-gray-800 mx-4">
            <div class="mt-3">
                <h3 class="text-lg font-medium text-gray-900 dark:text-white mb-4">Reset User Password</h3>
                <form id="resetPasswordForm">
                    @csrf
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">New Password</label>
                        <input type="password" id="new_password" name="password" required
                            class="w-full rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 px-3 py-2 text-gray-900 dark:text-white focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500">
                    </div>
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Confirm
                            Password</label>
                        <input type="password" id="password_confirmation" name="password_confirmation" required
                            class="w-full rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 px-3 py-2 text-gray-900 dark:text-white focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500">
                    </div>
                    <div class="flex justify-end space-x-2">
                        <button type="button" onclick="closeResetPasswordModal()"
                            class="px-4 py-2 bg-gray-300 text-gray-700 rounded-lg hover:bg-gray-400 transition-colors">Cancel</button>
                        <button type="submit"
                            class="px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition-colors">Reset
                            Password</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        let currentUserId = {{ $user->id }};

        function toggleStatus(userId) {
            fetch(`/admin/users/${userId}/toggle-status`, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                        'Accept': 'application/json',
                    },
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        location.reload();
                    } else {
                        alert(data.message || 'Error updating status');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Error updating status');
                });
        }

        function verifyEmail(userId) {
            fetch(`/admin/users/${userId}/verify-email`, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                        'Accept': 'application/json',
                    },
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        location.reload();
                    } else {
                        alert('Error verifying email');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Error verifying email');
                });
        }

        function unverifyEmail(userId) {
            fetch(`/admin/users/${userId}/unverify-email`, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                        'Accept': 'application/json',
                    },
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        location.reload();
                    } else {
                        alert('Error unverifying email');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Error unverifying email');
                });
        }

        function resetPassword(userId) {
            currentUserId = userId;
            document.getElementById('resetPasswordModal').classList.remove('hidden');
        }

        function closeResetPasswordModal() {
            document.getElementById('resetPasswordModal').classList.add('hidden');
            document.getElementById('resetPasswordForm').reset();
        }

        document.getElementById('resetPasswordForm').addEventListener('submit', function(e) {
            e.preventDefault();

            const formData = new FormData(this);

            fetch(`/admin/users/${currentUserId}/reset-password`, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute(
                            'content'),
                        'Accept': 'application/json',
                    },
                    body: formData,
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        alert('Password reset successfully!');
                        closeResetPasswordModal();
                    } else {
                        alert(data.message || 'Error resetting password');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Error resetting password');
                });
        });
    </script>
@endsection
