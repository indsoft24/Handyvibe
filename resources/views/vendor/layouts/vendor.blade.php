<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Vendor Dashboard') | Handyvibe</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body class="bg-slate-50">
    <div class="flex min-h-screen">
        <!-- Sidebar -->
        <aside class="w-72 bg-white border-r">
            <!-- Brand -->
            <div class="flex items-center h-16 px-6 border-b">
                <div class="flex items-center gap-2">
                    <span class="inline-flex items-center justify-center w-9 h-9 text-white rounded-lg bg-indigo-600">HV</span>
                    <span class="text-lg font-semibold text-slate-800">HandyVibe</span>
                </div>
            </div>

            <!-- Menu label -->
            <div class="px-6 pt-5 pb-2 text-xs font-medium tracking-wider text-slate-400">MENU</div>

            <nav class="px-2 space-y-1">
                <a href="{{ route('vendor.dashboard') }}" class="flex items-center px-4 py-2 mx-3 text-slate-700 rounded-lg transition hover:bg-slate-100 {{ request()->routeIs('vendor.dashboard') ? 'bg-slate-100 text-slate-900' : '' }}">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
                    Dashboard
                </a>
                <a href="{{ route('vendor.customers.index') }}" class="flex items-center px-4 py-2 mx-3 text-slate-700 rounded-lg transition hover:bg-slate-100 {{ request()->routeIs('vendor.customers.*') ? 'bg-slate-100 text-slate-900' : '' }}">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a4 4 0 00-3-3.87M9 20h6M3 20h5m7-9a4 4 0 100-8 4 4 0 000 8z"/></svg>
                    My Customers
                </a>
                <a href="{{ route('vendor.services.index') }}" class="flex items-center px-4 py-2 mx-3 text-slate-700 rounded-lg transition hover:bg-slate-100 {{ request()->routeIs('vendor.services.*') ? 'bg-slate-100 text-slate-900' : '' }}">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9.75 17L8 21l4-1.75L16 21l-1.75-4L18 13l-4-.25L12 9l-2 3.75L6 13z"/></svg>
                    My Services
                </a>
                <a href="{{ route('vendor.inquiries.index') }}" class="flex items-center px-4 py-2 mx-3 text-slate-700 rounded-lg transition hover:bg-slate-100 {{ request()->routeIs('vendor.inquiries.*') ? 'bg-slate-100 text-slate-900' : '' }}">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M8 10h.01M12 10h.01M16 10h.01M21 12c0 4.418-4.03 8-9 8a9.86 9.86 0 01-4-.8L3 20l.8-4A8.94 8.94 0 013 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/></svg>
                    Inquiries
                </a>
                <a href="{{ route('vendor.profile.edit') }}" class="flex items-center px-4 py-2 mx-3 text-slate-700 rounded-lg transition hover:bg-slate-100 {{ request()->routeIs('vendor.profile.*') ? 'bg-slate-100 text-slate-900' : '' }}">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M11 5a4 4 0 014 4v1a4 4 0 11-8 0V9a4 4 0 014-4zM6 21a6 6 0 1112 0H6z"/></svg>
                    Profile
                </a>
            </nav>
        </aside>

        <!-- Main content -->
        <main class="flex-1">
            <!-- Topbar -->
            <header class="sticky top-0 z-10 bg-white border-b">
                <div class="flex items-center justify-between px-4 py-3 md:px-6">
                    <h1 class="text-lg font-semibold text-slate-800">@yield('title', 'Dashboard')</h1>
                    <div class="flex items-center gap-3">
                        <a href="{{ route('vendor.services.create') }}" class="hidden px-3 py-1.5 text-sm text-white bg-indigo-600 rounded-lg md:inline-flex hover:bg-indigo-700">Add Service</a>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button class="px-3 py-1.5 text-sm text-white bg-rose-600 rounded-lg hover:bg-rose-700">Logout</button>
                        </form>
                    </div>
                </div>
            </header>

            <!-- Page content -->
            <div class="p-4 mx-auto max-w-7xl md:p-6">
                @if(session('success'))
                    <div class="px-4 py-2 mb-4 text-green-900 border border-green-200 rounded bg-green-50">{{ session('success') }}</div>
                @endif
                @if($errors->any())
                    <div class="px-4 py-2 mb-4 text-rose-900 border border-rose-200 rounded bg-rose-50">
                        <ul class="list-disc list-inside">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @yield('content')
            </div>
        </main>
    </div>
    @yield('scripts')
  </body>
</html>


