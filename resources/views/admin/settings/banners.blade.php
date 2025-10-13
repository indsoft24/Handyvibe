@extends('layouts.admin')

@section('title', 'Banner Management')

@section('content')
    <div class="space-y-6">
        <!-- Page Header -->
        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6">
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                <div class="flex items-center space-x-3">
                    <div class="p-2 bg-green-100 dark:bg-green-900 rounded-lg">
                        <svg class="h-6 w-6 text-green-600 dark:text-green-400" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <div>
                        <h1 class="text-2xl font-bold text-gray-900 dark:text-white">Banner Management</h1>
                        <p class="text-sm text-gray-600 dark:text-gray-400">Manage website banners and images</p>
                    </div>
                </div>
                <div class="flex items-center space-x-2">
                    <a href="{{ route('admin.settings.index') }}"
                        class="inline-flex items-center px-4 py-2 bg-gray-600 text-white rounded-lg hover:bg-gray-700 transition-colors">
                        <svg class="h-4 w-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                        </svg>
                        Back to Settings
                    </a>
                </div>
            </div>
        </div>

        <!-- Success Message -->
        @if (session('success'))
            <div class="bg-green-50 dark:bg-green-900/20 border border-green-200 dark:border-green-800 rounded-lg p-4">
                <div class="flex items-center">
                    <svg class="h-5 w-5 text-green-400 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <p class="text-green-800 dark:text-green-200">{{ session('success') }}</p>
                </div>
            </div>
        @endif

        <!-- Banner Upload Form -->
        <form method="POST" action="{{ route('admin.settings.banners.update') }}" enctype="multipart/form-data"
            class="space-y-6">
            @csrf

            <!-- Home Banner -->
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6">
                <div class="border-b border-gray-200 dark:border-gray-700 pb-4 mb-6">
                    <h3 class="font-semibold text-lg text-gray-900 dark:text-white">Home Page Banner</h3>
                    <p class="text-sm text-gray-600 dark:text-gray-400 mt-1">Upload banner image for the home page.</p>
                </div>
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-semibold text-gray-900 dark:text-white mb-2">Upload New
                            Banner</label>
                        <input type="file" name="home_banner" accept="image/*"
                            class="w-full rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 px-4 py-3 text-gray-900 dark:text-white transition-colors focus:border-green-500 focus:ring-2 focus:ring-green-500 {{ $errors->has('home_banner') ? 'border-red-500' : '' }}">
                        <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">JPG, PNG, GIF up to 2MB</p>
                        @error('home_banner')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-gray-900 dark:text-white mb-2">Current Banner</label>
                        @if ($banners['home_banner'])
                            <div class="relative">
                                <img src="{{ asset('storage/' . $banners['home_banner']) }}" alt="Home Banner"
                                    class="w-full h-32 object-cover rounded-lg border border-gray-200 dark:border-gray-600">
                                <form method="POST" action="{{ route('admin.settings.banners.delete', 'home_banner') }}"
                                    class="absolute top-2 right-2">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="bg-red-500 text-white p-1 rounded-full hover:bg-red-600 transition-colors"
                                        onclick="return confirm('Are you sure you want to delete this banner?')">
                                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M6 18L18 6M6 6l12 12" />
                                        </svg>
                                    </button>
                                </form>
                            </div>
                        @else
                            <div
                                class="w-full h-32 bg-gray-100 dark:bg-gray-700 rounded-lg border border-gray-200 dark:border-gray-600 flex items-center justify-center">
                                <p class="text-gray-500 dark:text-gray-400">No banner uploaded</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            <!-- About Banner -->
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6">
                <div class="border-b border-gray-200 dark:border-gray-700 pb-4 mb-6">
                    <h3 class="font-semibold text-lg text-gray-900 dark:text-white">About Page Banner</h3>
                    <p class="text-sm text-gray-600 dark:text-gray-400 mt-1">Upload banner image for the about page.</p>
                </div>
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-semibold text-gray-900 dark:text-white mb-2">Upload New
                            Banner</label>
                        <input type="file" name="about_banner" accept="image/*"
                            class="w-full rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 px-4 py-3 text-gray-900 dark:text-white transition-colors focus:border-green-500 focus:ring-2 focus:ring-green-500 {{ $errors->has('about_banner') ? 'border-red-500' : '' }}">
                        <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">JPG, PNG, GIF up to 2MB</p>
                        @error('about_banner')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-gray-900 dark:text-white mb-2">Current Banner</label>
                        @if ($banners['about_banner'])
                            <div class="relative">
                                <img src="{{ asset('storage/' . $banners['about_banner']) }}" alt="About Banner"
                                    class="w-full h-32 object-cover rounded-lg border border-gray-200 dark:border-gray-600">
                                <form method="POST" action="{{ route('admin.settings.banners.delete', 'about_banner') }}"
                                    class="absolute top-2 right-2">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="bg-red-500 text-white p-1 rounded-full hover:bg-red-600 transition-colors"
                                        onclick="return confirm('Are you sure you want to delete this banner?')">
                                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M6 18L18 6M6 6l12 12" />
                                        </svg>
                                    </button>
                                </form>
                            </div>
                        @else
                            <div
                                class="w-full h-32 bg-gray-100 dark:bg-gray-700 rounded-lg border border-gray-200 dark:border-gray-600 flex items-center justify-center">
                                <p class="text-gray-500 dark:text-gray-400">No banner uploaded</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Services Banner -->
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6">
                <div class="border-b border-gray-200 dark:border-gray-700 pb-4 mb-6">
                    <h3 class="font-semibold text-lg text-gray-900 dark:text-white">Services Page Banner</h3>
                    <p class="text-sm text-gray-600 dark:text-gray-400 mt-1">Upload banner image for the services page.</p>
                </div>
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-semibold text-gray-900 dark:text-white mb-2">Upload New
                            Banner</label>
                        <input type="file" name="services_banner" accept="image/*"
                            class="w-full rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 px-4 py-3 text-gray-900 dark:text-white transition-colors focus:border-green-500 focus:ring-2 focus:ring-green-500 {{ $errors->has('services_banner') ? 'border-red-500' : '' }}">
                        <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">JPG, PNG, GIF up to 2MB</p>
                        @error('services_banner')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-gray-900 dark:text-white mb-2">Current
                            Banner</label>
                        @if ($banners['services_banner'])
                            <div class="relative">
                                <img src="{{ asset('storage/' . $banners['services_banner']) }}" alt="Services Banner"
                                    class="w-full h-32 object-cover rounded-lg border border-gray-200 dark:border-gray-600">
                                <form method="POST"
                                    action="{{ route('admin.settings.banners.delete', 'services_banner') }}"
                                    class="absolute top-2 right-2">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="bg-red-500 text-white p-1 rounded-full hover:bg-red-600 transition-colors"
                                        onclick="return confirm('Are you sure you want to delete this banner?')">
                                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M6 18L18 6M6 6l12 12" />
                                        </svg>
                                    </button>
                                </form>
                            </div>
                        @else
                            <div
                                class="w-full h-32 bg-gray-100 dark:bg-gray-700 rounded-lg border border-gray-200 dark:border-gray-600 flex items-center justify-center">
                                <p class="text-gray-500 dark:text-gray-400">No banner uploaded</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Contact Banner -->
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6">
                <div class="border-b border-gray-200 dark:border-gray-700 pb-4 mb-6">
                    <h3 class="font-semibold text-lg text-gray-900 dark:text-white">Contact Page Banner</h3>
                    <p class="text-sm text-gray-600 dark:text-gray-400 mt-1">Upload banner image for the contact page.</p>
                </div>
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-semibold text-gray-900 dark:text-white mb-2">Upload New
                            Banner</label>
                        <input type="file" name="contact_banner" accept="image/*"
                            class="w-full rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 px-4 py-3 text-gray-900 dark:text-white transition-colors focus:border-green-500 focus:ring-2 focus:ring-green-500 {{ $errors->has('contact_banner') ? 'border-red-500' : '' }}">
                        <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">JPG, PNG, GIF up to 2MB</p>
                        @error('contact_banner')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-gray-900 dark:text-white mb-2">Current
                            Banner</label>
                        @if ($banners['contact_banner'])
                            <div class="relative">
                                <img src="{{ asset('storage/' . $banners['contact_banner']) }}" alt="Contact Banner"
                                    class="w-full h-32 object-cover rounded-lg border border-gray-200 dark:border-gray-600">
                                <form method="POST"
                                    action="{{ route('admin.settings.banners.delete', 'contact_banner') }}"
                                    class="absolute top-2 right-2">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="bg-red-500 text-white p-1 rounded-full hover:bg-red-600 transition-colors"
                                        onclick="return confirm('Are you sure you want to delete this banner?')">
                                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M6 18L18 6M6 6l12 12" />
                                        </svg>
                                    </button>
                                </form>
                            </div>
                        @else
                            <div
                                class="w-full h-32 bg-gray-100 dark:bg-gray-700 rounded-lg border border-gray-200 dark:border-gray-600 flex items-center justify-center">
                                <p class="text-gray-500 dark:text-gray-400">No banner uploaded</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Footer Banner -->
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6">
                <div class="border-b border-gray-200 dark:border-gray-700 pb-4 mb-6">
                    <h3 class="font-semibold text-lg text-gray-900 dark:text-white">Footer Banner</h3>
                    <p class="text-sm text-gray-600 dark:text-gray-400 mt-1">Upload banner image for the website footer
                        section.</p>
                </div>
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-semibold text-gray-900 dark:text-white mb-2">Upload New Footer
                            Banner</label>
                        <input type="file" name="footer_banner" accept="image/*"
                            class="w-full rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 px-4 py-3 text-gray-900 dark:text-white transition-colors focus:border-green-500 focus:ring-2 focus:ring-green-500 {{ $errors->has('footer_banner') ? 'border-red-500' : '' }}">
                        <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">JPG, PNG, GIF up to 2MB</p>
                        @error('footer_banner')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-gray-900 dark:text-white mb-2">Current Footer
                            Banner</label>
                        @if ($banners['footer_banner'])
                            <div class="relative">
                                <img src="{{ asset('storage/' . $banners['footer_banner']) }}" alt="Footer Banner"
                                    class="w-full h-32 object-cover rounded-lg border border-gray-200 dark:border-gray-600">
                                <form method="POST"
                                    action="{{ route('admin.settings.banners.delete', 'footer_banner') }}"
                                    class="absolute top-2 right-2">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="bg-red-500 text-white p-1 rounded-full hover:bg-red-600 transition-colors"
                                        onclick="return confirm('Are you sure you want to delete this banner?')">
                                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M6 18L18 6M6 6l12 12" />
                                        </svg>
                                    </button>
                                </form>
                            </div>
                        @else
                            <div
                                class="w-full h-32 bg-gray-100 dark:bg-gray-700 rounded-lg border border-gray-200 dark:border-gray-600 flex items-center justify-center">
                                <p class="text-gray-500 dark:text-gray-400">No footer banner uploaded</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Submit Button -->
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6">
                <div class="flex justify-end">
                    <button type="submit"
                        class="inline-flex items-center justify-center px-6 py-3 bg-green-600 text-white rounded-lg hover:bg-green-700 transition-colors font-semibold">
                        <svg class="h-5 w-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        Update Banners
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection
