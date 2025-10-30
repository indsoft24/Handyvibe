<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Account') | Handyvibe</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-slate-50">
    <header class="sticky top-0 z-10 bg-white border-b">
        <div class="flex items-center justify-between h-16 px-4 mx-auto max-w-7xl md:px-6">
            <a href="/" class="inline-flex items-center gap-2">
                <span class="inline-flex items-center justify-center w-9 h-9 text-white rounded-lg bg-indigo-600">HV</span>
                <span class="text-lg font-semibold text-slate-800">HandyVibe</span>
            </a>
            <nav class="flex items-center gap-3">
                <a class="px-3 py-1.5 text-sm rounded-lg hover:bg-slate-100" href="{{ route('user.dashboard') }}">Dashboard</a>
                <a class="px-3 py-1.5 text-sm rounded-lg hover:bg-slate-100" href="{{ route('user.addresses') }}">Addresses</a>
                <a class="px-3 py-1.5 text-sm rounded-lg hover:bg-slate-100" href="{{ route('profile.edit') }}">Profile</a>
                <a class="px-3 py-1.5 text-sm text-white bg-indigo-600 rounded-lg hover:bg-indigo-700" href="{{ route('cart.index') }}">Cart</a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="px-3 py-1.5 text-sm text-white bg-rose-600 rounded-lg hover:bg-rose-700">Logout</button>
                </form>
            </nav>
        </div>
    </header>
    <main>
        <div class="p-4 mx-auto max-w-7xl md:p-6">
            @yield('content')
        </div>
    </main>
    @yield('scripts')
</body>
</html>


