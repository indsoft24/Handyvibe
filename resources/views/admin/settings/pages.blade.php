@extends('layouts.admin')

@section('title', 'Page Content Management')

@section('content')
    <div class="space-y-6">
        <!-- Page Header -->
        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6">
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                <div class="flex items-center space-x-3">
                    <div class="p-2 bg-blue-100 dark:bg-blue-900 rounded-lg">
                        <svg class="h-6 w-6 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                    </div>
                    <div>
                        <h1 class="text-2xl font-bold text-gray-900 dark:text-white">Page Content Management</h1>
                        <p class="text-sm text-gray-600 dark:text-gray-400">Manage content for website pages</p>
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

        <!-- Page Content Form -->
        <form method="POST" action="{{ route('admin.settings.pages.update') }}" class="space-y-6">
            @csrf

            <!-- Terms and Conditions -->
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6">
                <div class="border-b border-gray-200 dark:border-gray-700 pb-4 mb-6">
                    <h3 class="font-semibold text-lg text-gray-900 dark:text-white">Terms and Conditions</h3>
                    <p class="text-sm text-gray-600 dark:text-gray-400 mt-1">Manage the terms and conditions page content.
                    </p>
                </div>
                <div>
                    <label class="block text-sm font-semibold text-gray-900 dark:text-white mb-2">Content</label>
                    <textarea name="terms_conditions" id="terms_conditions"
                        class="w-full rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-white transition-colors focus:border-blue-500 focus:ring-2 focus:ring-blue-500 {{ $errors->has('terms_conditions') ? 'border-red-500' : '' }}">{{ old('terms_conditions', $pages['terms_conditions']) }}</textarea>
                    @error('terms_conditions')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- About Us -->
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6">
                <div class="border-b border-gray-200 dark:border-gray-700 pb-4 mb-6">
                    <h3 class="font-semibold text-lg text-gray-900 dark:text-white">About Us</h3>
                    <p class="text-sm text-gray-600 dark:text-gray-400 mt-1">Manage the about us page content and information.</p>
                </div>
                
                <!-- About Content -->
                <div class="mb-6">
                    <label class="block text-sm font-semibold text-gray-900 dark:text-white mb-2">Page Content</label>
                    <textarea name="about_us" id="about_us"
                        class="w-full rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-white transition-colors focus:border-blue-500 focus:ring-2 focus:ring-blue-500 {{ $errors->has('about_us') ? 'border-red-500' : '' }}">{{ old('about_us', $pages['about_us']) }}</textarea>
                    @error('about_us')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Hero Section -->
                <div class="mb-6">
                    <h4 class="font-semibold text-md text-gray-900 dark:text-white mb-4">Hero Section</h4>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-semibold text-gray-900 dark:text-white mb-2">Hero Title</label>
                            <input type="text" name="about_hero_title" id="about_hero_title"
                                class="w-full rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-white transition-colors focus:border-blue-500 focus:ring-2 focus:ring-blue-500 {{ $errors->has('about_hero_title') ? 'border-red-500' : '' }}"
                                value="{{ old('about_hero_title', $aboutSettings['about_hero_title']) }}"
                                placeholder="Enter hero title">
                            @error('about_hero_title')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-gray-900 dark:text-white mb-2">Hero Subtitle</label>
                            <input type="text" name="about_hero_subtitle" id="about_hero_subtitle"
                                class="w-full rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-white transition-colors focus:border-blue-500 focus:ring-2 focus:ring-blue-500 {{ $errors->has('about_hero_subtitle') ? 'border-red-500' : '' }}"
                                value="{{ old('about_hero_subtitle', $aboutSettings['about_hero_subtitle']) }}"
                                placeholder="Enter hero subtitle">
                            @error('about_hero_subtitle')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="mt-4">
                        <label class="block text-sm font-semibold text-gray-900 dark:text-white mb-2">Hero Description</label>
                        <textarea name="about_hero_description" id="about_hero_description"
                            class="w-full rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-white transition-colors focus:border-blue-500 focus:ring-2 focus:ring-blue-500 {{ $errors->has('about_hero_description') ? 'border-red-500' : '' }}"
                            rows="3"
                            placeholder="Enter hero description">{{ old('about_hero_description', $aboutSettings['about_hero_description']) }}</textarea>
                        @error('about_hero_description')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Story Section -->
                <div class="mb-6">
                    <h4 class="font-semibold text-md text-gray-900 dark:text-white mb-4">Story Section</h4>
                    <div class="mb-4">
                        <label class="block text-sm font-semibold text-gray-900 dark:text-white mb-2">Story Title</label>
                        <input type="text" name="about_story_title" id="about_story_title"
                            class="w-full rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-white transition-colors focus:border-blue-500 focus:ring-2 focus:ring-blue-500 {{ $errors->has('about_story_title') ? 'border-red-500' : '' }}"
                            value="{{ old('about_story_title', $aboutSettings['about_story_title']) }}"
                            placeholder="Enter story section title">
                        @error('about_story_title')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-gray-900 dark:text-white mb-2">Story Content</label>
                        <textarea name="about_story_content" id="about_story_content"
                            class="w-full rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-white transition-colors focus:border-blue-500 focus:ring-2 focus:ring-blue-500 {{ $errors->has('about_story_content') ? 'border-red-500' : '' }}"
                            rows="5"
                            placeholder="Enter story content">{{ old('about_story_content', $aboutSettings['about_story_content']) }}</textarea>
                        @error('about_story_content')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- What We Do Section -->
                <div class="mb-6">
                    <h4 class="font-semibold text-md text-gray-900 dark:text-white mb-4">What We Do Section</h4>
                    <div class="mb-4">
                        <label class="block text-sm font-semibold text-gray-900 dark:text-white mb-2">Section Title</label>
                        <input type="text" name="about_what_we_do_title" id="about_what_we_do_title"
                            class="w-full rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-white transition-colors focus:border-blue-500 focus:ring-2 focus:ring-blue-500 {{ $errors->has('about_what_we_do_title') ? 'border-red-500' : '' }}"
                            value="{{ old('about_what_we_do_title', $aboutSettings['about_what_we_do_title']) }}"
                            placeholder="Enter what we do title">
                        @error('about_what_we_do_title')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-gray-900 dark:text-white mb-2">Section Description</label>
                        <textarea name="about_what_we_do_description" id="about_what_we_do_description"
                            class="w-full rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-white transition-colors focus:border-blue-500 focus:ring-2 focus:ring-blue-500 {{ $errors->has('about_what_we_do_description') ? 'border-red-500' : '' }}"
                            rows="3"
                            placeholder="Enter what we do description">{{ old('about_what_we_do_description', $aboutSettings['about_what_we_do_description']) }}</textarea>
                        @error('about_what_we_do_description')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Quality Section -->
                <div class="mb-6">
                    <h4 class="font-semibold text-md text-gray-900 dark:text-white mb-4">Quality Section</h4>
                    <div class="mb-4">
                        <label class="block text-sm font-semibold text-gray-900 dark:text-white mb-2">Quality Title</label>
                        <input type="text" name="about_quality_title" id="about_quality_title"
                            class="w-full rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-white transition-colors focus:border-blue-500 focus:ring-2 focus:ring-blue-500 {{ $errors->has('about_quality_title') ? 'border-red-500' : '' }}"
                            value="{{ old('about_quality_title', $aboutSettings['about_quality_title']) }}"
                            placeholder="Enter quality section title">
                        @error('about_quality_title')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-gray-900 dark:text-white mb-2">Quality Content</label>
                        <textarea name="about_quality_content" id="about_quality_content"
                            class="w-full rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-white transition-colors focus:border-blue-500 focus:ring-2 focus:ring-blue-500 {{ $errors->has('about_quality_content') ? 'border-red-500' : '' }}"
                            rows="5"
                            placeholder="Enter quality content">{{ old('about_quality_content', $aboutSettings['about_quality_content']) }}</textarea>
                        @error('about_quality_content')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Call to Action Section -->
                <div class="mb-6">
                    <h4 class="font-semibold text-md text-gray-900 dark:text-white mb-4">Call to Action Section</h4>
                    <div class="mb-4">
                        <label class="block text-sm font-semibold text-gray-900 dark:text-white mb-2">CTA Title</label>
                        <input type="text" name="about_cta_title" id="about_cta_title"
                            class="w-full rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-white transition-colors focus:border-blue-500 focus:ring-2 focus:ring-blue-500 {{ $errors->has('about_cta_title') ? 'border-red-500' : '' }}"
                            value="{{ old('about_cta_title', $aboutSettings['about_cta_title']) }}"
                            placeholder="Enter CTA title">
                        @error('about_cta_title')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-gray-900 dark:text-white mb-2">CTA Description</label>
                        <textarea name="about_cta_description" id="about_cta_description"
                            class="w-full rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-white transition-colors focus:border-blue-500 focus:ring-2 focus:ring-blue-500 {{ $errors->has('about_cta_description') ? 'border-red-500' : '' }}"
                            rows="3"
                            placeholder="Enter CTA description">{{ old('about_cta_description', $aboutSettings['about_cta_description']) }}</textarea>
                        @error('about_cta_description')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- Help -->
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6">
                <div class="border-b border-gray-200 dark:border-gray-700 pb-4 mb-6">
                    <h3 class="font-semibold text-lg text-gray-900 dark:text-white">Help</h3>
                    <p class="text-sm text-gray-600 dark:text-gray-400 mt-1">Manage the help page content.</p>
                </div>
                <div>
                    <label class="block text-sm font-semibold text-gray-900 dark:text-white mb-2">Content</label>
                    <textarea name="help" id="help"
                        class="w-full rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-white transition-colors focus:border-blue-500 focus:ring-2 focus:ring-blue-500 {{ $errors->has('help') ? 'border-red-500' : '' }}">{{ old('help', $pages['help']) }}</textarea>
                    @error('help')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Contact -->
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6">
                <div class="border-b border-gray-200 dark:border-gray-700 pb-4 mb-6">
                    <h3 class="font-semibold text-lg text-gray-900 dark:text-white">Contact</h3>
                    <p class="text-sm text-gray-600 dark:text-gray-400 mt-1">Manage the contact page content and information.</p>
                </div>
                
                <!-- Contact Content -->
                <div class="mb-6">
                    <label class="block text-sm font-semibold text-gray-900 dark:text-white mb-2">Page Content</label>
                    <textarea name="contact" id="contact"
                        class="w-full rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-white transition-colors focus:border-blue-500 focus:ring-2 focus:ring-blue-500 {{ $errors->has('contact') ? 'border-red-500' : '' }}">{{ old('contact', $pages['contact']) }}</textarea>
                    @error('contact')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Contact Information -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div>
                        <label class="block text-sm font-semibold text-gray-900 dark:text-white mb-2">Company Address</label>
                        <input type="text" name="contact_address" id="contact_address"
                            class="w-full rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-white transition-colors focus:border-blue-500 focus:ring-2 focus:ring-blue-500 {{ $errors->has('contact_address') ? 'border-red-500' : '' }}"
                            value="{{ old('contact_address', $contactSettings['contact_address']) }}"
                            placeholder="Enter company address">
                        @error('contact_address')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-900 dark:text-white mb-2">Phone Number</label>
                        <input type="text" name="contact_phone" id="contact_phone"
                            class="w-full rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-white transition-colors focus:border-blue-500 focus:ring-2 focus:ring-blue-500 {{ $errors->has('contact_phone') ? 'border-red-500' : '' }}"
                            value="{{ old('contact_phone', $contactSettings['contact_phone']) }}"
                            placeholder="Enter phone number">
                        @error('contact_phone')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-900 dark:text-white mb-2">Email Address</label>
                        <input type="email" name="contact_email" id="contact_email"
                            class="w-full rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-white transition-colors focus:border-blue-500 focus:ring-2 focus:ring-blue-500 {{ $errors->has('contact_email') ? 'border-red-500' : '' }}"
                            value="{{ old('contact_email', $contactSettings['contact_email']) }}"
                            placeholder="Enter email address">
                        @error('contact_email')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- Team -->
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6">
                <div class="border-b border-gray-200 dark:border-gray-700 pb-4 mb-6">
                    <h3 class="font-semibold text-lg text-gray-900 dark:text-white">Team</h3>
                    <p class="text-sm text-gray-600 dark:text-gray-400 mt-1">Manage the team page content.</p>
                </div>
                <div>
                    <label class="block text-sm font-semibold text-gray-900 dark:text-white mb-2">Content</label>
                    <textarea name="team" id="team"
                        class="w-full rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-white transition-colors focus:border-blue-500 focus:ring-2 focus:ring-blue-500 {{ $errors->has('team') ? 'border-red-500' : '' }}">{{ old('team', $pages['team']) }}</textarea>
                    @error('team')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Privacy Policy -->
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6">
                <div class="border-b border-gray-200 dark:border-gray-700 pb-4 mb-6">
                    <h3 class="font-semibold text-lg text-gray-900 dark:text-white">Privacy Policy</h3>
                    <p class="text-sm text-gray-600 dark:text-gray-400 mt-1">Manage the privacy policy page content.</p>
                </div>
                <div>
                    <label class="block text-sm font-semibold text-gray-900 dark:text-white mb-2">Content</label>
                    <textarea name="privacy_policy" id="privacy_policy"
                        class="w-full rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-white transition-colors focus:border-blue-500 focus:ring-2 focus:ring-blue-500 {{ $errors->has('privacy_policy') ? 'border-red-500' : '' }}">{{ old('privacy_policy', $pages['privacy_policy']) }}</textarea>
                    @error('privacy_policy')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Submit Button -->
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6">
                <div class="flex justify-end">
                    <button type="submit"
                        class="inline-flex items-center justify-center px-6 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors font-semibold">
                        <svg class="h-5 w-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        Update All Pages
                    </button>
                </div>
            </div>
        </form>
    </div>

    <!-- CKEditor CDN -->
    <script src="https://cdn.ckeditor.com/ckeditor5/40.0.0/classic/ckeditor.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Initialize CKEditor for all textareas
            const editors = [
                'terms_conditions',
                'about_us',
                'help',
                'contact',
                'team',
                'privacy_policy',
                'about_story_content',
                'about_quality_content'
            ];

            editors.forEach(editorId => {
                ClassicEditor
                    .create(document.querySelector(`#${editorId}`), {
                        toolbar: {
                            items: [
                                'heading',
                                '|',
                                'bold',
                                'italic',
                                'underline',
                                'strikethrough',
                                '|',
                                'fontSize',
                                'fontFamily',
                                'fontColor',
                                'fontBackgroundColor',
                                '|',
                                'bulletedList',
                                'numberedList',
                                '|',
                                'outdent',
                                'indent',
                                '|',
                                'alignment',
                                '|',
                                'link',
                                'blockQuote',
                                'insertTable',
                                '|',
                                'undo',
                                'redo'
                            ]
                        },
                        language: 'en',
                        image: {
                            toolbar: [
                                'imageTextAlternative',
                                'imageStyle:full',
                                'imageStyle:side'
                            ]
                        },
                        table: {
                            contentToolbar: [
                                'tableColumn',
                                'tableRow',
                                'mergeTableCells'
                            ]
                        }
                    })
                    .then(editor => {
                        console.log(`CKEditor initialized for ${editorId}`);
                    })
                    .catch(error => {
                        console.error(`Error initializing CKEditor for ${editorId}:`, error);
                    });
            });
        });
    </script>
@endsection
