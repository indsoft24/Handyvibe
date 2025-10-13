@extends('layouts.admin')

@section('title', 'Product Details')

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
                    <h1 class="text-2xl font-bold text-gray-900 dark:text-white">Product Details</h1>
                    <p class="text-sm text-gray-600 dark:text-gray-400">View detailed information about {{ $product->name }}</p>
                </div>
            </div>
            <div class="flex items-center space-x-3">
                <a href="{{ route('admin.products.edit', $product) }}"
                    class="inline-flex items-center justify-center rounded-lg border border-gray-200 dark:border-gray-600 bg-white dark:bg-gray-700 px-4 py-2 font-semibold text-gray-700 dark:text-gray-300 shadow-sm hover:bg-gray-50 dark:hover:bg-gray-600 transition-colors focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800">
                    <svg class="mr-2 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                    </svg>
                    Edit Product
                </a>
                <a href="{{ route('admin.products.index') }}"
                    class="inline-flex items-center justify-center rounded-lg border border-gray-200 dark:border-gray-600 bg-white dark:bg-gray-700 px-4 py-2 font-semibold text-gray-700 dark:text-gray-300 shadow-sm hover:bg-gray-50 dark:hover:bg-gray-600 transition-colors focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800">
                    <svg class="mr-2 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                    </svg>
                    Back to Products
                </a>
            </div>
        </div>
    </div>

    <!-- Product Details -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <!-- Main Information -->
        <div class="lg:col-span-2">
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6">
                <div class="border-b border-gray-200 dark:border-gray-700 pb-4 mb-6">
                    <h3 class="font-semibold text-lg text-gray-900 dark:text-white">Product Information</h3>
                    <p class="text-sm text-gray-600 dark:text-gray-400 mt-1">Complete details about this product</p>
                </div>
                <dl class="space-y-6">
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <dt class="text-sm font-semibold text-gray-500 dark:text-gray-400 uppercase tracking-wider">ID</dt>
                            <dd class="mt-1 text-lg font-semibold text-gray-900 dark:text-white">{{ $product->id }}</dd>
                        </div>
                        <div>
                            <dt class="text-sm font-semibold text-gray-500 dark:text-gray-400 uppercase tracking-wider">SKU</dt>
                            <dd class="mt-1">
                                <code class="text-sm text-gray-600 dark:text-gray-300 bg-gray-100 dark:bg-gray-700 px-3 py-1 rounded-lg">{{ $product->sku ?? 'N/A' }}</code>
                            </dd>
                        </div>
                    </div>
                    <div>
                        <dt class="text-sm font-semibold text-gray-500 dark:text-gray-400 uppercase tracking-wider">Name</dt>
                        <dd class="mt-1 text-lg font-semibold text-gray-900 dark:text-white">{{ $product->name }}</dd>
                    </div>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <dt class="text-sm font-semibold text-gray-500 dark:text-gray-400 uppercase tracking-wider">Category</dt>
                            <dd class="mt-1">
                                <span class="inline-flex items-center rounded-full bg-blue-100 dark:bg-blue-900 px-3 py-1 text-sm font-medium text-blue-800 dark:text-blue-200">
                                    {{ $product->category->name }}
                                </span>
                            </dd>
                        </div>
                        @if ($product->subcategory)
                        <div>
                            <dt class="text-sm font-semibold text-gray-500 dark:text-gray-400 uppercase tracking-wider">Sub Category</dt>
                            <dd class="mt-1">
                                <span class="inline-flex items-center rounded-full bg-green-100 dark:bg-green-900 px-3 py-1 text-sm font-medium text-green-800 dark:text-green-200">
                                    {{ $product->subcategory->name }}
                                </span>
                            </dd>
                        </div>
                        @endif
                    </div>
                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                        <div>
                            <dt class="text-sm font-semibold text-gray-500 dark:text-gray-400 uppercase tracking-wider">Price</dt>
                            <dd class="mt-1 text-lg font-semibold text-gray-900 dark:text-white">${{ number_format($product->price, 2) }}</dd>
                        </div>
                        @if ($product->sale_price)
                        <div>
                            <dt class="text-sm font-semibold text-gray-500 dark:text-gray-400 uppercase tracking-wider">Sale Price</dt>
                            <dd class="mt-1 text-lg font-semibold text-red-600 dark:text-red-400">${{ number_format($product->sale_price, 2) }}</dd>
                        </div>
                        @endif
                        <div>
                            <dt class="text-sm font-semibold text-gray-500 dark:text-gray-400 uppercase tracking-wider">Stock</dt>
                            <dd class="mt-1 text-lg font-semibold text-gray-900 dark:text-white">{{ $product->stock_quantity ?? 0 }}</dd>
                        </div>
                    </div>
                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                        <div>
                            <dt class="text-sm font-semibold text-gray-500 dark:text-gray-400 uppercase tracking-wider">Status</dt>
                            <dd class="mt-1">
                                <span class="inline-flex items-center rounded-full px-3 py-1 text-sm font-medium
                                    {{ $product->status
                                        ? 'bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200'
                                        : 'bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-200' }}">
                                    <span class="w-2 h-2 rounded-full mr-2 {{ $product->status ? 'bg-green-500' : 'bg-red-500' }}"></span>
                                    {{ $product->status ? 'Active' : 'Inactive' }}
                                </span>
                            </dd>
                        </div>
                        <div>
                            <dt class="text-sm font-semibold text-gray-500 dark:text-gray-400 uppercase tracking-wider">Featured</dt>
                            <dd class="mt-1">
                                <span class="inline-flex items-center rounded-full px-3 py-1 text-sm font-medium
                                    {{ $product->featured
                                        ? 'bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-200'
                                        : 'bg-gray-100 text-gray-800 dark:bg-gray-700 dark:text-gray-200' }}">
                                    <span class="w-2 h-2 rounded-full mr-2 {{ $product->featured ? 'bg-yellow-500' : 'bg-gray-500' }}"></span>
                                    {{ $product->featured ? 'Featured' : 'Normal' }}
                                </span>
                            </dd>
                        </div>
                        <div>
                            <dt class="text-sm font-semibold text-gray-500 dark:text-gray-400 uppercase tracking-wider">Sort Order</dt>
                            <dd class="mt-1 text-lg font-semibold text-gray-900 dark:text-white">{{ $product->sort_order ?? 0 }}</dd>
                        </div>
                    </div>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <dt class="text-sm font-semibold text-gray-500 dark:text-gray-400 uppercase tracking-wider">Created At</dt>
                            <dd class="mt-1 text-gray-900 dark:text-white">{{ $product->created_at->format('M d, Y \a\t g:i A') }}</dd>
                        </div>
                        <div>
                            <dt class="text-sm font-semibold text-gray-500 dark:text-gray-400 uppercase tracking-wider">Updated At</dt>
                            <dd class="mt-1 text-gray-900 dark:text-white">{{ $product->updated_at->format('M d, Y \a\t g:i A') }}</dd>
                        </div>
                    </div>
                </dl>
            </div>

            <!-- Short Description -->
            @if ($product->short_description)
                <div class="mt-6">
                    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6">
                        <div class="border-b border-gray-200 dark:border-gray-700 pb-4 mb-6">
                            <h3 class="font-semibold text-lg text-gray-900 dark:text-white">Short Description</h3>
                        </div>
                        <div class="p-4 bg-gray-50 dark:bg-gray-700 rounded-lg">
                            <p class="text-gray-700 dark:text-gray-300 leading-relaxed">{{ $product->short_description }}</p>
                        </div>
                    </div>
                </div>
            @endif

            <!-- Description -->
            @if ($product->description)
                <div class="mt-6">
                    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6">
                        <div class="border-b border-gray-200 dark:border-gray-700 pb-4 mb-6">
                            <h3 class="font-semibold text-lg text-gray-900 dark:text-white">Description</h3>
                        </div>
                        <div class="p-4 bg-gray-50 dark:bg-gray-700 rounded-lg">
                            <p class="text-gray-700 dark:text-gray-300 whitespace-pre-wrap leading-relaxed">{{ $product->description }}</p>
                        </div>
                    </div>
                </div>
            @endif

            <!-- Physical Attributes -->
            @if ($product->weight || $product->dimensions)
                <div class="mt-6">
                    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6">
                        <div class="border-b border-gray-200 dark:border-gray-700 pb-4 mb-6">
                            <h3 class="font-semibold text-lg text-gray-900 dark:text-white">Physical Attributes</h3>
                        </div>
                        <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                            @if ($product->weight)
                                <div>
                                    <dt class="text-sm font-semibold text-gray-500 dark:text-gray-400 uppercase tracking-wider">Weight</dt>
                                    <dd class="mt-1 text-gray-900 dark:text-white">{{ $product->weight }}</dd>
                                </div>
                            @endif
                            @if ($product->dimensions)
                                <div>
                                    <dt class="text-sm font-semibold text-gray-500 dark:text-gray-400 uppercase tracking-wider">Dimensions</dt>
                                    <dd class="mt-1 text-gray-900 dark:text-white">{{ $product->dimensions }}</dd>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            @endif
        </div>

        <!-- Sidebar -->
        <div class="space-y-6">
            <!-- Featured Image -->
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6">
                <div class="border-b border-gray-200 dark:border-gray-700 pb-4 mb-6">
                    <div class="flex items-center space-x-2">
                        <div class="p-1.5 bg-purple-100 dark:bg-purple-900 rounded-lg">
                            <svg class="h-5 w-5 text-purple-600 dark:text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                            </svg>
                        </div>
                        <h3 class="font-semibold text-lg text-gray-900 dark:text-white">Featured Image</h3>
                    </div>
                    <p class="text-sm text-gray-600 dark:text-gray-400 mt-1">Main product image</p>
                </div>
                <div class="text-center">
                    @if ($product->featured_image)
                        <img src="{{ asset('storage/' . $product->featured_image) }}" alt="{{ $product->name }}" class="mx-auto h-48 w-48 rounded-xl object-cover border border-gray-200 dark:border-gray-600 shadow-lg">
                        <p class="mt-3 text-sm text-gray-600 dark:text-gray-400">{{ $product->name }}</p>
                    @else
                        <div class="p-6 bg-gray-100 dark:bg-gray-700 rounded-xl mb-4">
                            <svg class="mx-auto h-16 w-16 text-gray-400 dark:text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                            </svg>
                        </div>
                        <p class="text-sm text-gray-500 dark:text-gray-400">No featured image</p>
                        <p class="text-xs text-gray-400 dark:text-gray-500 mt-1">Upload an image to enhance this product</p>
                    @endif
                </div>
            </div>

            <!-- Additional Images -->
            @if ($product->images && count($product->images) > 0)
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6">
                    <div class="border-b border-gray-200 dark:border-gray-700 pb-4 mb-6">
                        <div class="flex items-center space-x-2">
                            <div class="p-1.5 bg-green-100 dark:bg-green-900 rounded-lg">
                                <svg class="h-5 w-5 text-green-600 dark:text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/>
                                </svg>
                            </div>
                            <h3 class="font-semibold text-lg text-gray-900 dark:text-white">Additional Images</h3>
                        </div>
                        <p class="text-sm text-gray-600 dark:text-gray-400 mt-1">{{ count($product->images) }} additional images</p>
                    </div>
                    <div class="grid grid-cols-2 gap-3">
                        @foreach ($product->images as $image)
                            <img src="{{ asset('storage/' . $image) }}" alt="{{ $product->name }}" class="h-24 w-24 rounded-lg object-cover border border-gray-200 dark:border-gray-600 shadow-sm">
                        @endforeach
                    </div>
                </div>
            @endif

            <!-- Actions -->
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6">
                <div class="border-b border-gray-200 dark:border-gray-700 pb-4 mb-6">
                    <div class="flex items-center space-x-2">
                        <div class="p-1.5 bg-blue-100 dark:bg-blue-900 rounded-lg">
                            <svg class="h-5 w-5 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                            </svg>
                        </div>
                        <h3 class="font-semibold text-lg text-gray-900 dark:text-white">Actions</h3>
                    </div>
                    <p class="text-sm text-gray-600 dark:text-gray-400 mt-1">Manage this product</p>
                </div>
                <div class="space-y-3">
                    <a href="{{ route('admin.products.edit', $product) }}"
                        class="flex w-full items-center justify-center rounded-lg bg-gradient-to-r from-blue-600 to-blue-700 px-4 py-3 text-center font-semibold text-white shadow-lg transition-all duration-200 hover:from-blue-700 hover:to-blue-800 hover:shadow-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transform hover:scale-105">
                        <svg class="mr-2 h-5 w-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                        </svg>
                        Edit Product
                    </a>

                    <form method="POST" action="{{ route('admin.products.toggle-status', $product) }}" class="w-full">
                        @csrf
                        <button type="submit"
                            class="flex w-full items-center justify-center rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 px-4 py-3 text-center font-semibold text-gray-700 dark:text-gray-300 shadow-sm hover:bg-gray-50 dark:hover:bg-gray-600 transition-colors focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800">
                            <svg class="mr-2 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4"/>
                            </svg>
                            {{ $product->status ? 'Deactivate' : 'Activate' }}
                        </button>
                    </form>

                    <form method="POST" action="{{ route('admin.products.toggle-featured', $product) }}" class="w-full">
                        @csrf
                        <button type="submit"
                            class="flex w-full items-center justify-center rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 px-4 py-3 text-center font-semibold text-gray-700 dark:text-gray-300 shadow-sm hover:bg-gray-50 dark:hover:bg-gray-600 transition-colors focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800">
                            <svg class="mr-2 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"/>
                            </svg>
                            {{ $product->featured ? 'Remove from Featured' : 'Mark as Featured' }}
                        </button>
                    </form>

                    <form method="POST" action="{{ route('admin.products.destroy', $product) }}" class="w-full"
                        onsubmit="return confirm('Are you sure you want to delete this product? This action cannot be undone.')">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            class="flex w-full items-center justify-center rounded-lg bg-gradient-to-r from-red-600 to-red-700 px-4 py-3 text-center font-semibold text-white shadow-lg transition-all duration-200 hover:from-red-700 hover:to-red-800 hover:shadow-xl focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transform hover:scale-105">
                            <svg class="mr-2 h-5 w-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                            </svg>
                            Delete Product
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
