<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'My Account') | Handyvibe</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-slate-50">
    <div class="flex min-h-screen">
        <!-- Sidebar -->
        <aside class="w-72 bg-white border-r">
            <div class="flex items-center h-16 px-6 border-b">
                <div class="flex items-center gap-2">
                    <span class="inline-flex items-center justify-center w-9 h-9 text-white rounded-lg bg-indigo-600">HV</span>
                    <span class="text-lg font-semibold text-slate-800">HandyVibe</span>
                </div>
            </div>
            <div class="px-6 pt-5 pb-2 text-xs font-medium tracking-wider text-slate-400">ACCOUNT</div>
            <nav class="px-2 space-y-1">
                <a href="{{ route('user.dashboard') }}" class="flex items-center px-4 py-2 mx-3 text-slate-700 rounded-lg transition hover:bg-slate-100 {{ request()->routeIs('user.dashboard') ? 'bg-slate-100 text-slate-900' : '' }}">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
                    Dashboard
                </a>
                <a href="{{ route('user.addresses') }}" class="flex items-center px-4 py-2 mx-3 text-slate-700 rounded-lg transition hover:bg-slate-100 {{ request()->routeIs('user.addresses*') ? 'bg-slate-100 text-slate-900' : '' }}">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a1 1 0 01-1.414 0L6.343 16.657A8 8 0 1117.657 5.343a8 8 0 010 11.314z"/></svg>
                    Addresses
                </a>
                <a href="{{ route('profile.edit') }}" class="flex items-center px-4 py-2 mx-3 text-slate-700 rounded-lg transition hover:bg-slate-100 {{ request()->routeIs('profile.edit') ? 'bg-slate-100 text-slate-900' : '' }}">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5.121 17.804A7 7 0 1118 10m-7 7h7"/></svg>
                    Profile
                </a>
                <a href="{{ route('cart.index') }}" class="flex items-center px-4 py-2 mx-3 text-slate-700 rounded-lg transition hover:bg-slate-100 {{ request()->routeIs('cart.*') ? 'bg-slate-100 text-slate-900' : '' }}">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2 9m5-9v9m6-9l2 9"/></svg>
                    Cart
                </a>
            </nav>
        </aside>

        <!-- Content -->
        <main class="flex-1">
            <header class="sticky top-0 z-10 bg-white border-b">
                <div class="flex items-center justify-between h-16 px-4 md:px-6">
                    <a href="{{ url('/') }}" class="px-3 py-1.5 text-sm rounded-lg hover:bg-slate-100">← Back to Home</a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button class="px-3 py-1.5 text-sm text-white bg-rose-600 rounded-lg hover:bg-rose-700">Logout</button>
                    </form>
                </div>
            </header>
            <div class="p-4 mx-auto max-w-7xl md:p-6">
                @yield('content')
            </div>
        </main>
    </div>
    @yield('scripts')
</body>
</html>


