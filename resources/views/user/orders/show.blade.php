@extends('user.layouts.account')

@section('title', 'Order #'.$order->id)

@section('content')
<div class="max-w-6xl p-6 mx-auto bg-white border rounded-xl shadow-sm">
    <div class="flex items-center justify-between mb-4">
        <div class="text-lg font-semibold">Order #{{ $order->id }}</div>
        <a href="{{ route('user.orders') }}" class="text-slate-600">Back to orders</a>
    </div>
    <div class="grid grid-cols-12 gap-6">
        <div class="col-span-12 lg:col-span-8">
            <div class="overflow-x-auto border rounded">
                <table class="w-full text-sm">
                    <thead class="bg-slate-50 text-slate-500 uppercase text-xs">
                        <tr>
                            <th class="p-2 text-left">Item</th>
                            <th class="p-2 text-left">Type</th>
                            <th class="p-2 text-left">Qty</th>
                            <th class="p-2 text-left">Price</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y">
                        @foreach($order->items as $it)
                        <tr>
                            <td class="p-2">{{ $it->name }}</td>
                            <td class="p-2">{{ ucfirst($it->item_type) }}</td>
                            <td class="p-2">{{ $it->quantity }}</td>
                            <td class="p-2">₹{{ number_format($it->price, 2) }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-span-12 lg:col-span-4">
            <div class="p-4 border rounded">
                <div class="mb-2 text-sm text-slate-500">Summary</div>
                <div class="flex items-center justify-between"><span>Subtotal</span><span>₹{{ number_format($order->subtotal, 2) }}</span></div>
                <div class="flex items-center justify-between"><span>Tax</span><span>₹{{ number_format($order->tax, 2) }}</span></div>
                <div class="flex items-center justify-between font-semibold"><span>Total</span><span>₹{{ number_format($order->total, 2) }}</span></div>
                <div class="mt-3 text-sm text-slate-600">Payment: {{ ucfirst($order->payment_status ?? 'unpaid') }}</div>
            </div>
        </div>
    </div>
</div>
@endsection


