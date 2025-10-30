@extends('user.layouts.account')

@section('title', 'Checkout')

@section('content')
<div class="max-w-5xl p-6 mx-auto bg-white border rounded-xl shadow-sm">
    <h2 class="mb-4 text-xl font-semibold">Checkout</h2>

    @if(isset($vendors) && $vendors->count())
        <div class="p-4 mb-6 border rounded-lg bg-slate-50">
            <div class="mb-2 text-sm font-medium text-slate-700">Service Provider</div>
            <div class="flex flex-wrap gap-4">
                @foreach($vendors as $vendor)
                    <div class="flex items-center gap-3 px-3 py-2 bg-white border rounded-lg">
                        <div class="w-10 h-10 overflow-hidden rounded-full bg-indigo-100 flex items-center justify-center text-indigo-700 font-semibold">
                            @if(!empty($vendor->avatar))
                                <img src="{{ asset('storage/'.$vendor->avatar) }}" alt="{{ $vendor->name }}" class="object-cover w-10 h-10">
                            @else
                                @php($initials = collect(explode(' ', $vendor->name))->map(fn($p) => Str::substr($p,0,1))->join(''))
                                {{ $initials }}
                            @endif
                        </div>
                        <div class="text-sm font-medium text-slate-800">{{ $vendor->name }}</div>
                    </div>
                @endforeach
            </div>
        </div>
    @endif

    <form action="{{ route('checkout.place') }}" method="POST" class="grid gap-6 md:grid-cols-2">
        @csrf
        <div>
            <div class="mb-2 text-sm font-medium text-slate-600">Select Address</div>
            <select name="address_id" class="w-full px-3 py-2 border rounded" required>
                <option value="" disabled selected>Select a delivery address</option>
                @foreach($addresses as $addr)
                    <option value="{{ $addr->id }}" @selected(session('new_address_id')==$addr->id)>
                        {{ $addr->line1 }}, {{ $addr->city }} ({{ $addr->type }}) {{ $addr->is_primary ? ' - Primary' : '' }}
                    </option>
                @endforeach
            </select>

            <div class="mt-4">
                <label class="block mb-1 text-sm">Schedule (optional for services)</label>
                <input type="datetime-local" name="schedule_at" class="w-full px-3 py-2 border rounded" />
            </div>
        </div>
        <div>
            <div class="mb-2 text-sm font-medium text-slate-600">Add New Address</div>
            <div class="grid grid-cols-1 gap-3">
                <input name="name" placeholder="Name" class="w-full px-3 py-2 border rounded" form="addAddress"/>
                <input name="phone" placeholder="Phone" class="w-full px-3 py-2 border rounded" form="addAddress"/>
                <input name="line1" placeholder="Address line 1" class="w-full px-3 py-2 border rounded" form="addAddress"/>
                <input name="line2" placeholder="Address line 2" class="w-full px-3 py-2 border rounded" form="addAddress"/>
                <div class="grid grid-cols-2 gap-3">
                    <input name="city" placeholder="City" class="w-full px-3 py-2 border rounded" form="addAddress"/>
                    <input name="state" placeholder="State" class="w-full px-3 py-2 border rounded" form="addAddress"/>
                </div>
                <div class="grid grid-cols-2 gap-3">
                    <input name="postal_code" placeholder="Postal" class="w-full px-3 py-2 border rounded" form="addAddress"/>
                    <input name="country" value="India" class="w-full px-3 py-2 border rounded" form="addAddress"/>
                </div>
                <div class="grid grid-cols-2 gap-3">
                    <select name="type" class="w-full px-3 py-2 border rounded" form="addAddress">
                        <option value="home">Home</option>
                        <option value="office">Office</option>
                        <option value="other">Other</option>
                    </select>
                    <label class="inline-flex items-center gap-2 text-sm" form="addAddress">
                        <input type="checkbox" name="is_primary" value="1" class="rounded border-slate-300" form="addAddress"/> Primary
                    </label>
                </div>
                <div class="flex justify-end">
                    <button form="addAddress" class="px-3 py-2 text-sm text-white bg-slate-700 rounded">Save Address</button>
                </div>
            </div>
        </div>
        <div class="md:col-span-2">
            <label class="block mb-1 text-sm">Have a coupon?</label>
            <input name="coupon_code" placeholder="Enter coupon code" class="w-full px-3 py-2 border rounded" form="paymentForm">
        </div>
        <div class="md:col-span-2 flex items-center justify-between pt-2">
            <a href="{{ route('cart.index') }}" class="text-slate-600">Back to cart</a>
            <div class="space-x-2">
                <button type="button" id="payBtn" class="px-4 py-2 text-white bg-emerald-600 rounded hover:bg-emerald-700">Proceed to Payment</button>
                <button class="px-4 py-2 text-white bg-indigo-600 rounded hover:bg-indigo-700">Place Order</button>
            </div>
        </div>
    </form>

    <form id="addAddress" action="{{ route('checkout.address.add') }}" method="POST" class="hidden">@csrf</form>
    <form id="paymentForm" action="{{ route('checkout.payment') }}" method="POST" class="hidden">
        @csrf
        <input type="hidden" name="address_id" id="pay_address_id">
        <input type="hidden" name="schedule_at" id="pay_schedule_at">
    </form>
</div>
@endsection

@section('scripts')
<script>
    document.getElementById('payBtn')?.addEventListener('click', function(){
        const addrSelect = document.querySelector('select[name="address_id"]');
        const addr = addrSelect.value;
        if (!addr) {
            // Use HTML5 constraint validation UI
            addrSelect.reportValidity();
            return;
        }
        const schedule = document.querySelector('input[name="schedule_at"]').value;
        document.getElementById('pay_address_id').value = addr;
        document.getElementById('pay_schedule_at').value = schedule;
        document.getElementById('paymentForm').submit();
    });
</script>
@endsection


