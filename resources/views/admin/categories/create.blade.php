@extends('layouts.admin')

@section('title', 'Create Category')

@section('content')
<div class="space-y-6">
    <!-- Page Header -->
    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
            <div class="flex items-center space-x-3">
                <div class="p-2 bg-green-100 dark:bg-green-900 rounded-lg">
                    <svg class="h-6 w-6 text-green-600 dark:text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                    </svg>
                </div>
                <div>
                    <h1 class="text-2xl font-bold text-gray-900 dark:text-white">Create Category</h1>
                    <p class="text-sm text-gray-600 dark:text-gray-400">Add a new product category to organize your inventory</p>
                </div>
            </div>
            <a href="{{ route('admin.categories.index') }}"
               class="inline-flex items-center justify-center rounded-lg border border-gray-200 dark:border-gray-600 bg-white dark:bg-gray-700 px-4 py-2 font-semibold text-gray-700 dark:text-gray-300 shadow-sm hover:bg-gray-50 dark:hover:bg-gray-600 transition-colors focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800">
                <svg class="mr-2 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                </svg>
                Back to Categories
            </a>
        </div>
    </div>

    <!-- Form Card -->
    <div class="grid grid-cols-1 xl:grid-cols-3 gap-6">
        <div class="xl:col-span-2">
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6">
                <div class="border-b border-gray-200 dark:border-gray-700 pb-4 mb-6">
                    <h3 class="font-semibold text-lg text-gray-900 dark:text-white">Category Information</h3>
                    <p class="text-sm text-gray-600 dark:text-gray-400 mt-1">Fill in the details for your new category</p>
                </div>
                <form method="POST" action="{{ route('admin.categories.store') }}" enctype="multipart/form-data" autocomplete="off">
                    @csrf
                    <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                        <div>
                            <label class="block text-sm font-semibold text-gray-900 dark:text-white mb-2">
                                Category Name <span class="text-red-500">*</span>
                            </label>
                            <input type="text"
                                class="w-full rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 px-4 py-3 text-gray-900 dark:text-white transition-colors focus:border-blue-500 focus:ring-2 focus:ring-blue-500 focus:ring-offset-0 dark:focus:ring-offset-gray-800
                                    {{ $errors->has('name') ? 'border-red-500 focus:border-red-500 focus:ring-red-500' : '' }}"
                                name="name" value="{{ old('name') }}" placeholder="Enter category name" required>
                            @error('name')
                                <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-gray-900 dark:text-white mb-2">
                                Sort Order
                            </label>
                            <input type="number"
                                class="w-full rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 px-4 py-3 text-gray-900 dark:text-white transition-colors focus:border-blue-500 focus:ring-2 focus:ring-blue-500 focus:ring-offset-0 dark:focus:ring-offset-gray-800
                                    {{ $errors->has('sort_order') ? 'border-red-500 focus:border-red-500 focus:ring-red-500' : '' }}"
                                name="sort_order" value="{{ old('sort_order', 0) }}" placeholder="0" min="0">
                            @error('sort_order')
                                <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="mt-6">
                        <label class="block text-sm font-semibold text-gray-900 dark:text-white mb-2">
                            Description
                        </label>
                        <textarea
                            class="w-full rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 px-4 py-3 text-gray-900 dark:text-white transition-colors focus:border-blue-500 focus:ring-2 focus:ring-blue-500 focus:ring-offset-0 dark:focus:ring-offset-gray-800
                                {{ $errors->has('description') ? 'border-red-500 focus:border-red-500 focus:ring-red-500' : '' }}"
                            name="description" rows="4" placeholder="Enter category description">{{ old('description') }}</textarea>
                        @error('description')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mt-6">
                        <label class="block text-sm font-semibold text-gray-900 dark:text-white mb-2">
                            Category Image
                        </label>
                        <div class="relative">
                            <input type="file"
                                class="w-full rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 px-4 py-3 text-gray-900 dark:text-white transition-colors focus:border-blue-500 focus:ring-2 focus:ring-blue-500 focus:ring-offset-0 dark:focus:ring-offset-gray-800 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 dark:file:bg-gray-600 dark:file:text-gray-300
                                    {{ $errors->has('image') ? 'border-red-500 focus:border-red-500 focus:ring-red-500' : '' }}"
                                name="image" accept="image/*">
                        </div>
                        <p class="mt-2 text-sm text-gray-500 dark:text-gray-400">Upload an image for this category (max 2MB, JPG/PNG)</p>
                        @error('image')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mt-6">
                        <label class="block text-sm font-semibold text-gray-900 dark:text-white mb-2">
                            Status <span class="text-red-500">*</span>
                        </label>
                        <select
                            class="w-full rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 px-4 py-3 text-gray-900 dark:text-white transition-colors focus:border-blue-500 focus:ring-2 focus:ring-blue-500 focus:ring-offset-0 dark:focus:ring-offset-gray-800
                                {{ $errors->has('status') ? 'border-red-500 focus:border-red-500 focus:ring-red-500' : '' }}"
                            name="status" required>
                            <option value="1" {{ old('status', '1') == '1' ? 'selected' : '' }}>Active</option>
                            <option value="0" {{ old('status') == '0' ? 'selected' : '' }}>Inactive</option>
                        </select>
                        @error('status')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mt-8 flex flex-col sm:flex-row justify-end gap-3 pt-6 border-t border-gray-200 dark:border-gray-700">
                        <a href="{{ route('admin.categories.index') }}"
                           class="inline-flex items-center justify-center rounded-lg border border-gray-200 dark:border-gray-600 bg-white dark:bg-gray-700 px-6 py-3 font-semibold text-gray-700 dark:text-gray-300 shadow-sm hover:bg-gray-50 dark:hover:bg-gray-600 transition-colors focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800">
                            Cancel
                        </a>
                        <button type="submit"
                            class="inline-flex items-center justify-center rounded-lg bg-gradient-to-r from-green-600 to-green-700 px-6 py-3 font-semibold text-white shadow-lg transition-all duration-200 hover:from-green-700 hover:to-green-800 hover:shadow-xl focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transform hover:scale-105">
                            <svg class="mr-2 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                            Create Category
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Tips Card -->
        <div class="space-y-6">
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6">
                <div class="border-b border-gray-200 dark:border-gray-700 pb-4 mb-6">
                    <h3 class="font-semibold text-lg text-gray-900 dark:text-white">Tips</h3>
                    <p class="text-sm text-gray-600 dark:text-gray-400 mt-1">Best practices for creating categories</p>
                </div>
                <ul class="space-y-4">
                    <li class="flex items-start gap-3">
                        <div class="p-1 bg-yellow-100 dark:bg-yellow-900 rounded-lg mt-0.5">
                            <svg class="h-4 w-4 text-yellow-600 dark:text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                            </svg>
                        </div>
                        <div>
                            <p class="text-sm font-semibold text-gray-900 dark:text-white">Name</p>
                            <p class="text-sm text-gray-600 dark:text-gray-400">Choose a clear, descriptive name for your category.</p>
                        </div>
                    </li>
                    <li class="flex items-start gap-3">
                        <div class="p-1 bg-blue-100 dark:bg-blue-900 rounded-lg mt-0.5">
                            <svg class="h-4 w-4 text-blue-600 dark:text-blue-400" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/>
                            </svg>
                        </div>
                        <div>
                            <p class="text-sm font-semibold text-gray-900 dark:text-white">Slug</p>
                            <p class="text-sm text-gray-600 dark:text-gray-400">Will be automatically generated from the name.</p>
                        </div>
                    </li>
                    <li class="flex items-start gap-3">
                        <div class="p-1 bg-purple-100 dark:bg-purple-900 rounded-lg mt-0.5">
                            <svg class="h-4 w-4 text-purple-600 dark:text-purple-400" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M3 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"/>
                            </svg>
                        </div>
                        <div>
                            <p class="text-sm font-semibold text-gray-900 dark:text-white">Sort Order</p>
                            <p class="text-sm text-gray-600 dark:text-gray-400">Lower numbers appear first in listings.</p>
                        </div>
                    </li>
                    <li class="flex items-start gap-3">
                        <div class="p-1 bg-green-100 dark:bg-green-900 rounded-lg mt-0.5">
                            <svg class="h-4 w-4 text-green-600 dark:text-green-400" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z" clip-rule="evenodd"/>
                            </svg>
                        </div>
                        <div>
                            <p class="text-sm font-semibold text-gray-900 dark:text-white">Image</p>
                            <p class="text-sm text-gray-600 dark:text-gray-400">Use high-quality images for better presentation.</p>
                        </div>
                    </li>
                </ul>
            </div>
            <!-- Image Preview -->
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6 text-center">
                <div class="border-b border-gray-200 dark:border-gray-700 pb-4 mb-6">
                    <h3 class="font-semibold text-lg text-gray-900 dark:text-white">Image Preview</h3>
                    <p class="text-sm text-gray-600 dark:text-gray-400 mt-1">Preview your uploaded image</p>
                </div>
                <div id="image-preview" class="hidden">
                    <img id="preview-img" src="" alt="Preview"
                         class="mx-auto h-32 w-32 rounded-lg object-cover border border-gray-200 dark:border-gray-600 shadow-sm">
                </div>
                <div id="no-image" class="text-gray-500 dark:text-gray-400">
                    <div class="p-4 bg-gray-100 dark:bg-gray-700 rounded-lg mb-4">
                        <svg class="mx-auto h-12 w-12 text-gray-400 dark:text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                        </svg>
                    </div>
                    <p class="text-sm">No image selected</p>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const imageInput = document.querySelector('input[name="image"]');
        const imagePreview = document.getElementById('image-preview');
        const previewImg = document.getElementById('preview-img');
        const noImage = document.getElementById('no-image');

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
    });
</script>
@endsection
