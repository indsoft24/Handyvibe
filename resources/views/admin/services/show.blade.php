@extends('layouts.admin')

@section('title', 'Service Details')

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
                                d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z" />
                        </svg>
                    </div>
                    <div>
                        <h1 class="text-2xl font-bold text-gray-900 dark:text-white">{{ $service->name }}</h1>
                        <p class="text-sm text-gray-600 dark:text-gray-400">Service Details</p>
                    </div>
                </div>
                <div class="flex items-center space-x-2">
                    <a href="{{ route('admin.services.edit', $service) }}"
                        class="inline-flex items-center px-4 py-2 bg-yellow-600 text-white rounded-lg hover:bg-yellow-700 transition-colors">
                        <svg class="h-4 w-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                        </svg>
                        Edit Service
                    </a>
                    <a href="{{ route('admin.services.index') }}"
                        class="inline-flex items-center px-4 py-2 bg-gray-600 text-white rounded-lg hover:bg-gray-700 transition-colors">
                        <svg class="h-4 w-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                        </svg>
                        Back to Services
                    </a>
                </div>
            </div>
        </div>

        <!-- Service Information -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <!-- Main Information -->
            <div class="lg:col-span-2 space-y-6">
                <!-- Service Details -->
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Service Information</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-500 dark:text-gray-400">Name</label>
                            <p class="mt-1 text-sm text-gray-900 dark:text-white">{{ $service->name }}</p>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-500 dark:text-gray-400">Slug</label>
                            <p class="mt-1 text-sm text-gray-900 dark:text-white">{{ $service->slug }}</p>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-500 dark:text-gray-400">Category</label>
                            <p class="mt-1 text-sm text-gray-900 dark:text-white">
                                {{ $service->category ? $service->category->name : 'Uncategorized' }}</p>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-500 dark:text-gray-400">Sub Category</label>
                            <p class="mt-1 text-sm text-gray-900 dark:text-white">
                                {{ $service->subCategory ? $service->subCategory->name : 'None' }}</p>
                        </div>
                    </div>
                </div>

                <!-- Description -->
                @if ($service->description)
                    <div
                        class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Description</h3>
                        <div class="prose dark:prose-invert max-w-none">
                            <p class="text-sm text-gray-900 dark:text-white whitespace-pre-wrap">{{ $service->description }}
                            </p>
                        </div>
                    </div>
                @endif

                <!-- Features -->
                @if ($service->features)
                    <div
                        class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Features</h3>
                        <ul class="space-y-2">
                            @foreach ($service->features as $feature)
                                <li class="flex items-center text-sm text-gray-900 dark:text-white">
                                    <svg class="h-4 w-4 text-green-500 mr-2" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7" />
                                    </svg>
                                    {{ $feature }}
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <!-- Requirements -->
                @if ($service->requirements)
                    <div
                        class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Requirements</h3>
                        <ul class="space-y-2">
                            @foreach ($service->requirements as $requirement)
                                <li class="flex items-center text-sm text-gray-900 dark:text-white">
                                    <svg class="h-4 w-4 text-blue-500 mr-2" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    {{ $requirement }}
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>

            <!-- Sidebar -->
            <div class="space-y-6">
                <!-- Service Image -->
                @if ($service->featured_image)
                    <div
                        class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Featured Image</h3>
                        <div class="aspect-w-16 aspect-h-9">
                            <img src="{{ asset('storage/' . $service->featured_image) }}" alt="{{ $service->name }}"
                                class="w-full h-48 object-cover rounded-lg">
                        </div>
                    </div>
                @endif

                <!-- Pricing -->
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Pricing</h3>
                    <div class="space-y-3">
                        <div>
                            <label class="block text-sm font-medium text-gray-500 dark:text-gray-400">Price</label>
                            <p class="mt-1 text-lg font-bold text-gray-900 dark:text-white">
                                ${{ number_format($service->price, 2) }}</p>
                        </div>
                        @if ($service->is_on_sale)
                            <div>
                                <label class="block text-sm font-medium text-gray-500 dark:text-gray-400">Sale Price</label>
                                <p class="mt-1 text-lg font-bold text-red-600 dark:text-red-400">
                                    ${{ number_format($service->sale_price, 2) }}</p>
                                <p class="text-sm text-green-600 dark:text-green-400">{{ $service->discount_percentage }}%
                                    off</p>
                            </div>
                        @endif
                        @if ($service->duration)
                            <div>
                                <label class="block text-sm font-medium text-gray-500 dark:text-gray-400">Duration</label>
                                <p class="mt-1 text-sm text-gray-900 dark:text-white">{{ $service->duration }}</p>
                            </div>
                        @endif
                    </div>
                </div>

                <!-- Status & Settings -->
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Status & Settings</h3>
                    <div class="space-y-3">
                        <div>
                            <label class="block text-sm font-medium text-gray-500 dark:text-gray-400">Status</label>
                            <span
                                class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $service->status_color }} mt-1">
                                {{ $service->status ? 'Active' : 'Inactive' }}
                            </span>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-500 dark:text-gray-400">Service Type</label>
                            <span
                                class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $service->service_type_color }} mt-1">
                                {{ ucfirst(str_replace('_', ' ', $service->service_type)) }}
                            </span>
                        </div>
                        @if ($service->featured)
                            <div>
                                <label class="block text-sm font-medium text-gray-500 dark:text-gray-400">Featured</label>
                                <span
                                    class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-200 mt-1">
                                    Featured
                                </span>
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
                                {{ $service->created_at->format('M d, Y H:i') }}</p>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-500 dark:text-gray-400">Last Updated</label>
                            <p class="mt-1 text-sm text-gray-900 dark:text-white">
                                {{ $service->updated_at->format('M d, Y H:i') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
