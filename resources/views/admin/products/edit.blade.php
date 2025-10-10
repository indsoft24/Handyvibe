@extends('layouts.admin')

@section('title', 'Edit Product')

@section('content')
    <div class="grid grid-cols-12 gap-4 md:gap-6">
        <!-- Page Header -->
        <div class="col-span-12">
            <div class="flex items-center justify-between">
                <div>
                    <h1 class="text-2xl font-bold text-black dark:text-white">Edit Product</h1>
                    <p class="text-sm text-gray-600 dark:text-gray-400">Update product information</p>
                </div>
                <div class="flex items-center space-x-3">
                    <a href="{{ route('admin.products.show', $product) }}"
                        class="inline-flex items-center justify-center rounded-md border border-stroke bg-white px-4 py-2 text-center font-medium text-black hover:bg-opacity-90 dark:border-strokedark dark:bg-boxdark dark:text-white">
                        <svg class="mr-2 h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z">
                            </path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
                            </path>
                        </svg>
                        View Details
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

        <!-- Form -->
        <div class="col-span-12 xl:col-span-8">
            <div class="rounded-sm border border-stroke bg-white shadow-default dark:border-strokedark dark:bg-boxdark">
                <div class="border-b border-stroke px-7 py-4 dark:border-strokedark">
                    <h3 class="font-medium text-black dark:text-white">Product Information</h3>
                </div>
                <div class="p-7">
                    <form method="POST" action="{{ route('admin.products.update', $product) }}"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
                            <div>
                                <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                                    Category <span class="text-red-500">*</span>
                                </label>
                                <select
                                    class="w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary {{ $errors->has('category_id') ? 'border-red-500' : '' }}"
                                    name="category_id" id="category_id" required>
                                    <option value="">Select Category</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}"
                                            {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}>
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                                    Sub Category
                                </label>
                                <select
                                    class="w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary {{ $errors->has('sub_category_id') ? 'border-red-500' : '' }}"
                                    name="sub_category_id" id="sub_category_id">
                                    <option value="">Select Sub Category</option>
                                    @foreach ($subCategories as $subCategory)
                                        <option value="{{ $subCategory->id }}"
                                            data-category="{{ $subCategory->category_id }}"
                                            {{ old('sub_category_id', $product->sub_category_id) == $subCategory->id ? 'selected' : '' }}>
                                            {{ $subCategory->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('sub_category_id')
                                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="mt-4">
                            <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                                Product Name <span class="text-red-500">*</span>
                            </label>
                            <input type="text"
                                class="w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary {{ $errors->has('name') ? 'border-red-500' : '' }}"
                                name="name" value="{{ old('name', $product->name) }}" placeholder="Enter product name"
                                required>
                            @error('name')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mt-4">
                            <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                                Short Description
                            </label>
                            <textarea
                                class="w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary {{ $errors->has('short_description') ? 'border-red-500' : '' }}"
                                name="short_description" rows="3" placeholder="Enter short description">{{ old('short_description', $product->short_description) }}</textarea>
                            @error('short_description')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mt-4">
                            <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                                Description
                            </label>
                            <textarea
                                class="w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary {{ $errors->has('description') ? 'border-red-500' : '' }}"
                                name="description" rows="5" placeholder="Enter product description">{{ old('description', $product->description) }}</textarea>
                            @error('description')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="grid grid-cols-1 gap-4 md:grid-cols-3 mt-4">
                            <div>
                                <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                                    Price <span class="text-red-500">*</span>
                                </label>
                                <input type="number" step="0.01"
                                    class="w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary {{ $errors->has('price') ? 'border-red-500' : '' }}"
                                    name="price" value="{{ old('price', $product->price) }}" placeholder="0.00"
                                    min="0" required>
                                @error('price')
                                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                                    Sale Price
                                </label>
                                <input type="number" step="0.01"
                                    class="w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary {{ $errors->has('sale_price') ? 'border-red-500' : '' }}"
                                    name="sale_price" value="{{ old('sale_price', $product->sale_price) }}"
                                    placeholder="0.00" min="0">
                                @error('sale_price')
                                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                                    Stock Quantity
                                </label>
                                <input type="number"
                                    class="w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary {{ $errors->has('stock_quantity') ? 'border-red-500' : '' }}"
                                    name="stock_quantity" value="{{ old('stock_quantity', $product->stock_quantity) }}"
                                    placeholder="0" min="0">
                                @error('stock_quantity')
                                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="mt-4">
                            <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                                Featured Image
                            </label>
                            <input type="file"
                                class="w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary {{ $errors->has('featured_image') ? 'border-red-500' : '' }}"
                                name="featured_image" accept="image/*">
                            <p class="mt-1 text-sm text-gray-500">Upload a new featured image (max 2MB). Leave empty to
                                keep current image.</p>
                            @error('featured_image')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mt-4">
                            <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                                Additional Images
                            </label>
                            <input type="file" multiple
                                class="w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary {{ $errors->has('images') ? 'border-red-500' : '' }}"
                                name="images[]" accept="image/*">
                            <p class="mt-1 text-sm text-gray-500">Upload new additional images (max 5 images, 2MB each).
                                Leave empty to keep current images.</p>
                            @error('images')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="grid grid-cols-1 gap-4 md:grid-cols-2 mt-4">
                            <div>
                                <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                                    Weight
                                </label>
                                <input type="text"
                                    class="w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary {{ $errors->has('weight') ? 'border-red-500' : '' }}"
                                    name="weight" value="{{ old('weight', $product->weight) }}"
                                    placeholder="e.g., 1.5 kg">
                                @error('weight')
                                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                                    Dimensions
                                </label>
                                <input type="text"
                                    class="w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary {{ $errors->has('dimensions') ? 'border-red-500' : '' }}"
                                    name="dimensions" value="{{ old('dimensions', $product->dimensions) }}"
                                    placeholder="e.g., 10x20x30 cm">
                                @error('dimensions')
                                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="grid grid-cols-1 gap-4 md:grid-cols-3 mt-4">
                            <div>
                                <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                                    Status <span class="text-red-500">*</span>
                                </label>
                                <select
                                    class="w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary {{ $errors->has('status') ? 'border-red-500' : '' }}"
                                    name="status" required>
                                    <option value="1" {{ old('status', $product->status) == '1' ? 'selected' : '' }}>
                                        Active</option>
                                    <option value="0" {{ old('status', $product->status) == '0' ? 'selected' : '' }}>
                                        Inactive</option>
                                </select>
                                @error('status')
                                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                                    Featured
                                </label>
                                <select
                                    class="w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary {{ $errors->has('featured') ? 'border-red-500' : '' }}"
                                    name="featured">
                                    <option value="0"
                                        {{ old('featured', $product->featured) == '0' ? 'selected' : '' }}>No</option>
                                    <option value="1"
                                        {{ old('featured', $product->featured) == '1' ? 'selected' : '' }}>Yes</option>
                                </select>
                                @error('featured')
                                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                                    Sort Order
                                </label>
                                <input type="number"
                                    class="w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary {{ $errors->has('sort_order') ? 'border-red-500' : '' }}"
                                    name="sort_order" value="{{ old('sort_order', $product->sort_order ?? 0) }}"
                                    placeholder="0" min="0">
                                @error('sort_order')
                                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="mt-6 flex justify-end space-x-3">
                            <a href="{{ route('admin.products.show', $product) }}"
                                class="inline-flex items-center justify-center rounded-md border border-stroke bg-white px-4 py-2 text-center font-medium text-black hover:bg-opacity-90 dark:border-strokedark dark:bg-boxdark dark:text-white">
                                Cancel
                            </a>
                            <button type="submit"
                                class="inline-flex items-center justify-center rounded-md bg-primary px-4 py-2 text-center font-medium text-white hover:bg-opacity-90">
                                <svg class="mr-2 h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7"></path>
                                </svg>
                                Update Product
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Current Images and Tips -->
        <div class="col-span-12 xl:col-span-4">
            <!-- Current Featured Image -->
            <div class="rounded-sm border border-stroke bg-white shadow-default dark:border-strokedark dark:bg-boxdark">
                <div class="border-b border-stroke px-7 py-4 dark:border-strokedark">
                    <h3 class="font-medium text-black dark:text-white">Current Featured Image</h3>
                </div>
                <div class="p-7 text-center">
                    @if ($product->featured_image)
                        <img src="{{ asset('storage/' . $product->featured_image) }}" alt="{{ $product->name }}"
                            class="mx-auto h-32 w-32 rounded-lg object-cover">
                        <p class="mt-2 text-sm text-gray-500">Current featured image</p>
                    @else
                        <div
                            class="mx-auto h-32 w-32 rounded-lg bg-gray-200 dark:bg-gray-700 flex items-center justify-center">
                            <svg class="h-12 w-12 text-gray-400" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                                </path>
                            </svg>
                        </div>
                        <p class="mt-2 text-sm text-gray-500">No featured image</p>
                    @endif
                </div>
            </div>

            <!-- Current Additional Images -->
            @if ($product->images && count($product->images) > 0)
                <div
                    class="mt-4 rounded-sm border border-stroke bg-white shadow-default dark:border-strokedark dark:bg-boxdark">
                    <div class="border-b border-stroke px-7 py-4 dark:border-strokedark">
                        <h3 class="font-medium text-black dark:text-white">Current Additional Images</h3>
                    </div>
                    <div class="p-7">
                        <div class="grid grid-cols-2 gap-2">
                            @foreach ($product->images as $image)
                                <img src="{{ asset('storage/' . $image) }}" alt="{{ $product->name }}"
                                    class="h-16 w-16 rounded-lg object-cover">
                            @endforeach
                        </div>
                    </div>
                </div>
            @endif

            <!-- New Image Preview -->
            <div
                class="mt-4 rounded-sm border border-stroke bg-white shadow-default dark:border-strokedark dark:bg-boxdark">
                <div class="border-b border-stroke px-7 py-4 dark:border-strokedark">
                    <h3 class="font-medium text-black dark:text-white">New Image Preview</h3>
                </div>
                <div class="p-7 text-center">
                    <div id="image-preview" class="hidden">
                        <img id="preview-img" src="" alt="Preview"
                            class="mx-auto h-32 w-32 rounded-lg object-cover">
                    </div>
                    <div id="no-image" class="text-gray-500">
                        <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                            </path>
                        </svg>
                        <p class="mt-2 text-sm">No new image selected</p>
                    </div>
                </div>
            </div>

            <!-- Tips -->
            <div
                class="mt-4 rounded-sm border border-stroke bg-white shadow-default dark:border-strokedark dark:bg-boxdark">
                <div class="border-b border-stroke px-7 py-4 dark:border-strokedark">
                    <h3 class="font-medium text-black dark:text-white">Tips</h3>
                </div>
                <div class="p-7">
                    <ul class="space-y-3">
                        <li class="flex items-start">
                            <svg class="mr-2 h-5 w-5 text-yellow-500 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <div>
                                <p class="text-sm font-medium text-black dark:text-white">Category</p>
                                <p class="text-sm text-gray-500">Select the main category for this product.</p>
                            </div>
                        </li>
                        <li class="flex items-start">
                            <svg class="mr-2 h-5 w-5 text-yellow-500 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <div>
                                <p class="text-sm font-medium text-black dark:text-white">Pricing</p>
                                <p class="text-sm text-gray-500">Set competitive prices to attract customers.</p>
                            </div>
                        </li>
                        <li class="flex items-start">
                            <svg class="mr-2 h-5 w-5 text-yellow-500 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <div>
                                <p class="text-sm font-medium text-black dark:text-white">Images</p>
                                <p class="text-sm text-gray-500">Use high-quality images for better presentation.</p>
                            </div>
                        </li>
                        <li class="flex items-start">
                            <svg class="mr-2 h-5 w-5 text-yellow-500 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <div>
                                <p class="text-sm font-medium text-black dark:text-white">SKU</p>
                                <p class="text-sm text-gray-500">Will be automatically updated from the name.</p>
                            </div>
                        </li>
                    </ul>
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
