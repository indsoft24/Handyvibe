@extends('vendor.layouts.vendor')

@section('title', 'Edit Profile')

@section('content')
    <form action="{{ route('vendor.profile.update') }}" method="POST" class="max-w-xl p-6 bg-white border rounded-xl shadow-sm">
        @csrf
        <div class="space-y-4">
            <div>
                <label class="block mb-1 text-sm">Name</label>
                <input name="name" value="{{ old('name', $user->name) }}" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500/40" required />
            </div>
            <div>
                <label class="block mb-1 text-sm">Email</label>
                <input type="email" name="email" value="{{ old('email', $user->email) }}" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500/40" required />
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
        </div>
        <div class="mt-4">
            <button class="px-4 py-2 text-white bg-indigo-600 rounded hover:bg-indigo-700">Save Changes</button>
        </div>
    </form>
@endsection


