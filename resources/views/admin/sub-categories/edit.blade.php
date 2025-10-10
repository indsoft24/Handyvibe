@extends('layouts.admin')

@section('title', 'Edit Sub Category')

@section('content')
    <div class="grid grid-cols-12 gap-4 md:gap-6">
        <!-- Page Header -->
        <div class="col-span-12">
            <div class="flex items-center justify-between">
                <div>
                    <h1 class="text-2xl font-bold text-black dark:text-white">Edit Sub Category</h1>
                    <p class="text-sm text-gray-600 dark:text-gray-400">Update sub category information</p>
                </div>
                <div class="flex items-center space-x-3">
                    <a href="{{ route('admin.sub-categories.show', $subCategory) }}"
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

        <!-- Form -->
        <div class="col-span-12 xl:col-span-8">
            <div class="rounded-sm border border-stroke bg-white shadow-default dark:border-strokedark dark:bg-boxdark">
                <div class="border-b border-stroke px-7 py-4 dark:border-strokedark">
                    <h3 class="font-medium text-black dark:text-white">Sub Category Information</h3>
                </div>
                <div class="p-7">
                    <form method="POST" action="{{ route('admin.sub-categories.update', $subCategory) }}"
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
                                    name="category_id" required>
                                    <option value="">Select Category</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}"
                                            {{ old('category_id', $subCategory->category_id) == $category->id ? 'selected' : '' }}>
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
                                    Sub Category Name <span class="text-red-500">*</span>
                                </label>
                                <input type="text"
                                    class="w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary {{ $errors->has('name') ? 'border-red-500' : '' }}"
                                    name="name" value="{{ old('name', $subCategory->name) }}"
                                    placeholder="Enter sub category name" required>
                                @error('name')
                                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="mt-4">
                            <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                                Description
                            </label>
                            <textarea
                                class="w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary {{ $errors->has('description') ? 'border-red-500' : '' }}"
                                name="description" rows="4" placeholder="Enter sub category description">{{ old('description', $subCategory->description) }}</textarea>
                            @error('description')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mt-4">
                            <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                                Sub Category Image
                            </label>
                            <input type="file"
                                class="w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary {{ $errors->has('image') ? 'border-red-500' : '' }}"
                                name="image" accept="image/*">
                            <p class="mt-1 text-sm text-gray-500">Upload a new image for this sub category (max 2MB). Leave
                                empty to keep current image.</p>
                            @error('image')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="grid grid-cols-1 gap-4 md:grid-cols-2 mt-4">
                            <div>
                                <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                                    Sort Order
                                </label>
                                <input type="number"
                                    class="w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary {{ $errors->has('sort_order') ? 'border-red-500' : '' }}"
                                    name="sort_order" value="{{ old('sort_order', $subCategory->sort_order ?? 0) }}"
                                    placeholder="0" min="0">
                                @error('sort_order')
                                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                                    Status <span class="text-red-500">*</span>
                                </label>
                                <select
                                    class="w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary {{ $errors->has('status') ? 'border-red-500' : '' }}"
                                    name="status" required>
                                    <option value="1"
                                        {{ old('status', $subCategory->status) == '1' ? 'selected' : '' }}>Active
                                    </option>
                                    <option value="0"
                                        {{ old('status', $subCategory->status) == '0' ? 'selected' : '' }}>Inactive
                                    </option>
                                </select>
                                @error('status')
                                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="mt-6 flex justify-end space-x-3">
                            <a href="{{ route('admin.sub-categories.show', $subCategory) }}"
                                class="inline-flex items-center justify-center rounded-md border border-stroke bg-white px-4 py-2 text-center font-medium text-black hover:bg-opacity-90 dark:border-strokedark dark:bg-boxdark dark:text-white">
                                Cancel
                            </a>
                            <button type="submit"
                                class="inline-flex items-center justify-center rounded-md bg-primary px-4 py-2 text-center font-medium text-white hover:bg-opacity-90">
                                <svg class="mr-2 h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7"></path>
                                </svg>
                                Update Sub Category
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Current Image and Tips -->
        <div class="col-span-12 xl:col-span-4">
            <!-- Current Image -->
            <div class="rounded-sm border border-stroke bg-white shadow-default dark:border-strokedark dark:bg-boxdark">
                <div class="border-b border-stroke px-7 py-4 dark:border-strokedark">
                    <h3 class="font-medium text-black dark:text-white">Current Image</h3>
                </div>
                <div class="p-7 text-center">
                    @if ($subCategory->image)
                        <img src="{{ asset('storage/' . $subCategory->image) }}" alt="{{ $subCategory->name }}"
                            class="mx-auto h-32 w-32 rounded-lg object-cover">
                        <p class="mt-2 text-sm text-gray-500">Current sub category image</p>
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
                        <p class="mt-2 text-sm text-gray-500">No image uploaded</p>
                    @endif
                </div>
            </div>

            <!-- Image Preview -->
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
                                <p class="text-sm text-gray-500">Select the parent category for this sub category.</p>
                            </div>
                        </li>
                        <li class="flex items-start">
                            <svg class="mr-2 h-5 w-5 text-yellow-500 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <div>
                                <p class="text-sm font-medium text-black dark:text-white">Name</p>
                                <p class="text-sm text-gray-500">Choose a clear, descriptive name for your sub category.
                                </p>
                            </div>
                        </li>
                        <li class="flex items-start">
                            <svg class="mr-2 h-5 w-5 text-yellow-500 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <div>
                                <p class="text-sm font-medium text-black dark:text-white">Slug</p>
                                <p class="text-sm text-gray-500">Will be automatically updated from the name.</p>
                            </div>
                        </li>
                        <li class="flex items-start">
                            <svg class="mr-2 h-5 w-5 text-yellow-500 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <div>
                                <p class="text-sm font-medium text-black dark:text-white">Image</p>
                                <p class="text-sm text-gray-500">Upload a new image to replace the current one.</p>
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
