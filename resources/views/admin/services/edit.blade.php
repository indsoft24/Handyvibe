@extends('layouts.admin')

@section('title', 'Edit Service')

@section('content')
<div class="space-y-6">
    <!-- Page Header -->
    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
            <div class="flex items-center space-x-3">
                <div class="p-2 bg-indigo-100 dark:bg-indigo-900 rounded-lg">
                    <svg class="h-6 w-6 text-indigo-600 dark:text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                    </svg>
                </div>
                <div>
                    <h1 class="text-2xl font-bold text-gray-900 dark:text-white">Edit Service</h1>
                    <p class="text-sm text-gray-600 dark:text-gray-400">Update service information</p>
                </div>
            </div>
            <div class="flex items-center space-x-2">
                <a href="{{ route('admin.services.show', $service) }}" class="inline-flex items-center px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors">
                    <svg class="h-4 w-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                    </svg>
                    View Service
                </a>
                <a href="{{ route('admin.services.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-600 text-white rounded-lg hover:bg-gray-700 transition-colors">
                    <svg class="h-4 w-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                    Back to Services
                </a>
            </div>
        </div>
    </div>

    <!-- Edit Service Form -->
    <form method="POST" action="{{ route('admin.services.update', $service) }}" enctype="multipart/form-data" class="space-y-6">
        @csrf
        @method('PUT')
        
        <!-- Basic Information -->
        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6">
            <div class="border-b border-gray-200 dark:border-gray-700 pb-4 mb-6">
                <h3 class="font-semibold text-lg text-gray-900 dark:text-white">Basic Information</h3>
                <p class="text-sm text-gray-600 dark:text-gray-400 mt-1">Basic details about the service.</p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-semibold text-gray-900 dark:text-white mb-2">Service Name <span class="text-red-500">*</span></label>
                    <input type="text" name="name" value="{{ old('name', $service->name) }}" required class="w-full rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 px-4 py-3 text-gray-900 dark:text-white transition-colors focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500 {{ $errors->has('name') ? 'border-red-500' : '' }}">
                    @error('name')<p class="mt-2 text-sm text-red-600">{{ $message }}</p>@enderror
                </div>
                <div>
                    <label class="block text-sm font-semibold text-gray-900 dark:text-white mb-2">Slug</label>
                    <input type="text" name="slug" value="{{ old('slug', $service->slug) }}" class="w-full rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 px-4 py-3 text-gray-900 dark:text-white transition-colors focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500 {{ $errors->has('slug') ? 'border-red-500' : '' }}">
                    <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">Leave empty to auto-generate from name</p>
                    @error('slug')<p class="mt-2 text-sm text-red-600">{{ $message }}</p>@enderror
                </div>
            </div>
            <div class="mt-6">
                <label class="block text-sm font-semibold text-gray-900 dark:text-white mb-2">Short Description</label>
                <textarea name="short_description" rows="3" class="w-full rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 px-4 py-3 text-gray-900 dark:text-white transition-colors focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500 {{ $errors->has('short_description') ? 'border-red-500' : '' }}">{{ old('short_description', $service->short_description) }}</textarea>
                @error('short_description')<p class="mt-2 text-sm text-red-600">{{ $message }}</p>@enderror
            </div>
        </div>

        <!-- Pricing & Details -->
        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6">
            <div class="border-b border-gray-200 dark:border-gray-700 pb-4 mb-6">
                <h3 class="font-semibold text-lg text-gray-900 dark:text-white">Pricing & Details</h3>
                <p class="text-sm text-gray-600 dark:text-gray-400 mt-1">Service pricing and duration information.</p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div>
                    <label class="block text-sm font-semibold text-gray-900 dark:text-white mb-2">Price <span class="text-red-500">*</span></label>
                    <input type="number" name="price" value="{{ old('price', $service->price) }}" step="0.01" min="0" required class="w-full rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 px-4 py-3 text-gray-900 dark:text-white transition-colors focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500 {{ $errors->has('price') ? 'border-red-500' : '' }}">
                    @error('price')<p class="mt-2 text-sm text-red-600">{{ $message }}</p>@enderror
                </div>
                <div>
                    <label class="block text-sm font-semibold text-gray-900 dark:text-white mb-2">Sale Price</label>
                    <input type="number" name="sale_price" value="{{ old('sale_price', $service->sale_price) }}" step="0.01" min="0" class="w-full rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 px-4 py-3 text-gray-900 dark:text-white transition-colors focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500 {{ $errors->has('sale_price') ? 'border-red-500' : '' }}">
                    @error('sale_price')<p class="mt-2 text-sm text-red-600">{{ $message }}</p>@enderror
                </div>
                <div>
                    <label class="block text-sm font-semibold text-gray-900 dark:text-white mb-2">Duration</label>
                    <input type="text" name="duration" value="{{ old('duration', $service->duration) }}" placeholder="e.g., 2-4 weeks" class="w-full rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 px-4 py-3 text-gray-900 dark:text-white transition-colors focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500 {{ $errors->has('duration') ? 'border-red-500' : '' }}">
                    @error('duration')<p class="mt-2 text-sm text-red-600">{{ $message }}</p>@enderror
                </div>
            </div>
            <div class="mt-6">
                <label class="block text-sm font-semibold text-gray-900 dark:text-white mb-2">Service Type <span class="text-red-500">*</span></label>
                <select name="service_type" required class="w-full rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 px-4 py-3 text-gray-900 dark:text-white transition-colors focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500 {{ $errors->has('service_type') ? 'border-red-500' : '' }}">
                    <option value="">Select Service Type</option>
                    <option value="one_time" {{ old('service_type', $service->service_type) == 'one_time' ? 'selected' : '' }}>One Time</option>
                    <option value="recurring" {{ old('service_type', $service->service_type) == 'recurring' ? 'selected' : '' }}>Recurring</option>
                    <option value="subscription" {{ old('service_type', $service->service_type) == 'subscription' ? 'selected' : '' }}>Subscription</option>
                </select>
                @error('service_type')<p class="mt-2 text-sm text-red-600">{{ $message }}</p>@enderror
            </div>
        </div>

        <!-- Categories -->
        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6">
            <div class="border-b border-gray-200 dark:border-gray-700 pb-4 mb-6">
                <h3 class="font-semibold text-lg text-gray-900 dark:text-white">Categories</h3>
                <p class="text-sm text-gray-600 dark:text-gray-400 mt-1">Assign service to categories.</p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-semibold text-gray-900 dark:text-white mb-2">Category</label>
                    <select name="category_id" class="w-full rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 px-4 py-3 text-gray-900 dark:text-white transition-colors focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500 {{ $errors->has('category_id') ? 'border-red-500' : '' }}">
                        <option value="">Select Category</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ old('category_id', $service->category_id) == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                        @endforeach
                    </select>
                    @error('category_id')<p class="mt-2 text-sm text-red-600">{{ $message }}</p>@enderror
                </div>
                <div>
                    <label class="block text-sm font-semibold text-gray-900 dark:text-white mb-2">Sub Category</label>
                    <select name="sub_category_id" class="w-full rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 px-4 py-3 text-gray-900 dark:text-white transition-colors focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500 {{ $errors->has('sub_category_id') ? 'border-red-500' : '' }}">
                        <option value="">Select Sub Category</option>
                        @foreach($subCategories as $subCategory)
                            <option value="{{ $subCategory->id }}" {{ old('sub_category_id', $service->sub_category_id) == $subCategory->id ? 'selected' : '' }}>{{ $subCategory->name }}</option>
                        @endforeach
                    </select>
                    @error('sub_category_id')<p class="mt-2 text-sm text-red-600">{{ $message }}</p>@enderror
                </div>
            </div>
        </div>

        <!-- Description -->
        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6">
            <div class="border-b border-gray-200 dark:border-gray-700 pb-4 mb-6">
                <h3 class="font-semibold text-lg text-gray-900 dark:text-white">Description</h3>
                <p class="text-sm text-gray-600 dark:text-gray-400 mt-1">Detailed description of the service.</p>
            </div>
            <div>
                <label class="block text-sm font-semibold text-gray-900 dark:text-white mb-2">Full Description</label>
                <textarea name="description" rows="6" class="w-full rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 px-4 py-3 text-gray-900 dark:text-white transition-colors focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500 {{ $errors->has('description') ? 'border-red-500' : '' }}">{{ old('description', $service->description) }}</textarea>
                @error('description')<p class="mt-2 text-sm text-red-600">{{ $message }}</p>@enderror
            </div>
        </div>

        <!-- Images -->
        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6">
            <div class="border-b border-gray-200 dark:border-gray-700 pb-4 mb-6">
                <h3 class="font-semibold text-lg text-gray-900 dark:text-white">Images</h3>
                <p class="text-sm text-gray-600 dark:text-gray-400 mt-1">Upload service images.</p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-semibold text-gray-900 dark:text-white mb-2">Featured Image</label>
                    @if($service->featured_image)
                        <div class="mb-3">
                            <img src="{{ asset('storage/' . $service->featured_image) }}" alt="Current featured image" class="w-full h-32 object-cover rounded-lg">
                        </div>
                    @endif
                    <input type="file" name="featured_image" accept="image/*" class="w-full rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 px-4 py-3 text-gray-900 dark:text-white transition-colors focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500 {{ $errors->has('featured_image') ? 'border-red-500' : '' }}">
                    <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">JPG, PNG, GIF up to 2MB</p>
                    @error('featured_image')<p class="mt-2 text-sm text-red-600">{{ $message }}</p>@enderror
                </div>
                <div>
                    <label class="block text-sm font-semibold text-gray-900 dark:text-white mb-2">Gallery Images</label>
                    @if($service->gallery && count($service->gallery) > 0)
                        <div class="grid grid-cols-2 gap-2 mb-3">
                            @foreach($service->gallery as $index => $image)
                                <div class="relative">
                                    <img src="{{ asset('storage/' . $image) }}" alt="Gallery image {{ $index + 1 }}" class="w-full h-24 object-cover rounded-lg">
                                    <button type="button" onclick="deleteGalleryImage({{ $service->id }}, {{ $index }})" class="absolute top-1 right-1 bg-red-500 text-white rounded-full p-1 hover:bg-red-600">
                                        <svg class="h-3 w-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                        </svg>
                                    </button>
                                </div>
                            @endforeach
                        </div>
                    @endif
                    <input type="file" name="gallery[]" accept="image/*" multiple class="w-full rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 px-4 py-3 text-gray-900 dark:text-white transition-colors focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500 {{ $errors->has('gallery') ? 'border-red-500' : '' }}">
                    <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">Multiple images allowed</p>
                    @error('gallery')<p class="mt-2 text-sm text-red-600">{{ $message }}</p>@enderror
                </div>
            </div>
        </div>

        <!-- Settings -->
        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6">
            <div class="border-b border-gray-200 dark:border-gray-700 pb-4 mb-6">
                <h3 class="font-semibold text-lg text-gray-900 dark:text-white">Settings</h3>
                <p class="text-sm text-gray-600 dark:text-gray-400 mt-1">Service visibility and display settings.</p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="flex items-center">
                    <input type="checkbox" name="featured" value="1" {{ old('featured', $service->featured) ? 'checked' : '' }} class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded">
                    <label class="ml-2 block text-sm text-gray-900 dark:text-white">Featured Service</label>
                </div>
                <div class="flex items-center">
                    <input type="checkbox" name="status" value="1" {{ old('status', $service->status) ? 'checked' : '' }} class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded">
                    <label class="ml-2 block text-sm text-gray-900 dark:text-white">Active</label>
                </div>
            </div>
        </div>

        <!-- Submit Button -->
        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6">
            <div class="flex justify-end">
                <button type="submit" class="inline-flex items-center justify-center px-6 py-3 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition-colors font-semibold">
                    <svg class="h-5 w-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                    Update Service
                </button>
            </div>
        </div>
    </form>
</div>

<script>
function deleteGalleryImage(serviceId, imageIndex) {
    if (confirm('Are you sure you want to delete this image?')) {
        fetch(`/admin/services/${serviceId}/gallery/${imageIndex}`, {
            method: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                'Accept': 'application/json',
            },
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                location.reload();
            } else {
                alert('Error deleting image');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Error deleting image');
        });
    }
}
</script>
@endsection
