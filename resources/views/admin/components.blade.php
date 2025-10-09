@extends('layouts.admin')

@section('title', 'Components')

@section('content')
    <!-- Breadcrumb Start -->
    <div x-data="{ pageName: `Components` }">
        @include('admin.partials.breadcrumb')
    </div>
    <!-- Breadcrumb End -->

    <div class="space-y-6">
        <!-- Component Overview -->
        <div
            class="overflow-hidden rounded-2xl border border-gray-200 bg-white px-5 pt-5 dark:border-gray-800 dark:bg-white/[0.03] sm:px-6 sm:pt-6">
            <h3 class="text-lg font-semibold text-gray-800 dark:text-white/90 mb-6">
                🧩 UI Components Library
            </h3>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                <a href="{{ route('admin.components.alerts') }}"
                    class="group p-4 border border-gray-200 rounded-lg hover:border-brand-500 hover:shadow-md transition-all dark:border-gray-700 dark:hover:border-brand-500">
                    <div class="flex items-center gap-3">
                        <div
                            class="p-2 bg-blue-light-100 dark:bg-blue-light-900/20 rounded-lg group-hover:bg-brand-100 dark:group-hover:bg-brand-900/20 transition-colors">
                            <svg class="w-5 h-5 text-blue-light-600 dark:text-blue-light-400 group-hover:text-brand-600 dark:group-hover:text-brand-400"
                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L3.732 16.5c-.77.833.192 2.5 1.732 2.5z" />
                            </svg>
                        </div>
                        <div>
                            <h4
                                class="font-medium text-gray-800 dark:text-white group-hover:text-brand-600 dark:group-hover:text-brand-400">
                                Alerts</h4>
                            <p class="text-sm text-gray-500 dark:text-gray-400">Success, error, warning alerts</p>
                        </div>
                    </div>
                </a>

                <a href="{{ route('admin.components.buttons') }}"
                    class="group p-4 border border-gray-200 rounded-lg hover:border-brand-500 hover:shadow-md transition-all dark:border-gray-700 dark:hover:border-brand-500">
                    <div class="flex items-center gap-3">
                        <div
                            class="p-2 bg-green-100 dark:bg-green-900/20 rounded-lg group-hover:bg-brand-100 dark:group-hover:bg-brand-900/20 transition-colors">
                            <svg class="w-5 h-5 text-green-600 dark:text-green-400 group-hover:text-brand-600 dark:group-hover:text-brand-400"
                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 15l-2 5L9 9l11 4-5 2zm0 0l5 5M7.188 2.239l.777 2.897M5.136 7.965l-2.898-.777M13.95 4.05l-2.122 2.122m-5.657 5.656l-2.12 2.122" />
                            </svg>
                        </div>
                        <div>
                            <h4
                                class="font-medium text-gray-800 dark:text-white group-hover:text-brand-600 dark:group-hover:text-brand-400">
                                Buttons</h4>
                            <p class="text-sm text-gray-500 dark:text-gray-400">Various button styles</p>
                        </div>
                    </div>
                </a>

                <a href="{{ route('admin.components.badges') }}"
                    class="group p-4 border border-gray-200 rounded-lg hover:border-brand-500 hover:shadow-md transition-all dark:border-gray-700 dark:hover:border-brand-500">
                    <div class="flex items-center gap-3">
                        <div
                            class="p-2 bg-purple-100 dark:bg-purple-900/20 rounded-lg group-hover:bg-brand-100 dark:group-hover:bg-brand-900/20 transition-colors">
                            <svg class="w-5 h-5 text-purple-600 dark:text-purple-400 group-hover:text-brand-600 dark:group-hover:text-brand-400"
                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
                            </svg>
                        </div>
                        <div>
                            <h4
                                class="font-medium text-gray-800 dark:text-white group-hover:text-brand-600 dark:group-hover:text-brand-400">
                                Badges</h4>
                            <p class="text-sm text-gray-500 dark:text-gray-400">Status badges and labels</p>
                        </div>
                    </div>
                </a>

                <a href="{{ route('admin.components.avatars') }}"
                    class="group p-4 border border-gray-200 rounded-lg hover:border-brand-500 hover:shadow-md transition-all dark:border-gray-700 dark:hover:border-brand-500">
                    <div class="flex items-center gap-3">
                        <div
                            class="p-2 bg-orange-100 dark:bg-orange-900/20 rounded-lg group-hover:bg-brand-100 dark:group-hover:bg-brand-900/20 transition-colors">
                            <svg class="w-5 h-5 text-orange-600 dark:text-orange-400 group-hover:text-brand-600 dark:group-hover:text-brand-400"
                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                        </div>
                        <div>
                            <h4
                                class="font-medium text-gray-800 dark:text-white group-hover:text-brand-600 dark:group-hover:text-brand-400">
                                Avatars</h4>
                            <p class="text-sm text-gray-500 dark:text-gray-400">User profile pictures</p>
                        </div>
                    </div>
                </a>
            </div>
        </div>

        <!-- Quick Preview Section -->
        <div
            class="overflow-hidden rounded-2xl border border-gray-200 bg-white px-5 pt-5 dark:border-gray-800 dark:bg-white/[0.03] sm:px-6 sm:pt-6">
            <h3 class="text-lg font-semibold text-gray-800 dark:text-white/90 mb-6">
                🎨 Quick Preview
            </h3>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Alert Preview -->
                <div>
                    <h4 class="font-medium text-gray-800 dark:text-white mb-3">Alert Examples</h4>
                    <div class="space-y-2">
                        <div class="rounded-lg bg-success-50 p-3 dark:bg-success-500/15">
                            <div class="flex items-center gap-2">
                                <svg class="h-4 w-4 text-success-400" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                        clip-rule="evenodd" />
                                </svg>
                                <span class="text-sm text-success-800 dark:text-success-400">Success alert</span>
                            </div>
                        </div>
                        <div class="rounded-lg bg-error-50 p-3 dark:bg-error-500/15">
                            <div class="flex items-center gap-2">
                                <svg class="h-4 w-4 text-error-400" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"
                                        clip-rule="evenodd" />
                                </svg>
                                <span class="text-sm text-error-800 dark:text-error-400">Error alert</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Button Preview -->
                <div>
                    <h4 class="font-medium text-gray-800 dark:text-white mb-3">Button Examples</h4>
                    <div class="flex flex-wrap gap-2">
                        <button
                            class="rounded-lg bg-brand-500 px-3 py-1.5 text-xs font-medium text-white hover:bg-brand-600">
                            Primary
                        </button>
                        <button
                            class="rounded-lg border border-gray-200 bg-white px-3 py-1.5 text-xs font-medium text-gray-700 hover:bg-gray-50 dark:border-gray-800 dark:bg-gray-900 dark:text-gray-300">
                            Secondary
                        </button>
                        <button
                            class="rounded-lg bg-success-500 px-3 py-1.5 text-xs font-medium text-white hover:bg-success-600">
                            Success
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Usage Instructions -->
        <div
            class="overflow-hidden rounded-2xl border border-gray-200 bg-white px-5 pt-5 dark:border-gray-800 dark:bg-white/[0.03] sm:px-6 sm:pt-6">
            <h3 class="text-lg font-semibold text-gray-800 dark:text-white/90 mb-6">
                📖 Usage Instructions
            </h3>

            <div class="prose prose-sm max-w-none dark:prose-invert">
                <p class="text-gray-600 dark:text-gray-400 mb-4">
                    This components library provides a comprehensive set of UI components built with Tailwind CSS and
                    Alpine.js.
                    Each component is designed to be accessible, responsive, and consistent with the admin panel's design
                    system.
                </p>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <h4 class="font-medium text-gray-800 dark:text-white mb-2">Features:</h4>
                        <ul class="text-sm text-gray-600 dark:text-gray-400 space-y-1">
                            <li>• Dark mode support</li>
                            <li>• Responsive design</li>
                            <li>• Accessibility compliant</li>
                            <li>• Consistent styling</li>
                            <li>• Easy customization</li>
                        </ul>
                    </div>

                    <div>
                        <h4 class="font-medium text-gray-800 dark:text-white mb-2">Getting Started:</h4>
                        <ul class="text-sm text-gray-600 dark:text-gray-400 space-y-1">
                            <li>• Browse component categories</li>
                            <li>• Copy code examples</li>
                            <li>• Customize as needed</li>
                            <li>• Test in your application</li>
                            <li>• Follow design guidelines</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
