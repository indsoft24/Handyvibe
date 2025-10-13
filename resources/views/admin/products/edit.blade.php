@extends('layouts.admin')

@section('title', 'Edit Product')

@section('content')
<div class="space-y-6">
    <!-- Page Header -->
    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
            <div class="flex items-center space-x-3">
                <div class="p-2 bg-blue-100 dark:bg-blue-900 rounded-lg">
                    <svg class="h-6 w-6 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                    </svg>
                </div>
                <div>
                    <h1 class="text-2xl font-bold text-gray-900 dark:text-white">Edit Product</h1>
                    <p class="text-sm text-gray-600 dark:text-gray-400">Update product information and settings</p>
                </div>
            </div>
            <div class="flex items-center space-x-3">
                <a href="{{ route('admin.products.show', $product) }}"
                    class="inline-flex items-center justify-center rounded-lg border border-gray-200 dark:border-gray-600 bg-white dark:bg-gray-700 px-4 py-2 font-semibold text-gray-700 dark:text-gray-300 shadow-sm hover:bg-gray-50 dark:hover:bg-gray-600 transition-colors focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800">
                    <svg class="mr-2 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                    </svg>
                    View Details
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

    <!-- Main Content -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <!-- Form -->
        <div class="lg:col-span-2">
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6">
                <div class="border-b border-gray-200 dark:border-gray-700 pb-4 mb-6">
                    <h3 class="font-semibold text-lg text-gray-900 dark:text-white">Product Information</h3>
                    <p class="text-sm text-gray-600 dark:text-gray-400 mt-1">Update the details for {{ $product->name }}</p>
                </div>
                <form method="POST" action="{{ route('admin.products.update', $product) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                        <!-- Category -->
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                                Category <span class="text-red-500">*</span>
                            </label>
                            <select class="w-full rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 px-4 py-3 text-gray-900 dark:text-white focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors {{ $errors->has('category_id') ? 'border-red-500 focus:ring-red-500 focus:border-red-500' : '' }}"
                                name="category_id" id="category_id" required>
                                <option value="">Select Category</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                            @enderror
                        </div>
                        <!-- Sub Category -->
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                                Sub Category
                            </label>
                            <select class="w-full rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 px-4 py-3 text-gray-900 dark:text-white focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors {{ $errors->has('sub_category_id') ? 'border-red-500 focus:ring-red-500 focus:border-red-500' : '' }}"
                                name="sub_category_id" id="sub_category_id">
                                <option value="">Select Sub Category</option>
                                @foreach ($subCategories as $subCategory)
                                    <option value="{{ $subCategory->id }}" data-category="{{ $subCategory->category_id }}" {{ old('sub_category_id', $product->sub_category_id) == $subCategory->id ? 'selected' : '' }}>
                                        {{ $subCategory->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('sub_category_id')
                                <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- Product Name -->
                    <div class="mt-6">
                        <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                            Product Name <span class="text-red-500">*</span>
                        </label>
                        <input type="text" class="w-full rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 px-4 py-3 text-gray-900 dark:text-white placeholder-gray-500 dark:placeholder-gray-400 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors {{ $errors->has('name') ? 'border-red-500 focus:ring-red-500 focus:border-red-500' : '' }}"
                            name="name" value="{{ old('name', $product->name) }}" placeholder="Enter product name" required>
                        @error('name')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>
                    <!-- Short Description -->
                    <div class="mt-6">
                        <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                            Short Description
                        </label>
                        <textarea class="w-full rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 px-4 py-3 text-gray-900 dark:text-white placeholder-gray-500 dark:placeholder-gray-400 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors {{ $errors->has('short_description') ? 'border-red-500 focus:ring-red-500 focus:border-red-500' : '' }}"
                            name="short_description" rows="3" placeholder="Enter short description">{{ old('short_description', $product->short_description) }}</textarea>
                        @error('short_description')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>
                    <!-- Description -->
                    <div class="mt-6">
                        <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                            Description
                        </label>
                        <textarea class="w-full rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 px-4 py-3 text-gray-900 dark:text-white placeholder-gray-500 dark:placeholder-gray-400 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors {{ $errors->has('description') ? 'border-red-500 focus:ring-red-500 focus:border-red-500' : '' }}"
                            name="description" rows="5" placeholder="Enter product description">{{ old('description', $product->description) }}</textarea>
                        @error('description')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Pricing & Stock -->
                    <div class="grid grid-cols-1 gap-6 md:grid-cols-3 mt-6">
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                                Price <span class="text-red-500">*</span>
                            </label>
                            <input type="number" step="0.01" class="w-full rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 px-4 py-3 text-gray-900 dark:text-white placeholder-gray-500 dark:placeholder-gray-400 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors {{ $errors->has('price') ? 'border-red-500 focus:ring-red-500 focus:border-red-500' : '' }}"
                                name="price" value="{{ old('price', $product->price) }}" placeholder="0.00" min="0" required>
                            @error('price')
                                <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                                Sale Price
                            </label>
                            <input type="number" step="0.01" class="w-full rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 px-4 py-3 text-gray-900 dark:text-white placeholder-gray-500 dark:placeholder-gray-400 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors {{ $errors->has('sale_price') ? 'border-red-500 focus:ring-red-500 focus:border-red-500' : '' }}"
                                name="sale_price" value="{{ old('sale_price', $product->sale_price) }}" placeholder="0.00" min="0">
                            @error('sale_price')
                                <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                                Stock Quantity
                            </label>
                            <input type="number" class="w-full rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 px-4 py-3 text-gray-900 dark:text-white placeholder-gray-500 dark:placeholder-gray-400 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors {{ $errors->has('stock_quantity') ? 'border-red-500 focus:ring-red-500 focus:border-red-500' : '' }}"
                                name="stock_quantity" value="{{ old('stock_quantity', $product->stock_quantity) }}" placeholder="0" min="0">
                            @error('stock_quantity')
                                <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- Images -->
                    <div class="mt-6">
                        <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                            Featured Image
                        </label>
                        <div class="relative">
                            <input type="file" class="w-full rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 px-4 py-3 text-gray-900 dark:text-white focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 dark:file:bg-blue-900 dark:file:text-blue-300 {{ $errors->has('featured_image') ? 'border-red-500 focus:ring-red-500 focus:border-red-500' : '' }}"
                                name="featured_image" accept="image/*">
                        </div>
                        <p class="mt-2 text-sm text-gray-500 dark:text-gray-400">Upload a new featured image (max 2MB). Leave empty to keep current image.</p>
                        @error('featured_image')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mt-6">
                        <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                            Additional Images
                        </label>
                        <div class="relative">
                            <input type="file" multiple class="w-full rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 px-4 py-3 text-gray-900 dark:text-white focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 dark:file:bg-blue-900 dark:file:text-blue-300 {{ $errors->has('images') ? 'border-red-500 focus:ring-red-500 focus:border-red-500' : '' }}"
                                name="images[]" accept="image/*">
                        </div>
                        <p class="mt-2 text-sm text-gray-500 dark:text-gray-400">Upload new additional images (max 5 images, 2MB each). Leave empty to keep current images.</p>
                        @error('images')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Physical Attributes -->
                    <div class="grid grid-cols-1 gap-6 md:grid-cols-2 mt-6">
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                                Weight
                            </label>
                            <input type="text" class="w-full rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 px-4 py-3 text-gray-900 dark:text-white placeholder-gray-500 dark:placeholder-gray-400 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors {{ $errors->has('weight') ? 'border-red-500 focus:ring-red-500 focus:border-red-500' : '' }}"
                                name="weight" value="{{ old('weight', $product->weight) }}" placeholder="e.g., 1.5 kg">
                            @error('weight')
                                <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                                Dimensions
                            </label>
                            <input type="text" class="w-full rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 px-4 py-3 text-gray-900 dark:text-white placeholder-gray-500 dark:placeholder-gray-400 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors {{ $errors->has('dimensions') ? 'border-red-500 focus:ring-red-500 focus:border-red-500' : '' }}"
                                name="dimensions" value="{{ old('dimensions', $product->dimensions) }}" placeholder="e.g., 10x20x30 cm">
                            @error('dimensions')
                                <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <!-- Status & Settings -->
                    <div class="grid grid-cols-1 gap-6 md:grid-cols-3 mt-6">
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                                Status <span class="text-red-500">*</span>
                            </label>
                            <select class="w-full rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 px-4 py-3 text-gray-900 dark:text-white focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors {{ $errors->has('status') ? 'border-red-500 focus:ring-red-500 focus:border-red-500' : '' }}"
                                name="status" required>
                                <option value="1" {{ old('status', $product->status) == '1' ? 'selected' : '' }}>Active</option>
                                <option value="0" {{ old('status', $product->status) == '0' ? 'selected' : '' }}>Inactive</option>
                            </select>
                            @error('status')
                                <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                                Featured
                            </label>
                            <select class="w-full rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 px-4 py-3 text-gray-900 dark:text-white focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors {{ $errors->has('featured') ? 'border-red-500 focus:ring-red-500 focus:border-red-500' : '' }}"
                                name="featured">
                                <option value="0" {{ old('featured', $product->featured) == '0' ? 'selected' : '' }}>No</option>
                                <option value="1" {{ old('featured', $product->featured) == '1' ? 'selected' : '' }}>Yes</option>
                            </select>
                            @error('featured')
                                <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                                Sort Order
                            </label>
                            <input type="number" class="w-full rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 px-4 py-3 text-gray-900 dark:text-white placeholder-gray-500 dark:placeholder-gray-400 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors {{ $errors->has('sort_order') ? 'border-red-500 focus:ring-red-500 focus:border-red-500' : '' }}"
                                name="sort_order" value="{{ old('sort_order', $product->sort_order ?? 0) }}" placeholder="0" min="0">
                            @error('sort_order')
                                <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- Form Actions -->
                    <div class="mt-8 flex flex-col sm:flex-row justify-end gap-3 pt-6 border-t border-gray-200 dark:border-gray-700">
                        <a href="{{ route('admin.products.show', $product) }}"
                            class="inline-flex items-center justify-center rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 px-6 py-3 font-semibold text-gray-700 dark:text-gray-300 shadow-sm hover:bg-gray-50 dark:hover:bg-gray-600 transition-colors focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800">
                            Cancel
                        </a>
                        <button type="submit"
                            class="inline-flex items-center justify-center rounded-lg font-semibold px-6 py-3 text-white bg-gradient-to-r from-blue-600 to-blue-700 shadow-lg transition-all duration-200 hover:from-blue-700 hover:to-blue-800 hover:shadow-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transform hover:scale-105">
                            <svg class="mr-2 h-5 w-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                            Update Product
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Sidebar -->
        <div class="space-y-6">
            <!-- Current Featured Image -->
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6">
                <div class="border-b border-gray-200 dark:border-gray-700 pb-4 mb-6">
                    <div class="flex items-center space-x-2">
                        <div class="p-1.5 bg-purple-100 dark:bg-purple-900 rounded-lg">
                            <svg class="h-5 w-5 text-purple-600 dark:text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                            </svg>
                        </div>
                        <h3 class="font-semibold text-lg text-gray-900 dark:text-white">Current Featured Image</h3>
                    </div>
                    <p class="text-sm text-gray-600 dark:text-gray-400 mt-1">Existing product image</p>
                </div>
                <div class="text-center">
                    @if ($product->featured_image)
                        <img src="{{ asset('storage/' . $product->featured_image) }}" alt="{{ $product->name }}" class="mx-auto h-40 w-40 rounded-xl object-cover border border-gray-200 dark:border-gray-600 shadow-lg">
                        <p class="mt-3 text-sm text-gray-600 dark:text-gray-400">Current featured image</p>
                    @else
                        <div class="p-6 bg-gray-100 dark:bg-gray-700 rounded-xl mb-4">
                            <svg class="mx-auto h-16 w-16 text-gray-400 dark:text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                            </svg>
                        </div>
                        <p class="text-sm text-gray-500 dark:text-gray-400">No featured image</p>
                    @endif
                </div>
            </div>

            <!-- Current Additional Images -->
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
                            <img src="{{ asset('storage/' . $image) }}" alt="{{ $product->name }}" class="h-20 w-20 rounded-lg object-cover border border-gray-200 dark:border-gray-600 shadow-sm">
                        @endforeach
                    </div>
                </div>
            @endif

            <!-- New Image Preview -->
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6">
                <div class="border-b border-gray-200 dark:border-gray-700 pb-4 mb-6">
                    <div class="flex items-center space-x-2">
                        <div class="p-1.5 bg-indigo-100 dark:bg-indigo-900 rounded-lg">
                            <svg class="h-5 w-5 text-indigo-600 dark:text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                            </svg>
                        </div>
                        <h3 class="font-semibold text-lg text-gray-900 dark:text-white">New Image Preview</h3>
                    </div>
                    <p class="text-sm text-gray-600 dark:text-gray-400 mt-1">Preview uploaded images</p>
                </div>
                <div class="text-center">
                    <div id="image-preview" class="hidden">
                        <img id="preview-img" src="" alt="Preview" class="mx-auto h-40 w-40 rounded-xl object-cover border border-gray-200 dark:border-gray-600 shadow-lg">
                        <p class="mt-3 text-sm text-gray-600 dark:text-gray-400">New Image Preview</p>
                    </div>
                    <div id="no-image" class="text-gray-500 dark:text-gray-400">
                        <div class="p-6 bg-gray-100 dark:bg-gray-700 rounded-xl mb-4">
                            <svg class="mx-auto h-16 w-16 text-gray-400 dark:text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                            </svg>
                        </div>
                        <p class="text-sm text-gray-500 dark:text-gray-400">No new image selected</p>
                        <p class="text-xs text-gray-400 dark:text-gray-500 mt-1">Upload an image to see preview</p>
                    </div>
                </div>
            </div>

            <!-- Tips -->
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6">
                <div class="border-b border-gray-200 dark:border-gray-700 pb-4 mb-6">
                    <div class="flex items-center space-x-2">
                        <div class="p-1.5 bg-amber-100 dark:bg-amber-900 rounded-lg">
                            <svg class="h-5 w-5 text-amber-600 dark:text-amber-400" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                            </svg>
                        </div>
                        <h3 class="font-semibold text-lg text-gray-900 dark:text-white">Tips</h3>
                    </div>
                    <p class="text-sm text-gray-600 dark:text-gray-400 mt-1">Best practices for updating products</p>
                </div>
                <div class="space-y-4">
                    <div class="flex items-start space-x-3">
                        <div class="p-1 bg-blue-100 dark:bg-blue-900 rounded-lg mt-0.5">
                            <svg class="h-4 w-4 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/>
                            </svg>
                        </div>
                        <div>
                            <p class="text-sm font-semibold text-gray-900 dark:text-white">Category Updates</p>
                            <p class="text-sm text-gray-600 dark:text-gray-400">Changing categories will affect product visibility and organization.</p>
                        </div>
                    </div>
                    <div class="flex items-start space-x-3">
                        <div class="p-1 bg-green-100 dark:bg-green-900 rounded-lg mt-0.5">
                            <svg class="h-4 w-4 text-green-600 dark:text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 	"/>
                            </svg>
                        </div>
                        <div>
                            <p class="text-sm font-semibold text-gray-900 dark:text-white">Price Changes</p>
                            <p class="text-sm text-gray-600 dark:text-gray-400">Monitor price changes and their impact on sales performance.</p>
                        </div>
                    </div>
                    <div class="flex items-start space-x-3">
                        <div class="p-1 bg-purple-100 dark:bg-purple-900 rounded-lg mt-0.5">
                            <svg class="h-4 w-4 text-purple-600 dark:text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                            </svg>
                        </div>
                        <div>
                            <p class="text-sm font-semibold text-gray-900 dark:text-white">Image Updates</p>
                            <p class="text-sm text-gray-600 dark:text-gray-400">New images will replace existing ones. Keep backups if needed.</p>
                        </div>
                    </div>
                    <div class="flex items-start space-x-3">
                        <div class="p-1 bg-orange-100 dark:bg-orange-900 rounded-lg mt-0.5">
                            <svg class="h-4 w-4 text-orange-600 dark:text-orange-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 20l4-16m2 16l4-16M6 9h14M4 15h14"/>
                            </svg>
                        </div>
                        <div>
                            <p class="text-sm font-semibold text-gray-900 dark:text-white">SKU Updates</p>
                            <p class="text-sm text-gray-600 dark:text-gray-400">SKU will be automatically updated from the product name.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const categorySelect = document.getElementById('category_id');
            const subCategorySelect = document.getElementById('sub_category_id');
            const imageInput = document.querySelector('input[name="featured_image"]');
            const imagePreview = document.getElementById('image-preview');
            const previewImg = document.getElementById('preview-img');
            const noImage = document.getElementById('no-image');

            // Handle category change
            categorySelect.addEventListener('change', function() {
                const selectedCategoryId = this.value;
                const options = subCategorySelect.querySelectorAll('option[data-category]');

                // Hide all subcategory options
                options.forEach(option => {
                    option.style.display = 'none';
                });

                // Show only subcategories for selected category
                if (selectedCategoryId) {
                    options.forEach(option => {
                        if (option.dataset.category === selectedCategoryId) {
                            option.style.display = 'block';
                        }
                    });
                }

                // Reset subcategory selection if it doesn't belong to selected category
                const selectedSubCategory = subCategorySelect.value;
                if (selectedSubCategory) {
                    const selectedOption = subCategorySelect.querySelector(
                        `option[value="${selectedSubCategory}"]`);
                    if (selectedOption && selectedOption.dataset.category !== selectedCategoryId) {
                        subCategorySelect.value = '';
                    }
                }
            });

            // Handle image preview
            imageInput.addEventListener('change', function() {
                const file = this.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        previewImg.src = e.target.result;
                        imagePreview.classList.remove('hidden');
                        noImage.classList.add('hidden');
                    };
                    reader.readAsDataURL(file);
                } else {
                    imagePreview.classList.add('hidden');
                    noImage.classList.remove('hidden');
                }
            });

            // Initialize subcategory visibility on page load
            const selectedCategoryId = categorySelect.value;
            if (selectedCategoryId) {
                const options = subCategorySelect.querySelectorAll('option[data-category]');
                options.forEach(option => {
                    if (option.dataset.category === selectedCategoryId) {
                        option.style.display = 'block';
                    } else {
                        option.style.display = 'none';
                    }
                });
            }
        });
    </script>
@endsection
