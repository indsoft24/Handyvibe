@extends('user.layouts.account')

@section('title', 'My Orders')

@section('content')
<div class="max-w-6xl p-6 mx-auto bg-white border rounded-xl shadow-sm">
    <div class="mb-4 text-lg font-semibold">Orders</div>
    <div class="overflow-x-auto">
        <table class="w-full text-sm">
            <thead class="bg-slate-50 text-slate-500 uppercase text-xs">
                <tr>
                    <th class="p-2 text-left">Order #</th>
                    <th class="p-2 text-left">Status</th>
                    <th class="p-2 text-left">Payment</th>
                    <th class="p-2 text-left">Total</th>
                    <th class="p-2 text-left">Date</th>
                </tr>
            </thead>
            <tbody class="divide-y">
                @forelse($orders as $o)
                    <tr>
                        <td class="p-2"><a class="text-indigo-600" href="{{ route('user.orders.show', $o) }}">#{{ $o->id }}</a></td>
                        <td class="p-2">{{ ucfirst($o->status) }}</td>
                        <td class="p-2">{{ ucfirst($o->payment_status ?? 'unpaid') }}</td>
                        <td class="p-2">₹{{ number_format($o->total, 2) }}</td>
                        <td class="p-2">{{ $o->created_at?->format('d M Y') }}</td>
                    </tr>
                @empty
                    <tr><td class="p-2" colspan="5">No orders yet.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="mt-4">{{ $orders->links() }}</div>
    <div class="mt-4"><a class="text-indigo-600" href="{{ route('product') }}">Continue shopping</a></div>
  </div>
@endsection


