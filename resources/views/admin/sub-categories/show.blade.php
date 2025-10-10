@extends('layouts.admin')

@section('title', 'View Sub Category')

@section('content')
    <div class="grid grid-cols-12 gap-4 md:gap-6">
        <!-- Page Header -->
        <div class="col-span-12">
            <div class="flex items-center justify-between">
                <div>
                    <h1 class="text-2xl font-bold text-black dark:text-white">Sub Category Details</h1>
                    <p class="text-sm text-gray-600 dark:text-gray-400">View sub category information</p>
                </div>
                <div class="flex items-center space-x-3">
                    <a href="{{ route('admin.sub-categories.edit', $subCategory) }}"
                        class="inline-flex items-center justify-center rounded-md bg-primary px-4 py-2 text-center font-medium text-white hover:bg-opacity-90">
                        <svg class="mr-2 h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                            </path>
                        </svg>
                        Edit Sub Category
                    </a>
                    <a href="{{ route('admin.sub-categories.index') }}"
                        class="inline-flex items-center justify-center rounded-md border border-stroke bg-white px-4 py-2 text-center font-medium text-black hover:bg-opacity-90 dark:border-strokedark dark:bg-boxdark dark:text-white">
                        <svg class="mr-2 h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                        </svg>
                        Back to Sub Categories
                    </a>
                </div>
            </div>
        </div>

        <!-- Sub Category Details -->
        <div class="col-span-12 xl:col-span-8">
            <div class="rounded-sm border border-stroke bg-white shadow-default dark:border-strokedark dark:bg-boxdark">
                <div class="border-b border-stroke px-7 py-4 dark:border-strokedark">
                    <h3 class="font-medium text-black dark:text-white">Sub Category Information</h3>
                </div>
                <div class="p-7">
                    <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                        <!-- Basic Information -->
                        <div class="space-y-4">
                            <div>
                                <label class="text-sm font-medium text-gray-500 dark:text-gray-400">ID</label>
                                <p class="text-lg font-semibold text-black dark:text-white">{{ $subCategory->id }}</p>
                            </div>

                            <div>
                                <label class="text-sm font-medium text-gray-500 dark:text-gray-400">Name</label>
                                <p class="text-lg font-semibold text-black dark:text-white">{{ $subCategory->name }}</p>
                            </div>

                            <div>
                                <label class="text-sm font-medium text-gray-500 dark:text-gray-400">Slug</label>
                                <p
                                    class="text-sm text-gray-600 dark:text-gray-300 font-mono bg-gray-100 dark:bg-gray-800 px-2 py-1 rounded">
                                    {{ $subCategory->slug }}</p>
                            </div>

                            <div>
                                <label class="text-sm font-medium text-gray-500 dark:text-gray-400">Category</label>
                                <span
                                    class="inline-flex items-center rounded-full bg-blue-100 px-3 py-1 text-sm font-medium text-blue-800">
                                    {{ $subCategory->category->name }}
                                </span>
                            </div>
                        </div>

                        <!-- Status and Order -->
                        <div class="space-y-4">
                            <div>
                                <label class="text-sm font-medium text-gray-500 dark:text-gray-400">Status</label>
                                <div class="mt-1">
                                    <span
                                        class="inline-flex items-center rounded-full px-3 py-1 text-sm font-medium {{ $subCategory->status ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                        {{ $subCategory->status ? 'Active' : 'Inactive' }}
                                    </span>
                                </div>
                            </div>

                            <div>
                                <label class="text-sm font-medium text-gray-500 dark:text-gray-400">Sort Order</label>
                                <p class="text-lg font-semibold text-black dark:text-white">
                                    {{ $subCategory->sort_order ?? 0 }}</p>
                            </div>

                            <div>
                                <label class="text-sm font-medium text-gray-500 dark:text-gray-400">Products Count</label>
                                <p class="text-lg font-semibold text-black dark:text-white">
                                    {{ $subCategory->products->count() }}</p>
                            </div>

                            <div>
                                <label class="text-sm font-medium text-gray-500 dark:text-gray-400">Created At</label>
                                <p class="text-sm text-gray-600 dark:text-gray-300">
                                    {{ $subCategory->created_at->format('M d, Y \a\t g:i A') }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- Description -->
                    @if ($subCategory->description)
                        <div class="mt-6">
                            <label class="text-sm font-medium text-gray-500 dark:text-gray-400">Description</label>
                            <div class="mt-2 p-4 bg-gray-50 dark:bg-gray-800 rounded-lg">
                                <p class="text-gray-700 dark:text-gray-300 whitespace-pre-wrap">
                                    {{ $subCategory->description }}</p>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <!-- Image and Actions -->
        <div class="col-span-12 xl:col-span-4">
            <!-- Image -->
            <div class="rounded-sm border border-stroke bg-white shadow-default dark:border-strokedark dark:bg-boxdark">
                <div class="border-b border-stroke px-7 py-4 dark:border-strokedark">
                    <h3 class="font-medium text-black dark:text-white">Sub Category Image</h3>
                </div>
                <div class="p-7 text-center">
                    @if ($subCategory->image)
                        <img src="{{ asset('storage/' . $subCategory->image) }}" alt="{{ $subCategory->name }}"
                            class="mx-auto h-48 w-48 rounded-lg object-cover">
                    @else
                        <div
                            class="mx-auto h-48 w-48 rounded-lg bg-gray-200 dark:bg-gray-700 flex items-center justify-center">
                            <svg class="h-16 w-16 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                                </path>
                            </svg>
                        </div>
                        <p class="mt-2 text-sm text-gray-500">No image uploaded</p>
                    @endif
                </div>
            </div>

            <!-- Actions -->
            <div
                class="mt-4 rounded-sm border border-stroke bg-white shadow-default dark:border-strokedark dark:bg-boxdark">
                <div class="border-b border-stroke px-7 py-4 dark:border-strokedark">
                    <h3 class="font-medium text-black dark:text-white">Actions</h3>
                </div>
                <div class="p-7 space-y-3">
                    <a href="{{ route('admin.sub-categories.edit', $subCategory) }}"
                        class="flex w-full items-center justify-center rounded-md bg-primary px-4 py-2 text-center font-medium text-white hover:bg-opacity-90">
                        <svg class="mr-2 h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                            </path>
                        </svg>
                        Edit Sub Category
                    </a>

                    <form method="POST" action="{{ route('admin.sub-categories.toggle-status', $subCategory) }}"
                        class="w-full">
                        @csrf
                        <button type="submit"
                            class="flex w-full items-center justify-center rounded-md border border-stroke bg-white px-4 py-2 text-center font-medium text-black hover:bg-opacity-90 dark:border-strokedark dark:bg-boxdark dark:text-white">
                            <svg class="mr-2 h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4">
                                </path>
                            </svg>
                            {{ $subCategory->status ? 'Deactivate' : 'Activate' }}
                        </button>
                    </form>

                    <form method="POST" action="{{ route('admin.sub-categories.destroy', $subCategory) }}" class="w-full"
                        onsubmit="return confirm('Are you sure you want to delete this sub category? This action cannot be undone.')">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            class="flex w-full items-center justify-center rounded-md bg-red-600 px-4 py-2 text-center font-medium text-white hover:bg-red-700">
                            <svg class="mr-2 h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                </path>
                            </svg>
                            Delete Sub Category
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Products List -->
        @if ($subCategory->products->count() > 0)
            <div class="col-span-12">
                <div
                    class="rounded-sm border border-stroke bg-white shadow-default dark:border-strokedark dark:bg-boxdark">
                    <div class="border-b border-stroke px-7 py-4 dark:border-strokedark">
                        <h3 class="font-medium text-black dark:text-white">Products in this Sub Category</h3>
                    </div>
                    <div class="p-7">
                        <div class="grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-3">
                            @foreach ($subCategory->products as $product)
                                <div class="rounded-lg border border-stroke p-4 dark:border-strokedark">
                                    <div class="flex items-center space-x-3">
                                        @if ($product->image)
                                            <img src="{{ asset('storage/' . $product->image) }}"
                                                alt="{{ $product->name }}" class="h-12 w-12 rounded-lg object-cover">
                                        @else
                                            <div
                                                class="h-12 w-12 rounded-lg bg-gray-200 dark:bg-gray-700 flex items-center justify-center">
                                                <svg class="h-6 w-6 text-gray-400" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                                                    </path>
                                                </svg>
                                            </div>
                                        @endif
                                        <div class="flex-1 min-w-0">
                                            <h4 class="text-sm font-medium text-black dark:text-white truncate">
                                                {{ $product->name }}</h4>
                                            <p class="text-xs text-gray-500 dark:text-gray-400">ID: {{ $product->id }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection
