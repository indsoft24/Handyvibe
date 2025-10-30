@extends('user.layouts.account')

@section('title', 'Payment')

@section('content')
<div class="max-w-3xl p-6 mx-auto bg-white border rounded-xl shadow-sm">
    <h2 class="mb-4 text-xl font-semibold">Dummy Payment</h2>
    <p class="mb-2 text-slate-600">This is a placeholder payment step. No real charge will occur.</p>

    <div class="p-4 mb-4 border rounded bg-slate-50">
        <div class="text-sm text-slate-600">Amount to pay</div>
        @if(!empty($discount) && $discount > 0)
            <div class="text-sm text-slate-600">Discount applied: -₹{{ number_format($discount, 2) }}</div>
        @endif
        <div class="text-3xl font-semibold">₹{{ number_format($total, 2) }}</div>
    </div>

    <form action="{{ route('checkout.payment.confirm') }}" method="POST" class="mt-2">
        @csrf
        <input type="hidden" name="address_id" value="{{ $address_id }}">
        <input type="hidden" name="schedule_at" value="{{ $schedule_at }}">
        <button class="px-4 py-2 text-white bg-emerald-600 rounded hover:bg-emerald-700">Pay Now (Dummy)</button>
        <a href="{{ route('checkout.show') }}" class="px-4 py-2 ml-2 bg-slate-100 rounded">Back</a>
    </form>
</div>
@endsection


