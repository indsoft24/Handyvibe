@extends('layouts.admin')

@section('title', 'Badges')

@section('content')
<!-- Breadcrumb Start -->
<div x-data="{ pageName: `Badges`}">
  @include('admin.partials.breadcrumb')
</div>
<!-- Breadcrumb End -->

<div class="space-y-6">
  <!-- Basic Badges -->
  <div class="overflow-hidden rounded-2xl border border-gray-200 bg-white px-5 pt-5 dark:border-gray-800 dark:bg-white/[0.03] sm:px-6 sm:pt-6">
    <h3 class="text-lg font-semibold text-gray-800 dark:text-white/90 mb-6">
      Basic Badges
    </h3>
    
    <div class="flex flex-wrap gap-2">
      <span class="inline-flex items-center rounded-full bg-brand-100 px-2.5 py-0.5 text-xs font-medium text-brand-800 dark:bg-brand-500/20 dark:text-brand-400">
        Brand
      </span>
      <span class="inline-flex items-center rounded-full bg-success-100 px-2.5 py-0.5 text-xs font-medium text-success-800 dark:bg-success-500/20 dark:text-success-400">
        Success
      </span>
      <span class="inline-flex items-center rounded-full bg-warning-100 px-2.5 py-0.5 text-xs font-medium text-warning-800 dark:bg-warning-500/20 dark:text-warning-400">
        Warning
      </span>
      <span class="inline-flex items-center rounded-full bg-error-100 px-2.5 py-0.5 text-xs font-medium text-error-800 dark:bg-error-500/20 dark:text-error-400">
        Error
      </span>
      <span class="inline-flex items-center rounded-full bg-gray-100 px-2.5 py-0.5 text-xs font-medium text-gray-800 dark:bg-gray-500/20 dark:text-gray-400">
        Gray
      </span>
    </div>
  </div>
  
  <!-- Badge Sizes -->
  <div class="overflow-hidden rounded-2xl border border-gray-200 bg-white px-5 pt-5 dark:border-gray-800 dark:bg-white/[0.03] sm:px-6 sm:pt-6">
    <h3 class="text-lg font-semibold text-gray-800 dark:text-white/90 mb-6">
      Badge Sizes
    </h3>
    
    <div class="flex flex-wrap items-center gap-4">
      <span class="inline-flex items-center rounded-full bg-brand-100 px-2 py-0.5 text-xs font-medium text-brand-800 dark:bg-brand-500/20 dark:text-brand-400">
        Small
      </span>
      <span class="inline-flex items-center rounded-full bg-brand-100 px-2.5 py-0.5 text-sm font-medium text-brand-800 dark:bg-brand-500/20 dark:text-brand-400">
        Medium
      </span>
      <span class="inline-flex items-center rounded-full bg-brand-100 px-3 py-1 text-sm font-medium text-brand-800 dark:bg-brand-500/20 dark:text-brand-400">
        Large
      </span>
    </div>
  </div>
  
  <!-- Badge with Icons -->
  <div class="overflow-hidden rounded-2xl border border-gray-200 bg-white px-5 pt-5 dark:border-gray-800 dark:bg-white/[0.03] sm:px-6 sm:pt-6">
    <h3 class="text-lg font-semibold text-gray-800 dark:text-white/90 mb-6">
      Badge with Icons
    </h3>
    
    <div class="flex flex-wrap gap-2">
      <span class="inline-flex items-center gap-1 rounded-full bg-success-100 px-2.5 py-0.5 text-xs font-medium text-success-800 dark:bg-success-500/20 dark:text-success-400">
        <svg class="h-3 w-3" fill="currentColor" viewBox="0 0 20 20">
          <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
        </svg>
        Active
      </span>
      <span class="inline-flex items-center gap-1 rounded-full bg-error-100 px-2.5 py-0.5 text-xs font-medium text-error-800 dark:bg-error-500/20 dark:text-error-400">
        <svg class="h-3 w-3" fill="currentColor" viewBox="0 0 20 20">
          <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
        </svg>
        Inactive
      </span>
      <span class="inline-flex items-center gap-1 rounded-full bg-warning-100 px-2.5 py-0.5 text-xs font-medium text-warning-800 dark:bg-warning-500/20 dark:text-warning-400">
        <svg class="h-3 w-3" fill="currentColor" viewBox="0 0 20 20">
          <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
        </svg>
        Pending
      </span>
    </div>
  </div>
</div>
@endsection