@extends('user.layouts.account')

@section('title', 'Edit Profile')

@section('content')
<div class="max-w-3xl p-6 mx-auto bg-white border rounded-xl shadow-sm">
    <h1 class="mb-4 text-xl font-semibold">Profile</h1>
    @if(session('success'))
        <div class="px-4 py-2 mb-4 text-green-800 bg-green-100 border border-green-200 rounded">{{ session('success') }}</div>
    @endif
    @if($errors->any())
        <div class="px-4 py-2 mb-4 text-red-800 bg-red-100 border border-red-200 rounded">
            <ul class="list-disc list-inside">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form method="POST" action="{{ route('profile.update') }}" class="space-y-4">
        @csrf
        <div>
            <label class="block mb-1 text-sm">Name</label>
            <input name="name" value="{{ old('name', $user->name) }}" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500/40" />
        </div>
        <div>
            <label class="block mb-1 text-sm">Email</label>
            <input type="email" name="email" value="{{ old('email', $user->email) }}" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500/40" />
        </div>
        <div>
            <label class="block mb-1 text-sm">Mobile</label>
            <input name="mobile" value="{{ old('mobile', $user->mobile) }}" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500/40" />
        </div>
        <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
            <div>
                <label class="block mb-1 text-sm">New Password</label>
                <input type="password" name="password" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500/40" />
            </div>
            <div>
                <label class="block mb-1 text-sm">Confirm Password</label>
                <input type="password" name="password_confirmation" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500/40" />
            </div>
        </div>
        <div>
            <button class="px-4 py-2 text-white bg-indigo-600 rounded-lg hover:bg-indigo-700">Save</button>
        </div>
    </form>
</div>
@endsection


