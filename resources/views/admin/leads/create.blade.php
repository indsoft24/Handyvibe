@extends('layouts.admin')

@section('title', 'Create New Lead')

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
                                d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                        </svg>
                    </div>
                    <div>
                        <h1 class="text-2xl font-bold text-gray-900 dark:text-white">Create New Lead</h1>
                        <p class="text-sm text-gray-600 dark:text-gray-400">Add a new customer lead to the system</p>
                    </div>
                </div>
                <div class="flex items-center space-x-2">
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

        <!-- Create Lead Form -->
        <form method="POST" action="{{ route('admin.leads.store') }}" class="space-y-6">
            @csrf

            <!-- Contact Information -->
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6">
                <div class="border-b border-gray-200 dark:border-gray-700 pb-4 mb-6">
                    <h3 class="font-semibold text-lg text-gray-900 dark:text-white">Contact Information</h3>
                    <p class="text-sm text-gray-600 dark:text-gray-400 mt-1">Basic contact details for the lead.</p>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-semibold text-gray-900 dark:text-white mb-2">Name <span
                                class="text-red-500">*</span></label>
                        <input type="text" name="name" value="{{ old('name') }}" required
                            class="w-full rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 px-4 py-3 text-gray-900 dark:text-white transition-colors focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500 {{ $errors->has('name') ? 'border-red-500' : '' }}">
                        @error('name')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-gray-900 dark:text-white mb-2">Email <span
                                class="text-red-500">*</span></label>
                        <input type="email" name="email" value="{{ old('email') }}" required
                            class="w-full rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 px-4 py-3 text-gray-900 dark:text-white transition-colors focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500 {{ $errors->has('email') ? 'border-red-500' : '' }}">
                        @error('email')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-gray-900 dark:text-white mb-2">Phone</label>
                        <input type="text" name="phone" value="{{ old('phone') }}"
                            class="w-full rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 px-4 py-3 text-gray-900 dark:text-white transition-colors focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500 {{ $errors->has('phone') ? 'border-red-500' : '' }}">
                        @error('phone')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-gray-900 dark:text-white mb-2">Company</label>
                        <input type="text" name="company" value="{{ old('company') }}"
                            class="w-full rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 px-4 py-3 text-gray-900 dark:text-white transition-colors focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500 {{ $errors->has('company') ? 'border-red-500' : '' }}">
                        @error('company')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- Lead Details -->
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6">
                <div class="border-b border-gray-200 dark:border-gray-700 pb-4 mb-6">
                    <h3 class="font-semibold text-lg text-gray-900 dark:text-white">Lead Details</h3>
                    <p class="text-sm text-gray-600 dark:text-gray-400 mt-1">Information about the lead and inquiry.</p>
                </div>
                <div class="space-y-6">
                    <div>
                        <label class="block text-sm font-semibold text-gray-900 dark:text-white mb-2">Message <span
                                class="text-red-500">*</span></label>
                        <textarea name="message" rows="4" required
                            class="w-full rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 px-4 py-3 text-gray-900 dark:text-white transition-colors focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500 {{ $errors->has('message') ? 'border-red-500' : '' }}">{{ old('message') }}</textarea>
                        @error('message')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <div>
                            <label class="block text-sm font-semibold text-gray-900 dark:text-white mb-2">Source <span
                                    class="text-red-500">*</span></label>
                            <select name="source" required
                                class="w-full rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 px-4 py-3 text-gray-900 dark:text-white transition-colors focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500 {{ $errors->has('source') ? 'border-red-500' : '' }}">
                                <option value="">Select Source</option>
                                <option value="website" {{ old('source') == 'website' ? 'selected' : '' }}>Website</option>
                                <option value="phone" {{ old('source') == 'phone' ? 'selected' : '' }}>Phone</option>
                                <option value="email" {{ old('source') == 'email' ? 'selected' : '' }}>Email</option>
                                <option value="social" {{ old('source') == 'social' ? 'selected' : '' }}>Social Media
                                </option>
                                <option value="referral" {{ old('source') == 'referral' ? 'selected' : '' }}>Referral
                                </option>
                            </select>
                            @error('source')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-gray-900 dark:text-white mb-2">Type <span
                                    class="text-red-500">*</span></label>
                            <select name="type" required
                                class="w-full rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 px-4 py-3 text-gray-900 dark:text-white transition-colors focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500 {{ $errors->has('type') ? 'border-red-500' : '' }}">
                                <option value="">Select Type</option>
                                <option value="service" {{ old('type') == 'service' ? 'selected' : '' }}>Service</option>
                                <option value="product" {{ old('type') == 'product' ? 'selected' : '' }}>Product</option>
                                <option value="general" {{ old('type') == 'general' ? 'selected' : '' }}>General</option>
                            </select>
                            @error('type')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-gray-900 dark:text-white mb-2">Status <span
                                    class="text-red-500">*</span></label>
                            <select name="status" required
                                class="w-full rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 px-4 py-3 text-gray-900 dark:text-white transition-colors focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500 {{ $errors->has('status') ? 'border-red-500' : '' }}">
                                <option value="new" {{ old('status', 'new') == 'new' ? 'selected' : '' }}>New</option>
                                <option value="contacted" {{ old('status') == 'contacted' ? 'selected' : '' }}>Contacted
                                </option>
                                <option value="qualified" {{ old('status') == 'qualified' ? 'selected' : '' }}>Qualified
                                </option>
                                <option value="converted" {{ old('status') == 'converted' ? 'selected' : '' }}>Converted
                                </option>
                                <option value="lost" {{ old('status') == 'lost' ? 'selected' : '' }}>Lost</option>
                            </select>
                            @error('status')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-semibold text-gray-900 dark:text-white mb-2">Priority <span
                                    class="text-red-500">*</span></label>
                            <select name="priority" required
                                class="w-full rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 px-4 py-3 text-gray-900 dark:text-white transition-colors focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500 {{ $errors->has('priority') ? 'border-red-500' : '' }}">
                                <option value="low" {{ old('priority', 'medium') == 'low' ? 'selected' : '' }}>Low
                                </option>
                                <option value="medium" {{ old('priority', 'medium') == 'medium' ? 'selected' : '' }}>
                                    Medium</option>
                                <option value="high" {{ old('priority') == 'high' ? 'selected' : '' }}>High</option>
                                <option value="urgent" {{ old('priority') == 'urgent' ? 'selected' : '' }}>Urgent</option>
                            </select>
                            @error('priority')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-gray-900 dark:text-white mb-2">Assigned
                                To</label>
                            <select name="assigned_to"
                                class="w-full rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 px-4 py-3 text-gray-900 dark:text-white transition-colors focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500 {{ $errors->has('assigned_to') ? 'border-red-500' : '' }}">
                                <option value="">Unassigned</option>
                                @foreach ($admins as $admin)
                                    <option value="{{ $admin->id }}"
                                        {{ old('assigned_to') == $admin->id ? 'selected' : '' }}>{{ $admin->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('assigned_to')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>

            <!-- Submit Button -->
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6">
                <div class="flex justify-end">
                    <button type="submit"
                        class="inline-flex items-center justify-center px-6 py-3 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition-colors font-semibold">
                        <svg class="h-5 w-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        Create Lead
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection
