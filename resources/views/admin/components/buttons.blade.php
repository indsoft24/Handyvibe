@extends('layouts.admin')

@section('title', 'Buttons')

@section('content')
    <div class="space-y-6">
        <div class="rounded-lg border border-gray-200 bg-white p-6 shadow-sm dark:border-gray-800 dark:bg-black">
            <h3 class="mb-4 text-lg font-semibold text-gray-900 dark:text-white">Button Components</h3>

            <div class="space-y-6">
                <!-- Primary Buttons -->
                <div>
                    <h4 class="mb-3 text-sm font-medium text-gray-900 dark:text-white">Primary Buttons</h4>
                    <div class="flex flex-wrap gap-2">
                        <button
                            class="rounded-md bg-primary px-3 py-2 text-sm font-medium text-white hover:bg-primary/90">Small</button>
                        <button
                            class="rounded-md bg-primary px-4 py-2 text-sm font-medium text-white hover:bg-primary/90">Medium</button>
                        <button
                            class="rounded-md bg-primary px-6 py-3 text-base font-medium text-white hover:bg-primary/90">Large</button>
                    </div>
                </div>

                <!-- Secondary Buttons -->
                <div>
                    <h4 class="mb-3 text-sm font-medium text-gray-900 dark:text-white">Secondary Buttons</h4>
                    <div class="flex flex-wrap gap-2">
                        <button
                            class="rounded-md bg-gray-600 px-3 py-2 text-sm font-medium text-white hover:bg-gray-700">Small</button>
                        <button
                            class="rounded-md bg-gray-600 px-4 py-2 text-sm font-medium text-white hover:bg-gray-700">Medium</button>
                        <button
                            class="rounded-md bg-gray-600 px-6 py-3 text-base font-medium text-white hover:bg-gray-700">Large</button>
                    </div>
                </div>

                <!-- Outline Buttons -->
                <div>
                    <h4 class="mb-3 text-sm font-medium text-gray-900 dark:text-white">Outline Buttons</h4>
                    <div class="flex flex-wrap gap-2">
                        <button
                            class="rounded-md border border-gray-300 bg-white px-3 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-300 dark:hover:bg-gray-700">Small</button>
                        <button
                            class="rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-300 dark:hover:bg-gray-700">Medium</button>
                        <button
                            class="rounded-md border border-gray-300 bg-white px-6 py-3 text-base font-medium text-gray-700 hover:bg-gray-50 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-300 dark:hover:bg-gray-700">Large</button>
                    </div>
                </div>

                <!-- Color Variants -->
                <div>
                    <h4 class="mb-3 text-sm font-medium text-gray-900 dark:text-white">Color Variants</h4>
                    <div class="flex flex-wrap gap-2">
                        <button
                            class="rounded-md bg-primary px-4 py-2 text-sm font-medium text-white hover:bg-primary/90">Primary</button>
                        <button
                            class="rounded-md bg-green-600 px-4 py-2 text-sm font-medium text-white hover:bg-green-700">Success</button>
                        <button
                            class="rounded-md bg-blue-600 px-4 py-2 text-sm font-medium text-white hover:bg-blue-700">Info</button>
                        <button
                            class="rounded-md bg-yellow-600 px-4 py-2 text-sm font-medium text-white hover:bg-yellow-700">Warning</button>
                        <button
                            class="rounded-md bg-red-600 px-4 py-2 text-sm font-medium text-white hover:bg-red-700">Danger</button>
                    </div>
                </div>

                <!-- Buttons with Icons -->
                <div>
                    <h4 class="mb-3 text-sm font-medium text-gray-900 dark:text-white">Buttons with Icons</h4>
                    <div class="flex flex-wrap gap-2">
                        <button
                            class="inline-flex items-center rounded-md bg-primary px-4 py-2 text-sm font-medium text-white hover:bg-primary/90">
                            <svg class="mr-2 h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4">
                                </path>
                            </svg>
                            Add Item
                        </button>
                        <button
                            class="inline-flex items-center rounded-md bg-green-600 px-4 py-2 text-sm font-medium text-white hover:bg-green-700">
                            <svg class="mr-2 h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7">
                                </path>
                            </svg>
                            Save
                        </button>
                        <button
                            class="inline-flex items-center rounded-md bg-red-600 px-4 py-2 text-sm font-medium text-white hover:bg-red-700">
                            <svg class="mr-2 h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                </path>
                            </svg>
                            Delete
                        </button>
                    </div>
                </div>

                <!-- Icon Only Buttons -->
                <div>
                    <h4 class="mb-3 text-sm font-medium text-gray-900 dark:text-white">Icon Only Buttons</h4>
                    <div class="flex flex-wrap gap-2">
                        <button class="rounded-md bg-primary p-2 text-white hover:bg-primary/90">
                            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4">
                                </path>
                            </svg>
                        </button>
                        <button class="rounded-md bg-green-600 p-2 text-white hover:bg-green-700">
                            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7">
                                </path>
                            </svg>
                        </button>
                        <button class="rounded-md bg-red-600 p-2 text-white hover:bg-red-700">
                            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                </path>
                            </svg>
                        </button>
                    </div>
                </div>

                <!-- Disabled Buttons -->
                <div>
                    <h4 class="mb-3 text-sm font-medium text-gray-900 dark:text-white">Disabled Buttons</h4>
                    <div class="flex flex-wrap gap-2">
                        <button disabled
                            class="rounded-md bg-gray-300 px-4 py-2 text-sm font-medium text-gray-500 cursor-not-allowed">Disabled
                            Primary</button>
                        <button disabled
                            class="rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-400 cursor-not-allowed dark:border-gray-600 dark:bg-gray-800">Disabled
                            Outline</button>
                    </div>
                </div>

                <!-- Button Groups -->
                <div>
                    <h4 class="mb-3 text-sm font-medium text-gray-900 dark:text-white">Button Groups</h4>
                    <div class="inline-flex rounded-md shadow-sm">
                        <button
                            class="rounded-l-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-300 dark:hover:bg-gray-700">Left</button>
                        <button
                            class="border-t border-b border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-300 dark:hover:bg-gray-700">Middle</button>
                        <button
                            class="rounded-r-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-300 dark:hover:bg-gray-700">Right</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
