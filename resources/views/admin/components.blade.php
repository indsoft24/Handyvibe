@extends('layouts.admin')

@section('title', 'Components')

@section('content')
    <div class="space-y-6">
        <!-- Alerts -->
        <div class="rounded-lg border border-gray-200 bg-white p-6 shadow-sm dark:border-gray-800 dark:bg-black">
            <h3 class="mb-4 text-lg font-semibold text-gray-900 dark:text-white">Alerts</h3>
            <div class="space-y-4">
                <div class="rounded-md bg-green-50 p-4 dark:bg-green-900/20">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <svg class="h-5 w-5 text-green-400" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                    clip-rule="evenodd" />
                            </svg>
                        </div>
                        <div class="ml-3">
                            <p class="text-sm font-medium text-green-800 dark:text-green-200">Success!</p>
                            <p class="mt-1 text-sm text-green-700 dark:text-green-300">Your operation completed
                                successfully.</p>
                        </div>
                    </div>
                </div>

                <div class="rounded-md bg-red-50 p-4 dark:bg-red-900/20">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <svg class="h-5 w-5 text-red-400" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"
                                    clip-rule="evenodd" />
                            </svg>
                        </div>
                        <div class="ml-3">
                            <p class="text-sm font-medium text-red-800 dark:text-red-200">Error!</p>
                            <p class="mt-1 text-sm text-red-700 dark:text-red-300">Something went wrong. Please try again.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Buttons -->
        <div class="rounded-lg border border-gray-200 bg-white p-6 shadow-sm dark:border-gray-800 dark:bg-black">
            <h3 class="mb-4 text-lg font-semibold text-gray-900 dark:text-white">Buttons</h3>
            <div class="space-y-4">
                <div class="flex flex-wrap gap-2">
                    <button
                        class="rounded-md bg-primary px-4 py-2 text-sm font-medium text-white hover:bg-primary/90">Primary</button>
                    <button
                        class="rounded-md bg-gray-600 px-4 py-2 text-sm font-medium text-white hover:bg-gray-700">Secondary</button>
                    <button
                        class="rounded-md bg-green-600 px-4 py-2 text-sm font-medium text-white hover:bg-green-700">Success</button>
                    <button
                        class="rounded-md bg-red-600 px-4 py-2 text-sm font-medium text-white hover:bg-red-700">Danger</button>
                </div>
                <div class="flex flex-wrap gap-2">
                    <button
                        class="rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-300 dark:hover:bg-gray-700">Outline</button>
                    <button
                        class="rounded-md border border-primary bg-transparent px-4 py-2 text-sm font-medium text-primary hover:bg-primary hover:text-white">Ghost</button>
                </div>
            </div>
        </div>

        <!-- Badges -->
        <div class="rounded-lg border border-gray-200 bg-white p-6 shadow-sm dark:border-gray-800 dark:bg-black">
            <h3 class="mb-4 text-lg font-semibold text-gray-900 dark:text-white">Badges</h3>
            <div class="flex flex-wrap gap-2">
                <span
                    class="inline-flex items-center rounded-full bg-green-100 px-2.5 py-0.5 text-xs font-medium text-green-800 dark:bg-green-900 dark:text-green-200">Active</span>
                <span
                    class="inline-flex items-center rounded-full bg-red-100 px-2.5 py-0.5 text-xs font-medium text-red-800 dark:bg-red-900 dark:text-red-200">Inactive</span>
                <span
                    class="inline-flex items-center rounded-full bg-blue-100 px-2.5 py-0.5 text-xs font-medium text-blue-800 dark:bg-blue-900 dark:text-blue-200">New</span>
                <span
                    class="inline-flex items-center rounded-full bg-yellow-100 px-2.5 py-0.5 text-xs font-medium text-yellow-800 dark:bg-yellow-900 dark:text-yellow-200">Pending</span>
            </div>
        </div>
    </div>
@endsection
