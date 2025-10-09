@extends('layouts.admin')

@section('title', 'Buttons')

@section('content')
<!-- Breadcrumb Start -->
<div x-data="{ pageName: `Buttons`}">
  @include('admin.partials.breadcrumb')
</div>
<!-- Breadcrumb End -->

<div class="space-y-6">
  <!-- Button Variants -->
  <div class="overflow-hidden rounded-2xl border border-gray-200 bg-white px-5 pt-5 dark:border-gray-800 dark:bg-white/[0.03] sm:px-6 sm:pt-6">
    <h3 class="text-lg font-semibold text-gray-800 dark:text-white/90 mb-6">
      Button Variants
    </h3>
    
    <div class="flex flex-wrap gap-3">
      <button class="rounded-lg bg-brand-500 px-4 py-2 text-sm font-medium text-white hover:bg-brand-600 focus:outline-none focus:ring-2 focus:ring-brand-500 focus:ring-offset-2">
        Primary
      </button>
      <button class="rounded-lg border border-gray-200 bg-white px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-brand-500 focus:ring-offset-2 dark:border-gray-800 dark:bg-gray-900 dark:text-gray-300 dark:hover:bg-gray-800">
        Secondary
      </button>
      <button class="rounded-lg bg-success-500 px-4 py-2 text-sm font-medium text-white hover:bg-success-600 focus:outline-none focus:ring-2 focus:ring-success-500 focus:ring-offset-2">
        Success
      </button>
      <button class="rounded-lg bg-warning-500 px-4 py-2 text-sm font-medium text-white hover:bg-warning-600 focus:outline-none focus:ring-2 focus:ring-warning-500 focus:ring-offset-2">
        Warning
      </button>
      <button class="rounded-lg bg-error-500 px-4 py-2 text-sm font-medium text-white hover:bg-error-600 focus:outline-none focus:ring-2 focus:ring-error-500 focus:ring-offset-2">
        Error
      </button>
    </div>
  </div>
  
  <!-- Button Sizes -->
  <div class="overflow-hidden rounded-2xl border border-gray-200 bg-white px-5 pt-5 dark:border-gray-800 dark:bg-white/[0.03] sm:px-6 sm:pt-6">
    <h3 class="text-lg font-semibold text-gray-800 dark:text-white/90 mb-6">
      Button Sizes
    </h3>
    
    <div class="flex flex-wrap items-center gap-3">
      <button class="rounded-md bg-brand-500 px-2.5 py-1.5 text-xs font-medium text-white hover:bg-brand-600 focus:outline-none focus:ring-2 focus:ring-brand-500 focus:ring-offset-2">
        Small
      </button>
      <button class="rounded-lg bg-brand-500 px-4 py-2 text-sm font-medium text-white hover:bg-brand-600 focus:outline-none focus:ring-2 focus:ring-brand-500 focus:ring-offset-2">
        Medium
      </button>
      <button class="rounded-lg bg-brand-500 px-6 py-3 text-base font-medium text-white hover:bg-brand-600 focus:outline-none focus:ring-2 focus:ring-brand-500 focus:ring-offset-2">
        Large
      </button>
    </div>
  </div>
  
  <!-- Button States -->
  <div class="overflow-hidden rounded-2xl border border-gray-200 bg-white px-5 pt-5 dark:border-gray-800 dark:bg-white/[0.03] sm:px-6 sm:pt-6">
    <h3 class="text-lg font-semibold text-gray-800 dark:text-white/90 mb-6">
      Button States
    </h3>
    
    <div class="flex flex-wrap gap-3">
      <button class="rounded-lg bg-brand-500 px-4 py-2 text-sm font-medium text-white hover:bg-brand-600 focus:outline-none focus:ring-2 focus:ring-brand-500 focus:ring-offset-2">
        Normal
      </button>
      <button class="rounded-lg bg-brand-500 px-4 py-2 text-sm font-medium text-white opacity-50 cursor-not-allowed">
        Disabled
      </button>
      <button class="rounded-lg bg-brand-500 px-4 py-2 text-sm font-medium text-white hover:bg-brand-600 focus:outline-none focus:ring-2 focus:ring-brand-500 focus:ring-offset-2 ring-2 ring-brand-500">
        Focused
      </button>
    </div>
  </div>
  
  <!-- Button with Icons -->
  <div class="overflow-hidden rounded-2xl border border-gray-200 bg-white px-5 pt-5 dark:border-gray-800 dark:bg-white/[0.03] sm:px-6 sm:pt-6">
    <h3 class="text-lg font-semibold text-gray-800 dark:text-white/90 mb-6">
      Button with Icons
    </h3>
    
    <div class="flex flex-wrap gap-3">
      <button class="flex items-center gap-2 rounded-lg bg-brand-500 px-4 py-2 text-sm font-medium text-white hover:bg-brand-600 focus:outline-none focus:ring-2 focus:ring-brand-500 focus:ring-offset-2">
        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
        </svg>
        Add Item
      </button>
      <button class="flex items-center gap-2 rounded-lg border border-gray-200 bg-white px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-brand-500 focus:ring-offset-2 dark:border-gray-800 dark:bg-gray-900 dark:text-gray-300 dark:hover:bg-gray-800">
        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12" />
        </svg>
        Upload
      </button>
      <button class="flex items-center gap-2 rounded-lg bg-error-500 px-4 py-2 text-sm font-medium text-white hover:bg-error-600 focus:outline-none focus:ring-2 focus:ring-error-500 focus:ring-offset-2">
        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
        </svg>
        Delete
      </button>
    </div>
  </div>
</div>
@endsection