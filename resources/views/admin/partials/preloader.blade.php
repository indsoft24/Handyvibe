<!-- ===== Preloader Start ===== -->
<div x-show="!loaded" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0"
    x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-300"
    x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
    class="fixed inset-0 z-9999 flex items-center justify-center bg-white dark:bg-gray-900">
    <div class="flex h-16 w-16 items-center justify-center rounded-full bg-brand-500">
        <div class="h-6 w-6 animate-spin rounded-full border-2 border-white border-t-transparent"></div>
    </div>
</div>
<!-- ===== Preloader End ===== -->
