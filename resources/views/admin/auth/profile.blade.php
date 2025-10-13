@extends('layouts.admin')

@section('title', 'Profile')

@section('content')
    <div class="space-y-6">
        <!-- Page Header -->
        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6">
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                <div class="flex items-center space-x-3">
                    <div class="p-2 bg-indigo-100 dark:bg-indigo-900 rounded-lg">
                        <svg class="h-6 w-6 text-indigo-600 dark:text-indigo-400" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                    </div>
                    <div>
                        <h1 class="text-2xl font-bold text-gray-900 dark:text-white">Profile</h1>
                        <p class="text-sm text-gray-600 dark:text-gray-400">Manage your admin profile and password</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Content Grid -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            <!-- Left Column: Forms -->
            <div class="lg:col-span-1 space-y-6">
                <!-- Profile Information Form -->
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6">
                    <div class="border-b border-gray-200 dark:border-gray-700 pb-4 mb-6">
                        <h3 class="font-semibold text-lg text-gray-900 dark:text-white">Profile Information</h3>
                        <p class="text-sm text-gray-600 dark:text-gray-400 mt-1">Update your personal details.</p>
                    </div>
                    <form method="POST" action="{{ route('admin.profile.update') }}" enctype="multipart/form-data"
                        autocomplete="off">
                        @csrf
                        <input type="hidden" name="action" value="update_profile">

                        <!-- Avatar Upload Section -->
                        <div class="mb-6">
                            <label class="block text-sm font-semibold text-gray-900 dark:text-white mb-2">Profile
                                Picture</label>
                            <div class="flex items-center space-x-4">
                                <div
                                    class="h-16 w-16 rounded-full overflow-hidden bg-gray-100 dark:bg-gray-700 flex items-center justify-center">
                                    @if (Auth::guard('admin')->user()->avatar)
                                        <img src="{{ asset('storage/' . Auth::guard('admin')->user()->avatar) }}"
                                            alt="{{ Auth::guard('admin')->user()->name }}"
                                            class="w-full h-full object-cover">
                                    @else
                                        <div
                                            class="w-full h-full bg-primary text-white rounded-full flex items-center justify-center text-lg font-semibold">
                                            {{ strtoupper(substr(Auth::guard('admin')->user()->name, 0, 2)) }}
                                        </div>
                                    @endif
                                </div>
                                <div class="flex-1">
                                    <input type="file" name="avatar" accept="image/*"
                                        class="w-full rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 px-4 py-2 text-gray-900 dark:text-white transition-colors focus:border-blue-500 focus:ring-2 focus:ring-blue-500 {{ $errors->has('avatar') ? 'border-red-500' : '' }}">
                                    <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">JPG, PNG, GIF up to 2MB</p>
                                    @error('avatar')
                                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-semibold text-gray-900 dark:text-white mb-2">Name <span
                                        class="text-red-500">*</span></label>
                                <input type="text" name="name"
                                    value="{{ old('name', Auth::guard('admin')->user()->name) }}" required
                                    class="w-full rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 px-4 py-3 text-gray-900 dark:text-white transition-colors focus:border-blue-500 focus:ring-2 focus:ring-blue-500 {{ $errors->has('name') ? 'border-red-500' : '' }}">
                                @error('name')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <label class="block text-sm font-semibold text-gray-900 dark:text-white mb-2">Email Address
                                    <span class="text-red-500">*</span></label>
                                <input type="email" name="email"
                                    value="{{ old('email', Auth::guard('admin')->user()->email) }}" required
                                    class="w-full rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 px-4 py-3 text-gray-900 dark:text-white transition-colors focus:border-blue-500 focus:ring-2 focus:ring-blue-500 {{ $errors->has('email') ? 'border-red-500' : '' }}">
                                @error('email')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="mt-6">
                            <label class="block text-sm font-semibold text-gray-900 dark:text-white mb-2">Mobile
                                Number</label>
                            <input type="text" name="mobile"
                                value="{{ old('mobile', Auth::guard('admin')->user()->mobile) }}"
                                class="w-full rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 px-4 py-3 text-gray-900 dark:text-white transition-colors focus:border-blue-500 focus:ring-2 focus:ring-blue-500 {{ $errors->has('mobile') ? 'border-red-500' : '' }}">
                            @error('mobile')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mt-8 flex justify-end pt-6 border-t border-gray-200 dark:border-gray-700">
                            <button type="submit"
                                class="inline-flex items-center justify-center rounded-lg bg-gradient-to-r from-blue-600 to-blue-700 px-6 py-3 font-semibold text-white shadow-lg transition-all duration-200 hover:from-blue-700 hover:to-blue-800 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800">
                                Save Changes
                            </button>
                        </div>
                    </form>
                </div>

                <!-- Change Password Form -->
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6">
                    <div class="border-b border-gray-200 dark:border-gray-700 pb-4 mb-6">
                        <h3 class="font-semibold text-lg text-gray-900 dark:text-white">Change Password</h3>
                        <p class="text-sm text-gray-600 dark:text-gray-400 mt-1">Update your account password.</p>
                    </div>
                    <form method="POST" action="{{ route('admin.profile.update') }}" autocomplete="off">
                        @csrf
                        <input type="hidden" name="action" value="change_password">
                        <div class="space-y-6">
                            <div>
                                <label class="block text-sm font-semibold text-gray-900 dark:text-white mb-2">Current
                                    Password <span class="text-red-500">*</span></label>
                                <input type="password" name="current_password" required
                                    class="w-full rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 px-4 py-3 text-gray-900 dark:text-white transition-colors focus:border-blue-500 focus:ring-2 focus:ring-blue-500 {{ $errors->has('current_password') ? 'border-red-500' : '' }}">
                                @error('current_password')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                                <div>
                                    <label class="block text-sm font-semibold text-gray-900 dark:text-white mb-2">New
                                        Password <span class="text-red-500">*</span></label>
                                    <input type="password" name="password" required
                                        class="w-full rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 px-4 py-3 text-gray-900 dark:text-white transition-colors focus:border-blue-500 focus:ring-2 focus:ring-blue-500 {{ $errors->has('password') ? 'border-red-500' : '' }}">
                                    @error('password')
                                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div>
                                    <label class="block text-sm font-semibold text-gray-900 dark:text-white mb-2">Confirm
                                        New Password <span class="text-red-500">*</span></label>
                                    <input type="password" name="password_confirmation" required
                                        class="w-full rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 px-4 py-3 text-gray-900 dark:text-white transition-colors focus:border-blue-500 focus:ring-2 focus:ring-blue-500">
                                </div>
                            </div>
                        </div>
                        <div class="mt-8 flex justify-end pt-6 border-t border-gray-200 dark:border-gray-700">
                            <button type="submit"
                                class="inline-flex items-center justify-center rounded-lg bg-gradient-to-r from-gray-600 to-gray-700 px-6 py-3 font-semibold text-white shadow-lg transition-all duration-200 hover:from-gray-700 hover:to-gray-800 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800">
                                Update Password
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Right Column: Profile Summary -->
            <div class="space-y-6">
                <div
                    class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6">
                    <div class="text-center">
                        <div
                            class="mx-auto mb-4 h-24 w-24 rounded-full overflow-hidden border-4 border-white dark:border-gray-800 shadow-md">
                            @if (Auth::guard('admin')->user()->avatar)
                                <img src="{{ asset('storage/' . Auth::guard('admin')->user()->avatar) }}"
                                    alt="{{ Auth::guard('admin')->user()->name }}" class="w-full h-full object-cover">
                            @else
                                <div
                                    class="w-full h-full bg-indigo-100 dark:bg-indigo-900 flex items-center justify-center">
                                    <div
                                        class="w-full h-full bg-primary text-white rounded-full flex items-center justify-center text-2xl font-semibold">
                                        {{ strtoupper(substr(Auth::guard('admin')->user()->name, 0, 2)) }}
                                    </div>
                                </div>
                            @endif
                        </div>
                        <h2 class="text-xl font-bold text-gray-900 dark:text-white">
                            {{ Auth::guard('admin')->user()->name }}</h2>
                        <p class="text-sm text-gray-500 dark:text-gray-400">{{ Auth::guard('admin')->user()->email }}</p>
                        @if (Auth::guard('admin')->user()->mobile)
                            <p class="text-sm text-gray-500 dark:text-gray-400">{{ Auth::guard('admin')->user()->mobile }}
                            </p>
                        @endif
                    </div>

                    <div class="mt-6 border-t border-gray-200 dark:border-gray-700 pt-6">
                        <dl class="space-y-4">
                            <div class="flex justify-between items-center">
                                <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Role</dt>
                                <dd
                                    class="text-sm font-semibold text-gray-900 dark:text-white bg-blue-100 dark:bg-blue-900 text-blue-700 dark:text-blue-200 px-2 py-0.5 rounded-md">
                                    {{ ucfirst(Auth::guard('admin')->user()->role) }}</dd>
                            </div>
                            <div class="flex justify-between items-center">
                                <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Status</dt>
                                <dd
                                    class="inline-flex items-center rounded-full px-2.5 py-0.5 text-xs font-medium {{ Auth::guard('admin')->user()->status ? 'bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200' : 'bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-200' }}">
                                    {{ Auth::guard('admin')->user()->status ? 'Active' : 'Inactive' }}
                                </dd>
                            </div>
                            <div class="flex justify-between items-center">
                                <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Member Since</dt>
                                <dd class="text-sm text-gray-900 dark:text-white">
                                    {{ Auth::guard('admin')->user()->created_at->format('M d, Y') }}</dd>
                            </div>
                            @if (Auth::guard('admin')->user()->last_login_at)
                                <div class="flex justify-between items-center">
                                    <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Last Login</dt>
                                    <dd class="text-sm text-gray-900 dark:text-white">
                                        {{ Auth::guard('admin')->user()->last_login_at->format('M d, Y') }}</dd>
                                </div>
                            @endif
                        </dl>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
