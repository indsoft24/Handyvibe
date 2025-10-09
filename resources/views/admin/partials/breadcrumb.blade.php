<div class="mb-6 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
  <h2 class="text-title-md2 font-semibold text-gray-800 dark:text-white">
    {{ $pageName ?? 'Dashboard' }}
  </h2>

  <nav>
    <ol class="flex items-center gap-2">
      <li>
        <a class="font-medium" href="{{ route('admin.dashboard') }}">Dashboard /</a>
      </li>
      <li class="font-medium text-brand-500">{{ $pageName ?? 'Dashboard' }}</li>
    </ol>
  </nav>
</div>