@extends('layouts.admin')

@section('title', 'Avatars')

@section('content')
<!-- Breadcrumb Start -->
<div x-data="{ pageName: `Avatars`}">
  @include('admin.partials.breadcrumb')
</div>
<!-- Breadcrumb End -->

<div class="space-y-6">
  <!-- Avatar Sizes -->
  <div class="overflow-hidden rounded-2xl border border-gray-200 bg-white px-5 pt-5 dark:border-gray-800 dark:bg-white/[0.03] sm:px-6 sm:pt-6">
    <h3 class="text-lg font-semibold text-gray-800 dark:text-white/90 mb-6">
      Avatar Sizes
    </h3>
    
    <div class="flex items-center space-x-4">
      <img class="h-8 w-8 rounded-full" src="{{ asset('images/person1.jpg') }}" alt="Avatar" />
      <img class="h-10 w-10 rounded-full" src="{{ asset('images/person2.jpg') }}" alt="Avatar" />
      <img class="h-12 w-12 rounded-full" src="{{ asset('images/person3.jpg') }}" alt="Avatar" />
      <img class="h-16 w-16 rounded-full" src="{{ asset('images/person1.jpg') }}" alt="Avatar" />
      <img class="h-20 w-20 rounded-full" src="{{ asset('images/person2.jpg') }}" alt="Avatar" />
    </div>
  </div>
  
  <!-- Avatar with Status -->
  <div class="overflow-hidden rounded-2xl border border-gray-200 bg-white px-5 pt-5 dark:border-gray-800 dark:bg-white/[0.03] sm:px-6 sm:pt-6">
    <h3 class="text-lg font-semibold text-gray-800 dark:text-white/90 mb-6">
      Avatar with Status
    </h3>
    
    <div class="flex items-center space-x-4">
      <div class="relative">
        <img class="h-12 w-12 rounded-full" src="{{ asset('images/person1.jpg') }}" alt="Avatar" />
        <span class="absolute bottom-0 right-0 h-3 w-3 rounded-full bg-success-500 border-2 border-white"></span>
      </div>
      <div class="relative">
        <img class="h-12 w-12 rounded-full" src="{{ asset('images/person2.jpg') }}" alt="Avatar" />
        <span class="absolute bottom-0 right-0 h-3 w-3 rounded-full bg-warning-500 border-2 border-white"></span>
      </div>
      <div class="relative">
        <img class="h-12 w-12 rounded-full" src="{{ asset('images/person3.jpg') }}" alt="Avatar" />
        <span class="absolute bottom-0 right-0 h-3 w-3 rounded-full bg-error-500 border-2 border-white"></span>
      </div>
    </div>
  </div>
  
  <!-- Avatar Groups -->
  <div class="overflow-hidden rounded-2xl border border-gray-200 bg-white px-5 pt-5 dark:border-gray-800 dark:bg-white/[0.03] sm:px-6 sm:pt-6">
    <h3 class="text-lg font-semibold text-gray-800 dark:text-white/90 mb-6">
      Avatar Groups
    </h3>
    
    <div class="flex -space-x-2">
      <img class="h-10 w-10 rounded-full border-2 border-white dark:border-gray-900" src="{{ asset('images/person1.jpg') }}" alt="Avatar" />
      <img class="h-10 w-10 rounded-full border-2 border-white dark:border-gray-900" src="{{ asset('images/person2.jpg') }}" alt="Avatar" />
      <img class="h-10 w-10 rounded-full border-2 border-white dark:border-gray-900" src="{{ asset('images/person3.jpg') }}" alt="Avatar" />
      <div class="flex h-10 w-10 items-center justify-center rounded-full border-2 border-white bg-gray-100 text-xs font-medium text-gray-600 dark:border-gray-900 dark:bg-gray-800 dark:text-gray-300">
        +2
      </div>
    </div>
  </div>
</div>
@endsection