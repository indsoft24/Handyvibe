@extends('layouts.admin')

@section('title', 'Edit User')

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
                    <h1 class="text-2xl font-bold text-gray-900 dark:text-white">Edit User</h1>
                    <p class="text-sm text-gray-600 dark:text-gray-400">Update user information</p>
                </div>
            </div>
            <div class="flex items-center space-x-2">
                <a href="{{ route('admin.users.show', $user) }}" class="inline-flex items-center px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors">
                    <svg class="h-4 w-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                    </svg>
                    View User
                </a>
                <a href="{{ route('admin.users.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-600 text-white rounded-lg hover:bg-gray-700 transition-colors">
                    <svg class="h-4 w-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                    Back to Users
                </a>
            </div>
        </div>
    </div>

    <!-- Edit User Form -->
    <form method="POST" action="{{ route('admin.users.update', $user) }}" class="space-y-6">
        @csrf
        @method('PUT')
        
        <!-- Basic Information -->
        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6">
            <div class="border-b border-gray-200 dark:border-gray-700 pb-4 mb-6">
                <h3 class="font-semibold text-lg text-gray-900 dark:text-white">Basic Information</h3>
                <p class="text-sm text-gray-600 dark:text-gray-400 mt-1">Update user's basic details.</p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-semibold text-gray-900 dark:text-white mb-2">Full Name <span class="text-red-500">*</span></label>
                    <input type="text" name="name" value="{{ old('name', $user->name) }}" required class="w-full rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 px-4 py-3 text-gray-900 dark:text-white transition-colors focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500 {{ $errors->has('name') ? 'border-red-500' : '' }}">
                    @error('name')<p class="mt-2 text-sm text-red-600">{{ $message }}</p>@enderror
                </div>
                <div>
                    <label class="block text-sm font-semibold text-gray-900 dark:text-white mb-2">Email Address <span class="text-red-500">*</span></label>
                    <input type="email" name="email" value="{{ old('email', $user->email) }}" required class="w-full rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 px-4 py-3 text-gray-900 dark:text-white transition-colors focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500 {{ $errors->has('email') ? 'border-red-500' : '' }}">
                    @error('email')<p class="mt-2 text-sm text-red-600">{{ $message }}</p>@enderror
                </div>
            </div>
            <div class="mt-6">
                <label class="block text-sm font-semibold text-gray-900 dark:text-white mb-2">Mobile Number</label>
                <input type="text" name="mobile" value="{{ old('mobile', $user->mobile) }}" class="w-full rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 px-4 py-3 text-gray-900 dark:text-white transition-colors focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500 {{ $errors->has('mobile') ? 'border-red-500' : '' }}">
                @error('mobile')<p class="mt-2 text-sm text-red-600">{{ $message }}</p>@enderror
            </div>
        </div>

        <!-- User Type & Status -->
        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6">
            <div class="border-b border-gray-200 dark:border-gray-700 pb-4 mb-6">
                <h3 class="font-semibold text-lg text-gray-900 dark:text-white">User Type & Status</h3>
                <p class="text-sm text-gray-600 dark:text-gray-400 mt-1">Set user type and account status.</p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-semibold text-gray-900 dark:text-white mb-2">User Type <span class="text-red-500">*</span></label>
                    <select name="user_type" required class="w-full rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 px-4 py-3 text-gray-900 dark:text-white transition-colors focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500 {{ $errors->has('user_type') ? 'border-red-500' : '' }}">
                        <option value="">Select User Type</option>
                        @foreach($userTypes as $type)
                            <option value="{{ $type }}" {{ old('user_type', $user->user_type) == $type ? 'selected' : '' }}>{{ ucfirst($type) }}</option>
                        @endforeach
                    </select>
                    @error('user_type')<p class="mt-2 text-sm text-red-600">{{ $message }}</p>@enderror
                </div>
                <div>
                    <label class="block text-sm font-semibold text-gray-900 dark:text-white mb-2">Account Status</label>
                    <div class="flex items-center space-x-4">
                        <label class="flex items-center">
                            <input type="radio" name="status" value="1" {{ old('status', $user->status) ? 'checked' : '' }} class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300">
                            <span class="ml-2 text-sm text-gray-900 dark:text-white">Active</span>
                        </label>
                        <label class="flex items-center">
                            <input type="radio" name="status" value="0" {{ !old('status', $user->status) ? 'checked' : '' }} class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300">
                            <span class="ml-2 text-sm text-gray-900 dark:text-white">Inactive</span>
                        </label>
                    </div>
                    @error('status')<p class="mt-2 text-sm text-red-600">{{ $message }}</p>@enderror
                </div>
            </div>
        </div>

        <!-- Password Reset -->
        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6">
            <div class="border-b border-gray-200 dark:border-gray-700 pb-4 mb-6">
                <h3 class="font-semibold text-lg text-gray-900 dark:text-white">Password Reset</h3>
                <p class="text-sm text-gray-600 dark:text-gray-400 mt-1">Leave password fields empty to keep current password.</p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-semibold text-gray-900 dark:text-white mb-2">New Password</label>
                    <input type="password" name="password" class="w-full rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 px-4 py-3 text-gray-900 dark:text-white transition-colors focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500 {{ $errors->has('password') ? 'border-red-500' : '' }}">
                    <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">Minimum 8 characters</p>
                    @error('password')<p class="mt-2 text-sm text-red-600">{{ $message }}</p>@enderror
                </div>
                <div>
                    <label class="block text-sm font-semibold text-gray-900 dark:text-white mb-2">Confirm Password</label>
                    <input type="password" name="password_confirmation" class="w-full rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 px-4 py-3 text-gray-900 dark:text-white transition-colors focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500">
                </div>
            </div>
        </div>

        <!-- Current Information -->
        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6">
            <div class="border-b border-gray-200 dark:border-gray-700 pb-4 mb-6">
                <h3 class="font-semibold text-lg text-gray-900 dark:text-white">Current Information</h3>
                <p class="text-sm text-gray-600 dark:text-gray-400 mt-1">Reference information about this user.</p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-medium text-gray-500 dark:text-gray-400">User ID</label>
                    <p class="mt-1 text-sm text-gray-900 dark:text-white">{{ $user->id }}</p>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-500 dark:text-gray-400">Email Verification</label>
                    <p class="mt-1 text-sm text-gray-900 dark:text-white">
                        @if($user->email_verified_at)
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200">
                                Verified on {{ $user->email_verified_at->format('M d, Y') }}
                            </span>
                        @else
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-200">
                                Not Verified
                            </span>
                        @endif
                    </p>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-500 dark:text-gray-400">Account Created</label>
                    <p class="mt-1 text-sm text-gray-900 dark:text-white">{{ $user->created_at->format('M d, Y H:i') }}</p>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-500 dark:text-gray-400">Last Updated</label>
                    <p class="mt-1 text-sm text-gray-900 dark:text-white">{{ $user->updated_at->format('M d, Y H:i') }}</p>
                </div>
            </div>
        </div>

        <!-- Submit Button -->
        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6">
            <div class="flex justify-end">
                <button type="submit" class="inline-flex items-center justify-center px-6 py-3 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition-colors font-semibold">
                    <svg class="h-5 w-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                    Update User
                </button>
            </div>
        </div>
    </form>
</div>
@endsection
