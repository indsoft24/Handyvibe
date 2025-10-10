@extends('layouts.admin')

@section('title', 'Profile')

@section('content')
    <div class="grid grid-cols-12 gap-4 md:gap-6">
        <!-- Page Header -->
        <div class="col-span-12">
            <div class="flex items-center justify-between">
                <div>
                    <h1 class="text-2xl font-bold text-black dark:text-white">Profile</h1>
                    <p class="text-sm text-gray-600 dark:text-gray-400">Manage your admin profile information</p>
                </div>
            </div>
        </div>

        <!-- Profile Form -->
        <div class="col-span-12 xl:col-span-8">
            <div class="rounded-sm border border-stroke bg-white shadow-default dark:border-strokedark dark:bg-boxdark">
                <div class="border-b border-stroke px-7 py-4 dark:border-strokedark">
                    <h3 class="font-medium text-black dark:text-white">Profile Information</h3>
                </div>
                <div class="p-7">
                    <form method="POST" action="{{ route('admin.profile.update') }}">
                        @csrf

                        <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
                            <div>
                                <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                                    Name <span class="text-red-500">*</span>
                                </label>
                                <input type="text"
                                    class="w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary {{ $errors->has('name') ? 'border-red-500' : '' }}"
                                    name="name" value="{{ old('name', Auth::guard('admin')->user()->name) }}"
                                    placeholder="Enter your name" required>
                                @error('name')
                                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                                    Email <span class="text-red-500">*</span>
                                </label>
                                <input type="email"
                                    class="w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary {{ $errors->has('email') ? 'border-red-500' : '' }}"
                                    name="email" value="{{ old('email', Auth::guard('admin')->user()->email) }}"
                                    placeholder="Enter your email" required>
                                @error('email')
                                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="mt-4">
                            <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                                Mobile
                            </label>
                            <input type="text"
                                class="w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary {{ $errors->has('mobile') ? 'border-red-500' : '' }}"
                                name="mobile" value="{{ old('mobile', Auth::guard('admin')->user()->mobile) }}"
                                placeholder="Enter your mobile number">
                            @error('mobile')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mt-6 flex justify-end space-x-3">
                            <button type="submit"
                                class="inline-flex items-center justify-center rounded-md bg-primary px-4 py-2 text-center font-medium text-white hover:bg-opacity-90">
                                <svg class="mr-2 h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7"></path>
                                </svg>
                                Update Profile
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Change Password -->
            <div
                class="mt-6 rounded-sm border border-stroke bg-white shadow-default dark:border-strokedark dark:bg-boxdark">
                <div class="border-b border-stroke px-7 py-4 dark:border-strokedark">
                    <h3 class="font-medium text-black dark:text-white">Change Password</h3>
                </div>
                <div class="p-7">
                    <form method="POST" action="{{ route('admin.profile.update') }}">
                        @csrf
                        <input type="hidden" name="action" value="change_password">

                        <div class="grid grid-cols-1 gap-4 md:grid-cols-3">
                            <div>
                                <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                                    Current Password <span class="text-red-500">*</span>
                                </label>
                                <input type="password"
                                    class="w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary {{ $errors->has('current_password') ? 'border-red-500' : '' }}"
                                    name="current_password" placeholder="Enter current password" required>
                                @error('current_password')
                                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                                    New Password <span class="text-red-500">*</span>
                                </label>
                                <input type="password"
                                    class="w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary {{ $errors->has('password') ? 'border-red-500' : '' }}"
                                    name="password" placeholder="Enter new password" required>
                                @error('password')
                                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                                    Confirm Password <span class="text-red-500">*</span>
                                </label>
                                <input type="password"
                                    class="w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary {{ $errors->has('password_confirmation') ? 'border-red-500' : '' }}"
                                    name="password_confirmation" placeholder="Confirm new password" required>
                                @error('password_confirmation')
                                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="mt-6 flex justify-end space-x-3">
                            <button type="submit"
                                class="inline-flex items-center justify-center rounded-md bg-primary px-4 py-2 text-center font-medium text-white hover:bg-opacity-90">
                                <svg class="mr-2 h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z">
                                    </path>
                                </svg>
                                Change Password
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Profile Info -->
        <div class="col-span-12 xl:col-span-4">
            <div class="rounded-sm border border-stroke bg-white shadow-default dark:border-strokedark dark:bg-boxdark">
                <div class="border-b border-stroke px-7 py-4 dark:border-strokedark">
                    <h3 class="font-medium text-black dark:text-white">Profile Information</h3>
                </div>
                <div class="p-7">
                    <div class="text-center">
                        <div class="mx-auto mb-4 h-20 w-20 rounded-full bg-primary/10 flex items-center justify-center">
                            <svg class="h-10 w-10 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z">
                                </path>
                            </svg>
                        </div>
                        <h4 class="text-lg font-semibold text-black dark:text-white">
                            {{ Auth::guard('admin')->user()->name }}</h4>
                        <p class="text-sm text-gray-500 dark:text-gray-400">{{ Auth::guard('admin')->user()->email }}</p>
                        <p class="text-sm text-gray-500 dark:text-gray-400">{{ Auth::guard('admin')->user()->mobile }}</p>

                        <div class="mt-4 flex justify-center">
                            <span
                                class="inline-flex items-center rounded-full bg-green-100 px-2.5 py-0.5 text-xs font-medium text-green-800">
                                {{ ucfirst(Auth::guard('admin')->user()->role) }}
                            </span>
                        </div>

                        @if (Auth::guard('admin')->user()->last_login_at)
                            <div class="mt-4 text-center">
                                <p class="text-xs text-gray-500 dark:text-gray-400">Last Login</p>
                                <p class="text-sm text-black dark:text-white">
                                    {{ Auth::guard('admin')->user()->last_login_at->format('M d, Y H:i') }}
                                </p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Account Status -->
            <div
                class="mt-4 rounded-sm border border-stroke bg-white shadow-default dark:border-strokedark dark:bg-boxdark">
                <div class="border-b border-stroke px-7 py-4 dark:border-strokedark">
                    <h3 class="font-medium text-black dark:text-white">Account Status</h3>
                </div>
                <div class="p-7">
                    <div class="space-y-3">
                        <div class="flex items-center justify-between">
                            <span class="text-sm text-gray-600 dark:text-gray-400">Status</span>
                            <span
                                class="inline-flex items-center rounded-full px-2.5 py-0.5 text-xs font-medium {{ Auth::guard('admin')->user()->status ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                {{ Auth::guard('admin')->user()->status ? 'Active' : 'Inactive' }}
                            </span>
                        </div>
                        <div class="flex items-center justify-between">
                            <span class="text-sm text-gray-600 dark:text-gray-400">Role</span>
                            <span
                                class="text-sm font-medium text-black dark:text-white">{{ ucfirst(Auth::guard('admin')->user()->role) }}</span>
                        </div>
                        <div class="flex items-center justify-between">
                            <span class="text-sm text-gray-600 dark:text-gray-400">Member Since</span>
                            <span
                                class="text-sm font-medium text-black dark:text-white">{{ Auth::guard('admin')->user()->created_at->format('M d, Y') }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
