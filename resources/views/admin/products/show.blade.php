@extends('layouts.admin')

@section('title', 'View Product')

@section('content')
    <div class="grid grid-cols-12 gap-4 md:gap-6">
        <!-- Page Header -->
        <div class="col-span-12">
            <div class="flex items-center justify-between">
                <div>
                    <h1 class="text-2xl font-bold text-black dark:text-white">Product Details</h1>
                    <p class="text-sm text-gray-600 dark:text-gray-400">View product information</p>
                </div>
                <div class="flex items-center space-x-3">
                    <a href="{{ route('admin.products.edit', $product) }}"
                        class="inline-flex items-center justify-center rounded-md bg-primary px-4 py-2 text-center font-medium text-white hover:bg-opacity-90">
                        <svg class="mr-2 h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                            </path>
                        </svg>
                        Edit Product
                    </a>
                    <a href="{{ route('admin.products.index') }}"
                        class="inline-flex items-center justify-center rounded-md border border-stroke bg-white px-4 py-2 text-center font-medium text-black hover:bg-opacity-90 dark:border-strokedark dark:bg-boxdark dark:text-white">
                        <svg class="mr-2 h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                        </svg>
                        Back to Products
                    </a>
                </div>
            </div>
        </div>

        <!-- Product Details -->
        <div class="col-span-12 xl:col-span-8">
            <div class="rounded-sm border border-stroke bg-white shadow-default dark:border-strokedark dark:bg-boxdark">
                <div class="border-b border-stroke px-7 py-4 dark:border-strokedark">
                    <h3 class="font-medium text-black dark:text-white">Product Information</h3>
                </div>
                <div class="p-7">
                    <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                        <!-- Basic Information -->
                        <div class="space-y-4">
                            <div>
                                <label class="text-sm font-medium text-gray-500 dark:text-gray-400">ID</label>
                                <p class="text-lg font-semibold text-black dark:text-white">{{ $product->id }}</p>
                            </div>

                            <div>
                                <label class="text-sm font-medium text-gray-500 dark:text-gray-400">Name</label>
                                <p class="text-lg font-semibold text-black dark:text-white">{{ $product->name }}</p>
                            </div>

                            <div>
                                <label class="text-sm font-medium text-gray-500 dark:text-gray-400">SKU</label>
                                <p
                                    class="text-sm text-gray-600 dark:text-gray-300 font-mono bg-gray-100 dark:bg-gray-800 px-2 py-1 rounded">
                                    {{ $product->sku ?? 'N/A' }}</p>
                            </div>

                            <div>
                                <label class="text-sm font-medium text-gray-500 dark:text-gray-400">Category</label>
                                <span
                                    class="inline-flex items-center rounded-full bg-blue-100 px-3 py-1 text-sm font-medium text-blue-800">
                                    {{ $product->category->name }}
                                </span>
                            </div>

                            @if ($product->subcategory)
                                <div>
                                    <label class="text-sm font-medium text-gray-500 dark:text-gray-400">Sub Category</label>
                                    <span
                                        class="inline-flex items-center rounded-full bg-green-100 px-3 py-1 text-sm font-medium text-green-800">
                                        {{ $product->subcategory->name }}
                                    </span>
                                </div>
                            @endif
                        </div>

                        <!-- Pricing and Status -->
                        <div class="space-y-4">
                            <div>
                                <label class="text-sm font-medium text-gray-500 dark:text-gray-400">Price</label>
                                <p class="text-lg font-semibold text-black dark:text-white">
                                    ${{ number_format($product->price, 2) }}</p>
                            </div>

                            @if ($product->sale_price)
                                <div>
                                    <label class="text-sm font-medium text-gray-500 dark:text-gray-400">Sale Price</label>
                                    <p class="text-lg font-semibold text-red-600">
                                        ${{ number_format($product->sale_price, 2) }}</p>
                                </div>
                            @endif

                            <div>
                                <label class="text-sm font-medium text-gray-500 dark:text-gray-400">Stock Quantity</label>
                                <p class="text-lg font-semibold text-black dark:text-white">{{ $product->stock_quantity }}
                                </p>
                            </div>

                            <div>
                                <label class="text-sm font-medium text-gray-500 dark:text-gray-400">Status</label>
                                <div class="mt-1">
                                    <span
                                        class="inline-flex items-center rounded-full px-3 py-1 text-sm font-medium {{ $product->status ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                        {{ $product->status ? 'Active' : 'Inactive' }}
                                    </span>
                                </div>
                            </div>

                            <div>
                                <label class="text-sm font-medium text-gray-500 dark:text-gray-400">Featured</label>
                                <div class="mt-1">
                                    <span
                                        class="inline-flex items-center rounded-full px-3 py-1 text-sm font-medium {{ $product->featured ? 'bg-yellow-100 text-yellow-800' : 'bg-gray-100 text-gray-800' }}">
                                        {{ $product->featured ? 'Featured' : 'Not Featured' }}
                                    </span>
                                </div>
                            </div>

                            <div>
                                <label class="text-sm font-medium text-gray-500 dark:text-gray-400">Sort Order</label>
                                <p class="text-lg font-semibold text-black dark:text-white">{{ $product->sort_order ?? 0 }}
                                </p>
                            </div>

                            <div>
                                <label class="text-sm font-medium text-gray-500 dark:text-gray-400">Created At</label>
                                <p class="text-sm text-gray-600 dark:text-gray-300">
                                    {{ $product->created_at->format('M d, Y \a\t g:i A') }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- Short Description -->
                    @if ($product->short_description)
                        <div class="mt-6">
                            <label class="text-sm font-medium text-gray-500 dark:text-gray-400">Short Description</label>
                            <div class="mt-2 p-4 bg-gray-50 dark:bg-gray-800 rounded-lg">
                                <p class="text-gray-700 dark:text-gray-300">{{ $product->short_description }}</p>
                            </div>
                        </div>
                    @endif

                    <!-- Description -->
                    @if ($product->description)
                        <div class="mt-6">
                            <label class="text-sm font-medium text-gray-500 dark:text-gray-400">Description</label>
                            <div class="mt-2 p-4 bg-gray-50 dark:bg-gray-800 rounded-lg">
                                <p class="text-gray-700 dark:text-gray-300 whitespace-pre-wrap">{{ $product->description }}
                                </p>
                            </div>
                        </div>
                    @endif

                    <!-- Physical Attributes -->
                    @if ($product->weight || $product->dimensions)
                        <div class="mt-6">
                            <h4 class="text-sm font-medium text-gray-500 dark:text-gray-400 mb-3">Physical Attributes</h4>
                            <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
                                @if ($product->weight)
                                    <div>
                                        <label class="text-sm font-medium text-gray-500 dark:text-gray-400">Weight</label>
                                        <p class="text-sm text-gray-600 dark:text-gray-300">{{ $product->weight }}</p>
                                    </div>
                                @endif
                                @if ($product->dimensions)
                                    <div>
                                        <label
                                            class="text-sm font-medium text-gray-500 dark:text-gray-400">Dimensions</label>
                                        <p class="text-sm text-gray-600 dark:text-gray-300">{{ $product->dimensions }}</p>
                                    </div>
                                @endif
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <!-- Images and Actions -->
        <div class="col-span-12 xl:col-span-4">
            <!-- Featured Image -->
            <div class="rounded-sm border border-stroke bg-white shadow-default dark:border-strokedark dark:bg-boxdark">
                <div class="border-b border-stroke px-7 py-4 dark:border-strokedark">
                    <h3 class="font-medium text-black dark:text-white">Featured Image</h3>
                </div>
                <div class="p-7 text-center">
                    @if ($product->featured_image)
                        <img src="{{ asset('storage/' . $product->featured_image) }}" alt="{{ $product->name }}"
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
                        <p class="mt-2 text-sm text-gray-500">No featured image</p>
                    @endif
                </div>
            </div>

            <!-- Additional Images -->
            @if ($product->images && count($product->images) > 0)
                <div
                    class="mt-4 rounded-sm border border-stroke bg-white shadow-default dark:border-strokedark dark:bg-boxdark">
                    <div class="border-b border-stroke px-7 py-4 dark:border-strokedark">
                        <h3 class="font-medium text-black dark:text-white">Additional Images</h3>
                    </div>
                    <div class="p-7">
                        <div class="grid grid-cols-2 gap-3">
                            @foreach ($product->images as $image)
                                <img src="{{ asset('storage/' . $image) }}" alt="{{ $product->name }}"
                                    class="h-24 w-24 rounded-lg object-cover">
                            @endforeach
                        </div>
                    </div>
                </div>
            @endif

            <!-- Actions -->
            <div
                class="mt-4 rounded-sm border border-stroke bg-white shadow-default dark:border-strokedark dark:bg-boxdark">
                <div class="border-b border-stroke px-7 py-4 dark:border-strokedark">
                    <h3 class="font-medium text-black dark:text-white">Actions</h3>
                </div>
                <div class="p-7 space-y-3">
                    <a href="{{ route('admin.products.edit', $product) }}"
                        class="flex w-full items-center justify-center rounded-md bg-primary px-4 py-2 text-center font-medium text-white hover:bg-opacity-90">
                        <svg class="mr-2 h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                            </path>
                        </svg>
                        Edit Product
                    </a>

                    <form method="POST" action="{{ route('admin.products.toggle-status', $product) }}" class="w-full">
                        @csrf
                        <button type="submit"
                            class="flex w-full items-center justify-center rounded-md border border-stroke bg-white px-4 py-2 text-center font-medium text-black hover:bg-opacity-90 dark:border-strokedark dark:bg-boxdark dark:text-white">
                            <svg class="mr-2 h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4">
                                </path>
                            </svg>
                            {{ $product->status ? 'Deactivate' : 'Activate' }}
                        </button>
                    </form>

                    <form method="POST" action="{{ route('admin.products.toggle-featured', $product) }}"
                        class="w-full">
                        @csrf
                        <button type="submit"
                            class="flex w-full items-center justify-center rounded-md border border-stroke bg-white px-4 py-2 text-center font-medium text-black hover:bg-opacity-90 dark:border-strokedark dark:bg-boxdark dark:text-white">
                            <svg class="mr-2 h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z">
                                </path>
                            </svg>
                            {{ $product->featured ? 'Remove from Featured' : 'Mark as Featured' }}
                        </button>
                    </form>

                    <form method="POST" action="{{ route('admin.products.destroy', $product) }}" class="w-full"
                        onsubmit="return confirm('Are you sure you want to delete this product? This action cannot be undone.')">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            class="flex w-full items-center justify-center rounded-md bg-red-600 px-4 py-2 text-center font-medium text-white hover:bg-red-700">
                            <svg class="mr-2 h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                </path>
                            </svg>
                            Delete Product
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
