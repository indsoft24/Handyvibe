@extends('layouts.admin')

@section('title', 'Badges')

@section('content')
    <div class="space-y-6">
        <div class="rounded-lg border border-gray-200 bg-white p-6 shadow-sm dark:border-gray-800 dark:bg-black">
            <h3 class="mb-4 text-lg font-semibold text-gray-900 dark:text-white">Badge Components</h3>

            <div class="space-y-6">
                <!-- Basic Badges -->
                <div>
                    <h4 class="mb-3 text-sm font-medium text-gray-900 dark:text-white">Basic Badges</h4>
                    <div class="flex flex-wrap gap-2">
                        <span
                            class="inline-flex items-center rounded-full bg-gray-100 px-2.5 py-0.5 text-xs font-medium text-gray-800 dark:bg-gray-700 dark:text-gray-200">Default</span>
                        <span
                            class="inline-flex items-center rounded-full bg-primary px-2.5 py-0.5 text-xs font-medium text-white">Primary</span>
                        <span
                            class="inline-flex items-center rounded-full bg-green-100 px-2.5 py-0.5 text-xs font-medium text-green-800 dark:bg-green-900 dark:text-green-200">Success</span>
                        <span
                            class="inline-flex items-center rounded-full bg-blue-100 px-2.5 py-0.5 text-xs font-medium text-blue-800 dark:bg-blue-900 dark:text-blue-200">Info</span>
                        <span
                            class="inline-flex items-center rounded-full bg-yellow-100 px-2.5 py-0.5 text-xs font-medium text-yellow-800 dark:bg-yellow-900 dark:text-yellow-200">Warning</span>
                        <span
                            class="inline-flex items-center rounded-full bg-red-100 px-2.5 py-0.5 text-xs font-medium text-red-800 dark:bg-red-900 dark:text-red-200">Danger</span>
                    </div>
                </div>

                <!-- Status Badges -->
                <div>
                    <h4 class="mb-3 text-sm font-medium text-gray-900 dark:text-white">Status Badges</h4>
                    <div class="flex flex-wrap gap-2">
                        <span
                            class="inline-flex items-center rounded-full bg-green-100 px-2.5 py-0.5 text-xs font-medium text-green-800 dark:bg-green-900 dark:text-green-200">Active</span>
                        <span
                            class="inline-flex items-center rounded-full bg-red-100 px-2.5 py-0.5 text-xs font-medium text-red-800 dark:bg-red-900 dark:text-red-200">Inactive</span>
                        <span
                            class="inline-flex items-center rounded-full bg-yellow-100 px-2.5 py-0.5 text-xs font-medium text-yellow-800 dark:bg-yellow-900 dark:text-yellow-200">Pending</span>
                        <span
                            class="inline-flex items-center rounded-full bg-blue-100 px-2.5 py-0.5 text-xs font-medium text-blue-800 dark:bg-blue-900 dark:text-blue-200">Processing</span>
                        <span
                            class="inline-flex items-center rounded-full bg-purple-100 px-2.5 py-0.5 text-xs font-medium text-purple-800 dark:bg-purple-900 dark:text-purple-200">Completed</span>
                    </div>
                </div>

                <!-- Badges with Icons -->
                <div>
                    <h4 class="mb-3 text-sm font-medium text-gray-900 dark:text-white">Badges with Icons</h4>
                    <div class="flex flex-wrap gap-2">
                        <span
                            class="inline-flex items-center rounded-full bg-green-100 px-2.5 py-0.5 text-xs font-medium text-green-800 dark:bg-green-900 dark:text-green-200">
                            <svg class="mr-1 h-3 w-3" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                    clip-rule="evenodd" />
                            </svg>
                            Verified
                        </span>
                        <span
                            class="inline-flex items-center rounded-full bg-red-100 px-2.5 py-0.5 text-xs font-medium text-red-800 dark:bg-red-900 dark:text-red-200">
                            <svg class="mr-1 h-3 w-3" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"
                                    clip-rule="evenodd" />
                            </svg>
                            Error
                        </span>
                        <span
                            class="inline-flex items-center rounded-full bg-blue-100 px-2.5 py-0.5 text-xs font-medium text-blue-800 dark:bg-blue-900 dark:text-blue-200">
                            <svg class="mr-1 h-3 w-3" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                                    clip-rule="evenodd" />
                            </svg>
                            Info
                        </span>
                    </div>
                </div>

                <!-- Different Sizes -->
                <div>
                    <h4 class="mb-3 text-sm font-medium text-gray-900 dark:text-white">Different Sizes</h4>
                    <div class="flex flex-wrap items-center gap-2">
                        <span
                            class="inline-flex items-center rounded-full bg-primary px-1.5 py-0.5 text-xs font-medium text-white">Small</span>
                        <span
                            class="inline-flex items-center rounded-full bg-primary px-2.5 py-0.5 text-xs font-medium text-white">Medium</span>
                        <span
                            class="inline-flex items-center rounded-full bg-primary px-3 py-1 text-sm font-medium text-white">Large</span>
                    </div>
                </div>

                <!-- Removable Badges -->
                <div>
                    <h4 class="mb-3 text-sm font-medium text-gray-900 dark:text-white">Removable Badges</h4>
                    <div class="flex flex-wrap gap-2">
                        <span
                            class="inline-flex items-center rounded-full bg-gray-100 px-2.5 py-0.5 text-xs font-medium text-gray-800 dark:bg-gray-700 dark:text-gray-200">
                            Filter 1
                            <button type="button"
                                class="ml-1 inline-flex h-3 w-3 items-center justify-center rounded-full text-gray-400 hover:bg-gray-200 hover:text-gray-500 dark:hover:bg-gray-600 dark:hover:text-gray-300">
                                <svg class="h-2 w-2" fill="currentColor" viewBox="0 0 8 8">
                                    <path d="m0 0 4 4 4-4z" />
                                </svg>
                            </button>
                        </span>
                        <span
                            class="inline-flex items-center rounded-full bg-primary px-2.5 py-0.5 text-xs font-medium text-white">
                            Filter 2
                            <button type="button"
                                class="ml-1 inline-flex h-3 w-3 items-center justify-center rounded-full text-white hover:bg-primary/80">
                                <svg class="h-2 w-2" fill="currentColor" viewBox="0 0 8 8">
                                    <path d="m0 0 4 4 4-4z" />
                                </svg>
                            </button>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
