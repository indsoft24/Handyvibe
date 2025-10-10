@extends('layouts.admin')

@section('title', 'Forms')

@section('content')
    <div class="rounded-lg border border-gray-200 bg-white p-6 shadow-sm dark:border-gray-800 dark:bg-black">
        <div class="mb-4 flex items-center justify-between">
            <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Form Examples</h3>
        </div>

        <div class="space-y-6">
            <!-- Basic Form -->
            <div class="rounded-lg border border-gray-200 p-4 dark:border-gray-700">
                <h4 class="mb-4 text-sm font-medium text-gray-900 dark:text-white">Basic Form</h4>
                <form class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Name</label>
                        <input type="text"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring-primary dark:border-gray-600 dark:bg-gray-800 dark:text-white sm:text-sm">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Email</label>
                        <input type="email"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring-primary dark:border-gray-600 dark:bg-gray-800 dark:text-white sm:text-sm">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Message</label>
                        <textarea rows="3"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring-primary dark:border-gray-600 dark:bg-gray-800 dark:text-white sm:text-sm"></textarea>
                    </div>
                    <button type="submit"
                        class="rounded-md bg-primary px-4 py-2 text-sm font-medium text-white hover:bg-primary/90">Submit</button>
                </form>
            </div>

            <!-- Advanced Form -->
            <div class="rounded-lg border border-gray-200 p-4 dark:border-gray-700">
                <h4 class="mb-4 text-sm font-medium text-gray-900 dark:text-white">Advanced Form</h4>
                <form class="space-y-4">
                    <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">First Name</label>
                            <input type="text"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring-primary dark:border-gray-600 dark:bg-gray-800 dark:text-white sm:text-sm">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Last Name</label>
                            <input type="text"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring-primary dark:border-gray-600 dark:bg-gray-800 dark:text-white sm:text-sm">
                        </div>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Country</label>
                        <select
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring-primary dark:border-gray-600 dark:bg-gray-800 dark:text-white sm:text-sm">
                            <option>Select Country</option>
                            <option>United States</option>
                            <option>Canada</option>
                            <option>United Kingdom</option>
                        </select>
                    </div>
                    <div>
                        <label class="flex items-center">
                            <input type="checkbox" class="rounded border-gray-300 text-primary focus:ring-primary">
                            <span class="ml-2 text-sm text-gray-700 dark:text-gray-300">I agree to the terms and
                                conditions</span>
                        </label>
                    </div>
                    <button type="submit"
                        class="rounded-md bg-primary px-4 py-2 text-sm font-medium text-white hover:bg-primary/90">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
