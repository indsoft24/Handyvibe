@extends('user.layouts.account')

@section('title', 'My Addresses')

@section('content')
<div class="max-w-5xl p-6 mx-auto">
    <div class="grid gap-6 md:grid-cols-2">
        <div class="p-5 bg-white border rounded-xl">
            <div class="mb-3 text-lg font-semibold">Add Address</div>
            <form action="{{ route('user.addresses.store') }}" method="POST" class="grid grid-cols-1 gap-3">
                @csrf
                <input name="name" placeholder="Name" class="w-full px-3 py-2 border rounded"/>
                <input name="phone" placeholder="Phone" class="w-full px-3 py-2 border rounded"/>
                <input name="line1" placeholder="Address line 1" class="w-full px-3 py-2 border rounded"/>
                <input name="line2" placeholder="Address line 2" class="w-full px-3 py-2 border rounded"/>
                <div class="grid grid-cols-2 gap-3">
                    <input name="city" placeholder="City" class="w-full px-3 py-2 border rounded"/>
                    <input name="state" placeholder="State" class="w-full px-3 py-2 border rounded"/>
                </div>
                <div class="grid grid-cols-2 gap-3">
                    <input name="postal_code" placeholder="Postal" class="w-full px-3 py-2 border rounded"/>
                    <input name="country" value="India" class="w-full px-3 py-2 border rounded"/>
                </div>
                <div class="grid grid-cols-2 gap-3">
                    <select name="type" class="w-full px-3 py-2 border rounded">
                        <option value="home">Home</option>
                        <option value="office">Office</option>
                        <option value="other">Other</option>
                    </select>
                    <label class="inline-flex items-center gap-2 text-sm">
                        <input type="checkbox" name="is_primary" value="1" class="rounded border-slate-300"/> Primary
                    </label>
                </div>
                <div class="flex justify-end">
                    <button class="px-3 py-2 text-sm text-white bg-indigo-600 rounded">Save</button>
                </div>
            </form>
        </div>
        <div class="p-5 bg-white border rounded-xl">
            <div class="mb-3 text-lg font-semibold">Your Addresses</div>
            <div class="space-y-3">
                @forelse($addresses as $addr)
                    <form method="POST" action="{{ route('user.addresses.update', $addr) }}" class="p-3 border rounded">
                        @csrf
                        <div class="flex items-center justify-between">
                            <div class="text-sm">
                                <div class="font-medium">{{ $addr->line1 }}, {{ $addr->city }}</div>
                                <div class="text-slate-500">{{ ucfirst($addr->type) }} {{ $addr->is_primary ? '(Primary)' : '' }}</div>
                            </div>
                            <div class="flex items-center gap-2">
                                <label class="inline-flex items-center gap-1 text-xs">
                                    <input type="checkbox" name="is_primary" value="1" class="rounded border-slate-300" {{ $addr->is_primary ? 'checked' : '' }} /> Primary
                                </label>
                                <button class="px-2 py-1 text-xs text-white bg-slate-700 rounded">Update</button>
                            </div>
                        </div>
                    </form>
                    <form method="POST" action="{{ route('user.addresses.destroy', $addr) }}">
                        @csrf
                        @method('DELETE')
                        <button class="text-xs text-rose-600">Delete</button>
                    </form>
                @empty
                    <div class="text-sm">No addresses yet.</div>
                @endforelse
            </div>
        </div>
    </div>
</div>
@endsection


