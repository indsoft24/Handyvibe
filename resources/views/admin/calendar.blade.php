@extends('layouts.admin')

@section('title', 'Calendar')

@section('content')
    <div class="rounded-lg border border-gray-200 bg-white p-6 shadow-sm dark:border-gray-800 dark:bg-black">
        <div class="mb-4 flex items-center justify-between">
            <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Calendar</h3>
        </div>
        <div class="h-96 rounded-lg bg-gray-100 dark:bg-gray-800 flex items-center justify-center">
            <div class="text-center">
                <svg class="mx-auto h-16 w-16 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                </svg>
                <p class="mt-2 text-sm text-gray-500 dark:text-gray-400">Calendar Integration</p>
                <p class="text-xs text-gray-400">Calendar functionality coming soon</p>
            </div>
        </div>
    </div>
@endsection
