@extends('layouts.admin')
@section('title', 'Category Details')
@section('content')
<div class="space-y-6">
    <!-- Page Header -->
    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
            <div class="flex items-center space-x-3">
                <div class="p-2 bg-purple-100 dark:bg-purple-900 rounded-lg">
                    <svg class="h-6 w-6 text-purple-600 dark:text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                    </svg>
                </div>
                <div>
                    <h1 class="text-2xl font-bold text-gray-900 dark:text-white">Category Details</h1>
                    <p class="text-sm text-gray-600 dark:text-gray-400">View detailed information about this category</p>
                </div>
            </div>
            <div class="flex items-center space-x-3">
                <a href="{{ route('admin.categories.edit', $category) }}"
                   class="inline-flex items-center justify-center rounded-lg border border-gray-200 dark:border-gray-600 bg-white dark:bg-gray-700 px-4 py-2 font-semibold text-gray-700 dark:text-gray-300 shadow-sm hover:bg-gray-50 dark:hover:bg-gray-600 transition-colors focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800">
                    <svg class="mr-2 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                    </svg>
                    Edit Category
                </a>
                <a href="{{ route('admin.categories.index') }}"
                   class="inline-flex items-center justify-center rounded-lg border border-gray-200 dark:border-gray-600 bg-white dark:bg-gray-700 px-4 py-2 font-semibold text-gray-700 dark:text-gray-300 shadow-sm hover:bg-gray-50 dark:hover:bg-gray-600 transition-colors focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800">
                    <svg class="mr-2 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                    </svg>
                    Back to Categories
                </a>
            </div>
        </div>
    </div>
    <!-- Category Details Card -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Main Information -->
        <div class="lg:col-span-2">
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6">
                <div class="border-b border-gray-200 dark:border-gray-700 pb-4 mb-6">
                    <h3 class="font-semibold text-lg text-gray-900 dark:text-white">Category Information</h3>
                    <p class="text-sm text-gray-600 dark:text-gray-400 mt-1">Complete details about this category</p>
                </div>
                <dl class="space-y-6">
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <dt class="text-sm font-semibold text-gray-500 dark:text-gray-400 uppercase tracking-wider">Name</dt>
                            <dd class="mt-1 text-lg font-semibold text-gray-900 dark:text-white">{{ $category->name }}</dd>
                        </div>
                        <div>
                            <dt class="text-sm font-semibold text-gray-500 dark:text-gray-400 uppercase tracking-wider">Sort Order</dt>
                            <dd class="mt-1 text-lg font-semibold text-gray-900 dark:text-white">{{ $category->sort_order }}</dd>
                        </div>
                    </div>
                    <div>
                        <dt class="text-sm font-semibold text-gray-500 dark:text-gray-400 uppercase tracking-wider">Status</dt>
                        <dd class="mt-1">
                            <span class="inline-flex items-center rounded-full px-3 py-1 text-sm font-medium
                                {{ $category->status 
                                    ? 'bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200' 
                                    : 'bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-200' }}">
                                <span class="w-2 h-2 rounded-full mr-2 {{ $category->status ? 'bg-green-500' : 'bg-red-500' }}"></span>
                                {{ $category->status ? 'Active' : 'Inactive' }}
                            </span>
                        </dd>
                    </div>
                    <div>
                        <dt class="text-sm font-semibold text-gray-500 dark:text-gray-400 uppercase tracking-wider">Slug</dt>
                        <dd class="mt-1">
                            <code class="text-sm text-gray-600 dark:text-gray-300 bg-gray-100 dark:bg-gray-700 px-3 py-1 rounded-lg">{{ $category->slug }}</code>
                        </dd>
                    </div>
                    @if($category->description)
                    <div>
                        <dt class="text-sm font-semibold text-gray-500 dark:text-gray-400 uppercase tracking-wider">Description</dt>
                        <dd class="mt-1 text-gray-900 dark:text-white leading-relaxed">{{ $category->description }}</dd>
                    </div>
                    @endif
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <dt class="text-sm font-semibold text-gray-500 dark:text-gray-400 uppercase tracking-wider">Created At</dt>
                            <dd class="mt-1 text-gray-900 dark:text-white">{{ $category->created_at->format('M d, Y') }}</dd>
                        </div>
                        <div>
                            <dt class="text-sm font-semibold text-gray-500 dark:text-gray-400 uppercase tracking-wider">Updated At</dt>
                            <dd class="mt-1 text-gray-900 dark:text-white">{{ $category->updated_at->format('M d, Y') }}</dd>
                        </div>
                    </div>
                </dl>
            </div>
        </div>
        
        <!-- Image Preview -->
        <div>
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6">
                <div class="border-b border-gray-200 dark:border-gray-700 pb-4 mb-6">
                    <h3 class="font-semibold text-lg text-gray-900 dark:text-white">Category Image</h3>
                    <p class="text-sm text-gray-600 dark:text-gray-400 mt-1">Visual representation</p>
                </div>
                @if($category->image)
                    <div class="text-center">
                        <img src="{{ asset('storage/'.$category->image) }}" 
                             alt="{{ $category->name }}" 
                             class="mx-auto h-48 w-48 rounded-xl object-cover border border-gray-200 dark:border-gray-600 shadow-lg">
                        <p class="mt-4 text-sm text-gray-600 dark:text-gray-400">{{ $category->name }}</p>
                    </div>
                @else
                    <div class="text-center py-8">
                        <div class="p-6 bg-gray-100 dark:bg-gray-700 rounded-xl mb-4">
                            <svg class="mx-auto h-16 w-16 text-gray-400 dark:text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                            </svg>
                        </div>
                        <p class="text-sm text-gray-500 dark:text-gray-400">No image uploaded</p>
                        <p class="text-xs text-gray-400 dark:text-gray-500 mt-1">Upload an image to enhance this category</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
