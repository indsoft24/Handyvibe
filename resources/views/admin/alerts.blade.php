@extends('layouts.admin')

@section('title', 'Alerts')

@section('content')
<!-- Breadcrumb Start -->
<div x-data="{ pageName: `Alerts`}">
  @include('admin.partials.breadcrumb')
</div>
<!-- Breadcrumb End -->

<div class="space-y-6">
  <!-- Success Alert -->
  <div class="overflow-hidden rounded-2xl border border-gray-200 bg-white px-5 pt-5 dark:border-gray-800 dark:bg-white/[0.03] sm:px-6 sm:pt-6">
    <h3 class="text-lg font-semibold text-gray-800 dark:text-white/90 mb-6">
      Success Alert
    </h3>
    
    <div class="rounded-lg bg-success-50 p-4 dark:bg-success-500/15">
      <div class="flex">
        <div class="flex-shrink-0">
          <svg class="h-5 w-5 text-success-400" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
          </svg>
        </div>
        <div class="ml-3">
          <p class="text-sm font-medium text-success-800 dark:text-success-400">
            Success! Your changes have been saved.
          </p>
        </div>
      </div>
    </div>
  </div>
  
  <!-- Error Alert -->
  <div class="overflow-hidden rounded-2xl border border-gray-200 bg-white px-5 pt-5 dark:border-gray-800 dark:bg-white/[0.03] sm:px-6 sm:pt-6">
    <h3 class="text-lg font-semibold text-gray-800 dark:text-white/90 mb-6">
      Error Alert
    </h3>
    
    <div class="rounded-lg bg-error-50 p-4 dark:bg-error-500/15">
      <div class="flex">
        <div class="flex-shrink-0">
          <svg class="h-5 w-5 text-error-400" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
          </svg>
        </div>
        <div class="ml-3">
          <p class="text-sm font-medium text-error-800 dark:text-error-400">
            Error! Something went wrong.
          </p>
        </div>
      </div>
    </div>
  </div>
  
  <!-- Warning Alert -->
  <div class="overflow-hidden rounded-2xl border border-gray-200 bg-white px-5 pt-5 dark:border-gray-800 dark:bg-white/[0.03] sm:px-6 sm:pt-6">
    <h3 class="text-lg font-semibold text-gray-800 dark:text-white/90 mb-6">
      Warning Alert
    </h3>
    
    <div class="rounded-lg bg-warning-50 p-4 dark:bg-warning-500/15">
      <div class="flex">
        <div class="flex-shrink-0">
          <svg class="h-5 w-5 text-warning-400" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
          </svg>
        </div>
        <div class="ml-3">
          <p class="text-sm font-medium text-warning-800 dark:text-warning-400">
            Warning! Please check your input.
          </p>
        </div>
      </div>
    </div>
  </div>
  
  <!-- Info Alert -->
  <div class="overflow-hidden rounded-2xl border border-gray-200 bg-white px-5 pt-5 dark:border-gray-800 dark:bg-white/[0.03] sm:px-6 sm:pt-6">
    <h3 class="text-lg font-semibold text-gray-800 dark:text-white/90 mb-6">
      Info Alert
    </h3>
    
    <div class="rounded-lg bg-blue-light-50 p-4 dark:bg-blue-light-500/15">
      <div class="flex">
        <div class="flex-shrink-0">
          <svg class="h-5 w-5 text-blue-light-400" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" />
          </svg>
        </div>
        <div class="ml-3">
          <p class="text-sm font-medium text-blue-light-800 dark:text-blue-light-400">
            Info! Here's some useful information.
          </p>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection