@extends('user.layouts.account')

@section('title', 'My Account')

@section('content')
<div class="max-w-6xl p-6 mx-auto">
    <div class="grid grid-cols-12 gap-6">
        <div class="col-span-12 md:col-span-4">
            <div class="p-5 bg-white border rounded-xl">
                <div class="text-xs font-medium tracking-wider text-indigo-600 uppercase">Orders</div>
                <div class="mt-2 text-3xl font-semibold">{{ $stats['orders'] }}</div>
            </div>
        </div>
        <div class="col-span-12 md:col-span-4">
            <div class="p-5 bg-white border rounded-xl">
                <div class="text-xs font-medium tracking-wider text-green-600 uppercase">Bookings</div>
                <div class="mt-2 text-3xl font-semibold">{{ $stats['bookings'] }}</div>
            </div>
        </div>
        <div class="col-span-12 md:col-span-4">
            <div class="p-5 bg-white border rounded-xl">
                <a class="text-indigo-600 hover:underline" href="{{ route('user.addresses') }}">Manage Addresses</a>
                <div class="mt-1 text-sm text-slate-500">Add or update your delivery locations.</div>
            </div>
        </div>

        <div class="col-span-12 lg:col-span-6">
            <div class="p-5 bg-white border rounded-xl">
                <div class="mb-3 text-lg font-semibold">Recent Orders</div>
                <div class="overflow-x-auto">
                    <table class="w-full text-sm">
                        <thead class="text-xs tracking-wider text-left text-slate-500 uppercase">
                            <tr>
                                <th class="p-2">Order #</th>
                                <th class="p-2">Status</th>
                                <th class="p-2">Total</th>
                                <th class="p-2">Date</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y">
                            @forelse($orders as $o)
                                <tr>
                                    <td class="p-2">#{{ $o->id }}</td>
                                    <td class="p-2">{{ ucfirst($o->status) }}</td>
                                    <td class="p-2">₹{{ number_format($o->total, 2) }}</td>
                                    <td class="p-2">{{ $o->created_at?->format('d M Y') }}</td>
                                </tr>
                            @empty
                                <tr><td class="p-2" colspan="4">No orders yet.</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-span-12 lg:col-span-6">
            <div class="p-5 bg-white border rounded-xl">
                <div class="mb-3 text-lg font-semibold">Recent Bookings</div>
                <div class="overflow-x-auto">
                    <table class="w-full text-sm">
                        <thead class="text-xs tracking-wider text-left text-slate-500 uppercase">
                            <tr>
                                <th class="p-2">Service</th>
                                <th class="p-2">Status</th>
                                <th class="p-2">Schedule</th>
                                <th class="p-2">Price</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y">
                            @forelse($bookings as $b)
                                <tr>
                                    <td class="p-2">{{ $b->service->name ?? 'Service' }}</td>
                                    <td class="p-2">{{ ucfirst($b->status) }}</td>
                                    <td class="p-2">{{ $b->scheduled_at?->format('d M Y, h:i A') ?? '-' }}</td>
                                    <td class="p-2">₹{{ number_format($b->price, 2) }}</td>
                                </tr>
                            @empty
                                <tr><td class="p-2" colspan="4">No bookings yet.</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


