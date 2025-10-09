@extends('layouts.admin')

@section('title', 'Profile')

@section('content')
    <!-- Breadcrumb Start -->
    <div x-data="{ pageName: 'Profile' }">
        @include('admin.partials.breadcrumb')
    </div>
    <!-- Breadcrumb End -->

    <div class="grid grid-cols-12 gap-4 md:gap-6">
        <!-- Profile Card Start -->
        <div class="col-span-12 xl:col-span-4">
            <div
                class="overflow-hidden rounded-2xl border border-gray-200 bg-white px-5 pt-5 dark:border-gray-800 dark:bg-white/[0.03] sm:px-6 sm:pt-6">
                <div class="flex flex-col items-center">
                    <div class="relative">
                        <img src="{{ asset('images/person1.jpg') }}" alt="Profile" class="h-24 w-24 rounded-full" />
                        <button
                            class="absolute bottom-0 right-0 flex h-7 w-7 items-center justify-center rounded-full bg-brand-500 text-white hover:bg-brand-600">
                            <svg class="fill-current" width="12" height="12" viewBox="0 0 12 12" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M6 2C6.55228 2 7 2.44772 7 3V4H8C8.55228 4 9 4.44772 9 5C9 5.55228 8.55228 6 8 6H7V7C7 7.55228 6.55228 8 6 8C5.44772 8 5 7.55228 5 7V6H4C3.44772 6 3 5.55228 3 5C3 4.44772 3.44772 4 4 4H5V3C5 2.44772 5.44772 2 6 2Z"
                                    fill="" />
                            </svg>
                        </button>
                    </div>

                    <h3 class="mt-4 text-xl font-semibold text-gray-800 dark:text-white/90">
                        Thomas Anree
                    </h3>
                    <p class="text-sm text-gray-500 dark:text-gray-400">UX Designer</p>

                    <div class="mt-6 flex w-full flex-col gap-3">
                        <button @click="isProfileInfoModal = true"
                            class="flex items-center justify-center gap-2 rounded-lg border border-gray-200 bg-white px-4 py-2.5 text-sm font-medium text-gray-700 hover:bg-gray-50 dark:border-gray-800 dark:bg-gray-900 dark:text-gray-300 dark:hover:bg-gray-800">
                            <svg class="fill-current" width="16" height="16" viewBox="0 0 16 16" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M8 0C3.58172 0 0 3.58172 0 8C0 12.4183 3.58172 16 8 16C12.4183 16 16 12.4183 16 8C16 3.58172 12.4183 0 8 0ZM8 1.5C11.5899 1.5 14.5 4.41015 14.5 8C14.5 11.5899 11.5899 14.5 8 14.5C4.41015 14.5 1.5 11.5899 1.5 8C1.5 4.41015 4.41015 1.5 8 1.5ZM8 4C7.44772 4 7 4.44772 7 5C7 5.55228 7.44772 6 8 6C8.55228 6 9 5.55228 9 5C9 4.44772 8.55228 4 8 4ZM8 7.5C7.44772 7.5 7 7.94772 7 8.5V12C7 12.5523 7.44772 13 8 13C8.55228 13 9 12.5523 9 12V8.5C9 7.94772 8.55228 7.5 8 7.5Z"
                                    fill="" />
                            </svg>
                            Edit Profile
                        </button>
                        <button @click="isProfileAddressModal = true"
                            class="flex items-center justify-center gap-2 rounded-lg border border-gray-200 bg-white px-4 py-2.5 text-sm font-medium text-gray-700 hover:bg-gray-50 dark:border-gray-800 dark:bg-gray-900 dark:text-gray-300 dark:hover:bg-gray-800">
                            <svg class="fill-current" width="16" height="16" viewBox="0 0 16 16" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M8 0C3.58172 0 0 3.58172 0 8C0 12.4183 3.58172 16 8 16C12.4183 16 16 12.4183 16 8C16 3.58172 12.4183 0 8 0ZM8 1.5C11.5899 1.5 14.5 4.41015 14.5 8C14.5 11.5899 11.5899 14.5 8 14.5C4.41015 14.5 1.5 11.5899 1.5 8C1.5 4.41015 4.41015 1.5 8 1.5ZM8 4C7.44772 4 7 4.44772 7 5C7 5.55228 7.44772 6 8 6C8.55228 6 9 5.55228 9 5C9 4.44772 8.55228 4 8 4ZM8 7.5C7.44772 7.5 7 7.94772 7 8.5V12C7 12.5523 7.44772 13 8 13C8.55228 13 9 12.5523 9 12V8.5C9 7.94772 8.55228 7.5 8 7.5Z"
                                    fill="" />
                            </svg>
                            Edit Address
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Profile Card End -->

        <!-- Profile Information Start -->
        <div class="col-span-12 xl:col-span-8">
            <div
                class="overflow-hidden rounded-2xl border border-gray-200 bg-white px-5 pt-5 dark:border-gray-800 dark:bg-white/[0.03] sm:px-6 sm:pt-6">
                <h3 class="text-lg font-semibold text-gray-800 dark:text-white/90">
                    Profile Information
                </h3>

                <div class="mt-6 grid grid-cols-1 gap-4 sm:grid-cols-2">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                            First Name
                        </label>
                        <input type="text" value="Thomas"
                            class="mt-2 w-full rounded-lg border border-gray-200 bg-white px-4 py-2.5 text-sm font-medium text-gray-800 focus:border-brand-500 focus:outline-none dark:border-gray-800 dark:bg-gray-900 dark:text-white dark:focus:border-brand-500"
                            readonly />
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                            Last Name
                        </label>
                        <input type="text" value="Anree"
                            class="mt-2 w-full rounded-lg border border-gray-200 bg-white px-4 py-2.5 text-sm font-medium text-gray-800 focus:border-brand-500 focus:outline-none dark:border-gray-800 dark:bg-gray-900 dark:text-white dark:focus:border-brand-500"
                            readonly />
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                            Email
                        </label>
                        <input type="email" value="thomas@example.com"
                            class="mt-2 w-full rounded-lg border border-gray-200 bg-white px-4 py-2.5 text-sm font-medium text-gray-800 focus:border-brand-500 focus:outline-none dark:border-gray-800 dark:bg-gray-900 dark:text-white dark:focus:border-brand-500"
                            readonly />
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                            Phone
                        </label>
                        <input type="tel" value="+1 (555) 123-4567"
                            class="mt-2 w-full rounded-lg border border-gray-200 bg-white px-4 py-2.5 text-sm font-medium text-gray-800 focus:border-brand-500 focus:outline-none dark:border-gray-800 dark:bg-gray-900 dark:text-white dark:focus:border-brand-500"
                            readonly />
                    </div>
                    <div class="sm:col-span-2">
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                            Bio
                        </label>
                        <textarea rows="4"
                            class="mt-2 w-full rounded-lg border border-gray-200 bg-white px-4 py-2.5 text-sm font-medium text-gray-800 focus:border-brand-500 focus:outline-none dark:border-gray-800 dark:bg-gray-900 dark:text-white dark:focus:border-brand-500"
                            readonly>Experienced UX designer with a passion for creating intuitive and user-friendly interfaces. I love working with cross-functional teams to deliver exceptional user experiences.</textarea>
                    </div>
                </div>
            </div>
        </div>
        <!-- Profile Information End -->
    </div>
@endsection
