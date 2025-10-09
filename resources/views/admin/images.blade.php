@extends('layouts.admin')

@section('title', 'Images')

@section('content')
<!-- Breadcrumb Start -->
<div x-data="{ pageName: `Images`}">
  @include('admin.partials.breadcrumb')
</div>
<!-- Breadcrumb End -->

<div class="grid grid-cols-1 gap-4 md:gap-6 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
  @for($i = 1; $i <= 8; $i++)
  <div class="overflow-hidden rounded-2xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03]">
    <img src="{{ asset('images/product-' . $i . '.jpg') }}" alt="Image {{ $i }}" class="w-full h-48 object-cover" />
    <div class="p-4">
      <h3 class="text-sm font-medium text-gray-800 dark:text-white/90">Image {{ $i }}</h3>
      <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">Uploaded {{ $i }} days ago</p>
    </div>
  </div>
  @endfor
</div>
@endsection