@extends('layouts.admin')

@section('title', 'Lead Details')

@section('content')
    <div class="space-y-6">
        <!-- Page Header -->
        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6">
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                <div class="flex items-center space-x-3">
                    <div class="p-2 bg-indigo-100 dark:bg-indigo-900 rounded-lg">
                        <svg class="h-6 w-6 text-indigo-600 dark:text-indigo-400" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                    </div>
                    <div>
                        <h1 class="text-2xl font-bold text-gray-900 dark:text-white">{{ $lead->name }}</h1>
                        <p class="text-sm text-gray-600 dark:text-gray-400">Lead Details</p>
                    </div>
                </div>
                <div class="flex items-center space-x-2">
                    <a href="{{ route('admin.leads.edit', $lead) }}"
                        class="inline-flex items-center px-4 py-2 bg-yellow-600 text-white rounded-lg hover:bg-yellow-700 transition-colors">
                        <svg class="h-4 w-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                        </svg>
                        Edit Lead
                    </a>
                    <a href="{{ route('admin.leads.index') }}"
                        class="inline-flex items-center px-4 py-2 bg-gray-600 text-white rounded-lg hover:bg-gray-700 transition-colors">
                        <svg class="h-4 w-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                        </svg>
                        Back to Leads
                    </a>
                </div>
            </div>
        </div>

        <!-- Lead Information -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <!-- Main Information -->
            <div class="lg:col-span-2 space-y-6">
                <!-- Contact Information -->
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Contact Information</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-500 dark:text-gray-400">Name</label>
                            <p class="mt-1 text-sm text-gray-900 dark:text-white">{{ $lead->name }}</p>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-500 dark:text-gray-400">Email</label>
                            <p class="mt-1 text-sm text-gray-900 dark:text-white">{{ $lead->email }}</p>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-500 dark:text-gray-400">Phone</label>
                            <p class="mt-1 text-sm text-gray-900 dark:text-white">{{ $lead->phone ?: 'Not provided' }}</p>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-500 dark:text-gray-400">Company</label>
                            <p class="mt-1 text-sm text-gray-900 dark:text-white">{{ $lead->company ?: 'Not provided' }}</p>
                        </div>
                    </div>
                </div>

                <!-- Message -->
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Message</h3>
                    <div class="bg-gray-50 dark:bg-gray-700 rounded-lg p-4">
                        <p class="text-sm text-gray-900 dark:text-white whitespace-pre-wrap">{{ $lead->message }}</p>
                    </div>
                </div>

                <!-- Notes -->
                @if ($lead->notes)
                    <div
                        class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Admin Notes</h3>
                        <div class="bg-gray-50 dark:bg-gray-700 rounded-lg p-4">
                            <p class="text-sm text-gray-900 dark:text-white whitespace-pre-wrap">{{ $lead->notes }}</p>
                        </div>
                    </div>
                @endif
            </div>

            <!-- Sidebar -->
            <div class="space-y-6">
                <!-- Status and Priority -->
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Lead Status</h3>
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-500 dark:text-gray-400">Status</label>
                            <span
                                class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium {{ $lead->status_color }} mt-1">
                                {{ ucfirst($lead->status) }}
                            </span>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-500 dark:text-gray-400">Priority</label>
                            <span
                                class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium {{ $lead->priority_color }} mt-1">
                                {{ ucfirst($lead->priority) }}
                            </span>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-500 dark:text-gray-400">Source</label>
                            <span
                                class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium {{ $lead->source_color }} mt-1">
                                {{ ucfirst($lead->source) }}
                            </span>
                        </div>
                    </div>
                </div>

                <!-- Service/Product Information -->
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Service/Product</h3>
                    <div class="space-y-3">
                        <div>
                            <label class="block text-sm font-medium text-gray-500 dark:text-gray-400">Type</label>
                            <p class="mt-1 text-sm text-gray-900 dark:text-white capitalize">{{ $lead->type }}</p>
                        </div>
                        <div>
                            <label
                                class="block text-sm font-medium text-gray-500 dark:text-gray-400">Service/Product</label>
                            <p class="mt-1 text-sm text-gray-900 dark:text-white">
                                {{ $lead->service_name ?: 'General Inquiry' }}</p>
                        </div>
                    </div>
                </div>

                <!-- Assignment -->
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Assignment</h3>
                    <div class="space-y-3">
                        <div>
                            <label class="block text-sm font-medium text-gray-500 dark:text-gray-400">Assigned To</label>
                            <p class="mt-1 text-sm text-gray-900 dark:text-white">
                                {{ $lead->assignedAdmin ? $lead->assignedAdmin->name : 'Unassigned' }}</p>
                        </div>
                        @if ($lead->contacted_at)
                            <div>
                                <label class="block text-sm font-medium text-gray-500 dark:text-gray-400">Contacted
                                    At</label>
                                <p class="mt-1 text-sm text-gray-900 dark:text-white">
                                    {{ $lead->contacted_at->format('M d, Y H:i') }}</p>
                            </div>
                        @endif
                        @if ($lead->follow_up_at)
                            <div>
                                <label class="block text-sm font-medium text-gray-500 dark:text-gray-400">Follow-up
                                    At</label>
                                <p class="mt-1 text-sm text-gray-900 dark:text-white">
                                    {{ $lead->follow_up_at->format('M d, Y H:i') }}</p>
                            </div>
                        @endif
                    </div>
                </div>

                <!-- Timestamps -->
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Timestamps</h3>
                    <div class="space-y-3">
                        <div>
                            <label class="block text-sm font-medium text-gray-500 dark:text-gray-400">Created</label>
                            <p class="mt-1 text-sm text-gray-900 dark:text-white">
                                {{ $lead->created_at->format('M d, Y H:i') }}</p>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-500 dark:text-gray-400">Last Updated</label>
                            <p class="mt-1 text-sm text-gray-900 dark:text-white">
                                {{ $lead->updated_at->format('M d, Y H:i') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
