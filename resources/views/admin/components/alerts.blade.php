@extends('layouts.admin')

@section('title', 'Alerts')

@section('content')
    <div class="space-y-6">
        <div class="rounded-lg border border-gray-200 bg-white p-6 shadow-sm dark:border-gray-800 dark:bg-black">
            <h3 class="mb-4 text-lg font-semibold text-gray-900 dark:text-white">Alert Components</h3>

            <div class="space-y-4">
                <!-- Success Alert -->
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
                            <h3 class="text-sm font-medium text-green-800 dark:text-green-200">Success!</h3>
                            <div class="mt-2 text-sm text-green-700 dark:text-green-300">
                                <p>Your operation completed successfully. All changes have been saved.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Error Alert -->
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
                            <h3 class="text-sm font-medium text-red-800 dark:text-red-200">Error!</h3>
                            <div class="mt-2 text-sm text-red-700 dark:text-red-300">
                                <p>Something went wrong. Please check your input and try again.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Warning Alert -->
                <div class="rounded-md bg-yellow-50 p-4 dark:bg-yellow-900/20">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <svg class="h-5 w-5 text-yellow-400" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z"
                                    clip-rule="evenodd" />
                            </svg>
                        </div>
                        <div class="ml-3">
                            <h3 class="text-sm font-medium text-yellow-800 dark:text-yellow-200">Warning!</h3>
                            <div class="mt-2 text-sm text-yellow-700 dark:text-yellow-300">
                                <p>Please review your changes before proceeding. This action cannot be undone.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Info Alert -->
                <div class="rounded-md bg-blue-50 p-4 dark:bg-blue-900/20">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <svg class="h-5 w-5 text-blue-400" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                                    clip-rule="evenodd" />
                            </svg>
                        </div>
                        <div class="ml-3">
                            <h3 class="text-sm font-medium text-blue-800 dark:text-blue-200">Information</h3>
                            <div class="mt-2 text-sm text-blue-700 dark:text-blue-300">
                                <p>This is an informational message. Please read carefully before proceeding.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
