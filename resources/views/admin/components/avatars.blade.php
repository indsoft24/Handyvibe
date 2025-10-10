@extends('layouts.admin')

@section('title', 'Avatars')

@section('content')
    <div class="space-y-6">
        <div class="rounded-lg border border-gray-200 bg-white p-6 shadow-sm dark:border-gray-800 dark:bg-black">
            <h3 class="mb-4 text-lg font-semibold text-gray-900 dark:text-white">Avatar Components</h3>

            <div class="space-y-6">
                <!-- Different Sizes -->
                <div>
                    <h4 class="mb-3 text-sm font-medium text-gray-900 dark:text-white">Different Sizes</h4>
                    <div class="flex items-center space-x-4">
                        <div class="h-6 w-6 rounded-full bg-gray-300 dark:bg-gray-600"></div>
                        <div class="h-8 w-8 rounded-full bg-gray-300 dark:bg-gray-600"></div>
                        <div class="h-10 w-10 rounded-full bg-gray-300 dark:bg-gray-600"></div>
                        <div class="h-12 w-12 rounded-full bg-gray-300 dark:bg-gray-600"></div>
                        <div class="h-16 w-16 rounded-full bg-gray-300 dark:bg-gray-600"></div>
                        <div class="h-20 w-20 rounded-full bg-gray-300 dark:bg-gray-600"></div>
                    </div>
                </div>

                <!-- With Initials -->
                <div>
                    <h4 class="mb-3 text-sm font-medium text-gray-900 dark:text-white">With Initials</h4>
                    <div class="flex items-center space-x-4">
                        <div
                            class="flex h-8 w-8 items-center justify-center rounded-full bg-primary text-xs font-medium text-white">
                            JD</div>
                        <div
                            class="flex h-10 w-10 items-center justify-center rounded-full bg-green-500 text-sm font-medium text-white">
                            JS</div>
                        <div
                            class="flex h-12 w-12 items-center justify-center rounded-full bg-purple-500 text-sm font-medium text-white">
                            AB</div>
                        <div
                            class="flex h-16 w-16 items-center justify-center rounded-full bg-red-500 text-lg font-medium text-white">
                            CD</div>
                    </div>
                </div>

                <!-- With Images -->
                <div>
                    <h4 class="mb-3 text-sm font-medium text-gray-900 dark:text-white">With Images</h4>
                    <div class="flex items-center space-x-4">
                        <img class="h-8 w-8 rounded-full"
                            src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                            alt="User 1">
                        <img class="h-10 w-10 rounded-full"
                            src="https://images.unsplash.com/photo-1494790108755-2616b612b786?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                            alt="User 2">
                        <img class="h-12 w-12 rounded-full"
                            src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                            alt="User 3">
                        <img class="h-16 w-16 rounded-full"
                            src="https://images.unsplash.com/photo-1438761681033-6461ffad8d80?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                            alt="User 4">
                    </div>
                </div>

                <!-- Status Indicators -->
                <div>
                    <h4 class="mb-3 text-sm font-medium text-gray-900 dark:text-white">With Status Indicators</h4>
                    <div class="flex items-center space-x-4">
                        <div class="relative">
                            <img class="h-10 w-10 rounded-full"
                                src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                                alt="User 1">
                            <span
                                class="absolute bottom-0 right-0 block h-2.5 w-2.5 rounded-full bg-green-400 ring-2 ring-white dark:ring-gray-800"></span>
                        </div>
                        <div class="relative">
                            <img class="h-10 w-10 rounded-full"
                                src="https://images.unsplash.com/photo-1494790108755-2616b612b786?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                                alt="User 2">
                            <span
                                class="absolute bottom-0 right-0 block h-2.5 w-2.5 rounded-full bg-yellow-400 ring-2 ring-white dark:ring-gray-800"></span>
                        </div>
                        <div class="relative">
                            <img class="h-10 w-10 rounded-full"
                                src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                                alt="User 3">
                            <span
                                class="absolute bottom-0 right-0 block h-2.5 w-2.5 rounded-full bg-red-400 ring-2 ring-white dark:ring-gray-800"></span>
                        </div>
                        <div class="relative">
                            <img class="h-10 w-10 rounded-full"
                                src="https://images.unsplash.com/photo-1438761681033-6461ffad8d80?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                                alt="User 4">
                            <span
                                class="absolute bottom-0 right-0 block h-2.5 w-2.5 rounded-full bg-gray-400 ring-2 ring-white dark:ring-gray-800"></span>
                        </div>
                    </div>
                </div>

                <!-- Grouped Avatars -->
                <div>
                    <h4 class="mb-3 text-sm font-medium text-gray-900 dark:text-white">Grouped Avatars</h4>
                    <div class="flex -space-x-2">
                        <img class="h-10 w-10 rounded-full border-2 border-white dark:border-gray-800"
                            src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                            alt="User 1">
                        <img class="h-10 w-10 rounded-full border-2 border-white dark:border-gray-800"
                            src="https://images.unsplash.com/photo-1494790108755-2616b612b786?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                            alt="User 2">
                        <img class="h-10 w-10 rounded-full border-2 border-white dark:border-gray-800"
                            src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                            alt="User 3">
                        <div
                            class="flex h-10 w-10 items-center justify-center rounded-full border-2 border-white bg-gray-100 text-xs font-medium text-gray-600 dark:border-gray-800 dark:bg-gray-700 dark:text-gray-300">
                            +3</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
