@extends('layouts.admin')

@section('title', 'Videos')

@section('content')
    <div class="rounded-lg border border-gray-200 bg-white p-6 shadow-sm dark:border-gray-800 dark:bg-black">
        <div class="mb-4 flex items-center justify-between">
            <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Video Management</h3>
        </div>
        <div class="h-96 rounded-lg bg-gray-100 dark:bg-gray-800 flex items-center justify-center">
            <div class="text-center">
                <svg class="mx-auto h-16 w-16 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z">
                    </path>
                </svg>
                <p class="mt-2 text-sm text-gray-500 dark:text-gray-400">Video Management</p>
                <p class="text-xs text-gray-400">Video upload and management coming soon</p>
            </div>
        </div>
    </div>
@endsection
