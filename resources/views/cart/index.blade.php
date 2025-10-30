@extends('user.layouts.account')

@section('title', 'Your Cart')

@section('content')
<div class="max-w-5xl p-6 mx-auto bg-white border rounded-xl shadow-sm">
    <div class="flex items-center justify-between mb-4">
        <h2 class="text-xl font-semibold">Cart</h2>
        <a href="{{ route('checkout.show') }}" class="px-4 py-2 text-white bg-indigo-600 rounded hover:bg-indigo-700">Checkout</a>
    </div>

    <div class="grid gap-6 md:grid-cols-2">
        <div>
            <div class="mb-2 text-sm font-medium text-slate-600">Products</div>
            <div class="overflow-x-auto border rounded">
                <table class="w-full text-sm">
                    <thead class="bg-slate-50">
                        <tr class="text-left text-slate-500">
                            <th class="p-2">Name</th>
                            <th class="p-2">Qty</th>
                            <th class="p-2">Price</th>
                            <th class="p-2">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y">
                        @forelse($cart['products'] as $item)
                        <tr>
                            <td class="p-2">{{ $item['name'] }}</td>
                            <td class="p-2">
                                <form method="POST" action="{{ route('cart.update.product', $item['id']) }}" class="inline-flex items-center gap-2">
                                    @csrf
                                    <input type="number" name="quantity" value="{{ $item['quantity'] }}" min="1" class="w-16 px-2 py-1 border rounded" />
                                    <button class="px-2 py-1 text-xs text-white bg-slate-700 rounded">Update</button>
                                </form>
                            </td>
                            <td class="p-2">₹{{ number_format($item['price'], 2) }}</td>
                            <td class="p-2">
                                <form method="POST" action="{{ route('cart.remove.product', $item['id']) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button class="px-2 py-1 text-xs text-white bg-rose-600 rounded">Remove</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr><td class="p-2" colspan="4">No products</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        <div>
            <div class="mb-2 text-sm font-medium text-slate-600">Services</div>
            <div class="overflow-x-auto border rounded">
                <table class="w-full text-sm">
                    <thead class="bg-slate-50">
                        <tr class="text-left text-slate-500">
                            <th class="p-2">Name</th>
                            <th class="p-2">Price</th>
                            <th class="p-2">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y">
                        @forelse($cart['services'] as $item)
                        <tr>
                            <td class="p-2">{{ $item['name'] }}</td>
                            <td class="p-2">₹{{ number_format($item['price'], 2) }}</td>
                            <td class="p-2">
                                <form method="POST" action="{{ route('cart.remove.service', $item['id']) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button class="px-2 py-1 text-xs text-white bg-rose-600 rounded">Remove</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr><td class="p-2" colspan="3">No services</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection


