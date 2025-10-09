@extends('layouts.admin')

@section('title', 'Videos')

@section('content')
<!-- Breadcrumb Start -->
<div x-data="{ pageName: `Videos`}">
  @include('admin.partials.breadcrumb')
</div>
<!-- Breadcrumb End -->

<div class="grid grid-cols-1 gap-4 md:gap-6 sm:grid-cols-2 lg:grid-cols-3">
  @for($i = 1; $i <= 6; $i++)
  <div class="overflow-hidden rounded-2xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03]">
    <div class="relative">
      <img src="{{ asset('images/product-' . $i . '.jpg') }}" alt="Video {{ $i }}" class="w-full h-48 object-cover" />
      <div class="absolute inset-0 flex items-center justify-center">
        <button class="flex h-12 w-12 items-center justify-center rounded-full bg-white/80 hover:bg-white">
          <svg class="h-6 w-6 text-gray-800" fill="currentColor" viewBox="0 0 24 24">
            <path d="M8 5v14l11-7z"/>
          </svg>
        </button>
      </div>
    </div>
    <div class="p-4">
      <h3 class="text-sm font-medium text-gray-800 dark:text-white/90">Video {{ $i }}</h3>
      <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">Duration: {{ $i }}:30</p>
    </div>
  </div>
  @endfor
</div>
@endsection