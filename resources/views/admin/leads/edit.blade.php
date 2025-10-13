@extends('layouts.admin')

@section('title', 'Edit Lead')

@section('content')
    <div class="space-y-6">
        <!-- Page Header -->
        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6">
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                <div class="flex items-center space-x-3">
                    <div class="p-2 bg-yellow-100 dark:bg-yellow-900 rounded-lg">
                        <svg class="h-6 w-6 text-yellow-600 dark:text-yellow-400" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                        </svg>
                    </div>
                    <div>
                        <h1 class="text-2xl font-bold text-gray-900 dark:text-white">Edit Lead</h1>
                        <p class="text-sm text-gray-600 dark:text-gray-400">Update lead information</p>
                    </div>
                </div>
                <div class="flex items-center space-x-2">
                    <a href="{{ route('admin.leads.show', $lead) }}"
                        class="inline-flex items-center px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors">
                        <svg class="h-4 w-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                        </svg>
                        View Lead
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

        <!-- Edit Lead Form -->
        <form method="POST" action="{{ route('admin.leads.update', $lead) }}" class="space-y-6">
            @csrf
            @method('PUT')

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
                        <input type="text" name="name" value="{{ old('name', $lead->name) }}" required
                            class="w-full rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 px-4 py-3 text-gray-900 dark:text-white transition-colors focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500 {{ $errors->has('name') ? 'border-red-500' : '' }}">
                        @error('name')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-gray-900 dark:text-white mb-2">Email <span
                                class="text-red-500">*</span></label>
                        <input type="email" name="email" value="{{ old('email', $lead->email) }}" required
                            class="w-full rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 px-4 py-3 text-gray-900 dark:text-white transition-colors focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500 {{ $errors->has('email') ? 'border-red-500' : '' }}">
                        @error('email')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-gray-900 dark:text-white mb-2">Phone</label>
                        <input type="text" name="phone" value="{{ old('phone', $lead->phone) }}"
                            class="w-full rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 px-4 py-3 text-gray-900 dark:text-white transition-colors focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500 {{ $errors->has('phone') ? 'border-red-500' : '' }}">
                        @error('phone')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-gray-900 dark:text-white mb-2">Company</label>
                        <input type="text" name="company" value="{{ old('company', $lead->company) }}"
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
                            class="w-full rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 px-4 py-3 text-gray-900 dark:text-white transition-colors focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500 {{ $errors->has('message') ? 'border-red-500' : '' }}">{{ old('message', $lead->message) }}</textarea>
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
                                <option value="website" {{ old('source', $lead->source) == 'website' ? 'selected' : '' }}>
                                    Website</option>
                                <option value="phone" {{ old('source', $lead->source) == 'phone' ? 'selected' : '' }}>
                                    Phone</option>
                                <option value="email" {{ old('source', $lead->source) == 'email' ? 'selected' : '' }}>
                                    Email</option>
                                <option value="social" {{ old('source', $lead->source) == 'social' ? 'selected' : '' }}>
                                    Social Media</option>
                                <option value="referral"
                                    {{ old('source', $lead->source) == 'referral' ? 'selected' : '' }}>Referral</option>
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
                                <option value="service" {{ old('type', $lead->type) == 'service' ? 'selected' : '' }}>
                                    Service</option>
                                <option value="product" {{ old('type', $lead->type) == 'product' ? 'selected' : '' }}>
                                    Product</option>
                                <option value="general" {{ old('type', $lead->type) == 'general' ? 'selected' : '' }}>
                                    General</option>
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
                                <option value="new" {{ old('status', $lead->status) == 'new' ? 'selected' : '' }}>New
                                </option>
                                <option value="contacted"
                                    {{ old('status', $lead->status) == 'contacted' ? 'selected' : '' }}>Contacted</option>
                                <option value="qualified"
                                    {{ old('status', $lead->status) == 'qualified' ? 'selected' : '' }}>Qualified</option>
                                <option value="converted"
                                    {{ old('status', $lead->status) == 'converted' ? 'selected' : '' }}>Converted</option>
                                <option value="lost" {{ old('status', $lead->status) == 'lost' ? 'selected' : '' }}>Lost
                                </option>
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
                                <option value="low" {{ old('priority', $lead->priority) == 'low' ? 'selected' : '' }}>
                                    Low</option>
                                <option value="medium"
                                    {{ old('priority', $lead->priority) == 'medium' ? 'selected' : '' }}>Medium</option>
                                <option value="high" {{ old('priority', $lead->priority) == 'high' ? 'selected' : '' }}>
                                    High</option>
                                <option value="urgent"
                                    {{ old('priority', $lead->priority) == 'urgent' ? 'selected' : '' }}>Urgent</option>
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
                                        {{ old('assigned_to', $lead->assigned_to) == $admin->id ? 'selected' : '' }}>
                                        {{ $admin->name }}</option>
                                @endforeach
                            </select>
                            @error('assigned_to')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>

            <!-- Admin Notes -->
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6">
                <div class="border-b border-gray-200 dark:border-gray-700 pb-4 mb-6">
                    <h3 class="font-semibold text-lg text-gray-900 dark:text-white">Admin Notes</h3>
                    <p class="text-sm text-gray-600 dark:text-gray-400 mt-1">Internal notes and comments about this lead.
                    </p>
                </div>
                <div>
                    <label class="block text-sm font-semibold text-gray-900 dark:text-white mb-2">Notes</label>
                    <textarea name="notes" rows="4"
                        class="w-full rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 px-4 py-3 text-gray-900 dark:text-white transition-colors focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500 {{ $errors->has('notes') ? 'border-red-500' : '' }}">{{ old('notes', $lead->notes) }}</textarea>
                    @error('notes')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
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
                        Update Lead
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection
