<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Booking;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Lead;
use App\Models\PaymentTransaction;
use App\Models\Product;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CheckoutController extends Controller
{
    private function cart(Request $request): array
    {
        return $request->session()->get('cart', ['products' => [], 'services' => []]);
    }

    public function show(Request $request)
    {
        $cart = $this->cart($request);
        $addresses = Address::where('user_id', Auth::id())->orderByDesc('is_primary')->get();

        // Determine providers (vendors) for services in cart
        $vendors = collect();
        if (!empty($cart['services'])) {
            $serviceIds = collect($cart['services'])->pluck('id')->all();
            $vendorIds = Service::whereIn('id', $serviceIds)->pluck('vendor_id')->filter()->unique()->all();
            if (!empty($vendorIds)) {
                $vendors = \App\Models\User::whereIn('id', $vendorIds)->get();
            }
        }

        return view('checkout.index', compact('cart', 'addresses', 'vendors'));
    }

    public function addAddress(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:20',
            'line1' => 'required|string|max:255',
            'line2' => 'nullable|string|max:255',
            'city' => 'required|string|max:100',
            'state' => 'required|string|max:100',
            'postal_code' => 'required|string|max:12',
            'country' => 'required|string|max:100',
            'type' => 'required|in:home,office,other',
            'is_primary' => 'sometimes|boolean',
        ]);
        if ($validator->fails()) return back()->withErrors($validator)->withInput();

        $data = $validator->validated();
        $data['user_id'] = Auth::id();
        if (!empty($data['is_primary'])) {
            Address::where('user_id', Auth::id())->update(['is_primary' => false]);
        }
        $address = Address::create($data);
        return back()->with('success', 'Address added')->with('new_address_id', $address->id);
    }

    public function place(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'address_id' => 'required|exists:addresses,id',
            'schedule_at' => 'nullable|date',
        ]);
        if ($validator->fails()) return back()->withErrors($validator);

        $cart = $this->cart($request);
        if (empty($cart['products']) && empty($cart['services'])) {
            return back()->withErrors(['cart' => 'Your cart is empty']);
        }

        $order = Order::create([
            'user_id' => Auth::id(),
            'address_id' => $request->address_id,
            'status' => 'pending',
            'subtotal' => 0,
            'tax' => 0,
            'total' => 0,
        ]);

        $subtotal = 0;

        foreach ($cart['products'] as $p) {
            $product = Product::find($p['id']);
            if (!$product) continue;
            // Final stock check
            $qty = (int)$p['quantity'];
            if ($product->manage_stock && $product->stock_quantity && $qty > $product->stock_quantity) {
                return redirect()->route('cart.index')->withErrors(['stock' => "Not enough stock for {$product->name}"]);
            }
            $price = (float)$product->price;
            $subtotal += $price * $qty;
            OrderItem::create([
                'order_id' => $order->id,
                'item_type' => 'product',
                'item_id' => $product->id,
                'name' => $product->name,
                'quantity' => $qty,
                'price' => $price,
            ]);
            // Decrement stock
            if ($product->manage_stock && $product->stock_quantity) {
                $product->stock_quantity = max(0, (int)$product->stock_quantity - $qty);
                if ($product->stock_quantity === 0) {
                    $product->in_stock = false;
                }
                $product->save();
            }
        }

        foreach ($cart['services'] as $s) {
            $service = Service::find($s['id']);
            if (!$service) continue;
            $price = (float)($service->sale_price ?? $service->price);
            $subtotal += $price;
            OrderItem::create([
                'order_id' => $order->id,
                'item_type' => 'service',
                'item_id' => $service->id,
                'name' => $service->name,
                'quantity' => 1,
                'price' => $price,
                'details' => [ 'scheduled_at' => $request->input('schedule_at') ],
            ]);

            // Create booking record as well
            Booking::create([
                'user_id' => Auth::id(),
                'service_id' => $service->id,
                'address_id' => $request->address_id,
                'scheduled_at' => $request->input('schedule_at'),
                'status' => 'pending',
                'price' => $price,
            ]);

            // Create a lead so vendors can see inquiry and admin can manage it
            $address = $request->address_id ? Address::find($request->address_id) : null;
            $user = Auth::user();
            Lead::create([
                'name' => $user->name,
                'email' => $user->email,
                'phone' => $user->mobile ?? ($address->phone ?? null),
                'company' => null,
                'message' => 'Service booking placed via website checkout.',
                'source' => 'website',
                'status' => 'new',
                'priority' => 'medium',
                'type' => 'service',
                'service_id' => $service->id,
                'service_name' => $service->name,
                'metadata' => [
                    'order_id' => $order->id,
                    'scheduled_at' => $request->input('schedule_at'),
                ],
            ]);
        }

        $order->update([
            'subtotal' => $subtotal,
            'tax' => 0,
            'total' => $subtotal,
            'status' => 'placed',
        ]);

        // Record dummy payment transaction
        PaymentTransaction::create([
            'order_id' => $order->id,
            'provider' => 'dummy',
            'method' => 'dummy',
            'amount' => $subtotal,
            'status' => 'paid',
            'payload' => ['note' => 'Dummy payment confirmation'],
        ]);

        $request->session()->forget('cart');

        return redirect()->route('user.dashboard')->with('success', 'Order placed successfully');
    }

    /**
     * Show dummy payment page prior to placing order
     */
    public function payment(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'address_id' => 'required|exists:addresses,id',
            'schedule_at' => 'nullable|date',
        ]);
        if ($validator->fails()) return back()->withErrors($validator);

        $cart = $this->cart($request);
        if (empty($cart['products']) && empty($cart['services'])) {
            return redirect()->route('cart.index')->withErrors(['cart' => 'Your cart is empty']);
        }

        // Calculate total
        $subtotal = 0;
        foreach ($cart['products'] as $p) {
            $product = Product::find($p['id']);
            if ($product) {
                $subtotal += (float)$product->price * (int)$p['quantity'];
            }
        }
        foreach ($cart['services'] as $s) {
            $service = Service::find($s['id']);
            if ($service) {
                $subtotal += (float)($service->sale_price ?? $service->price);
            }
        }

        // Apply coupon if provided
        $discount = 0;
        $coupon = null;
        if ($code = $request->input('coupon_code')) {
            $coupon = \App\Models\Coupon::where('code', $code)->first();
            if ($coupon && $coupon->isValid()) {
                $discount = $coupon->type === 'percent' ? round($subtotal * ($coupon->value/100), 2) : min($subtotal, (float)$coupon->value);
            }
        }

        return view('checkout.payment', [
            'total' => max(0, $subtotal - $discount),
            'address_id' => $request->address_id,
            'schedule_at' => $request->schedule_at,
            'coupon' => $coupon,
            'discount' => $discount,
        ]);
    }

    /**
     * Confirm dummy payment and place order as paid
     */
    public function confirmPayment(Request $request)
    {
        // Reuse place logic but mark as paid
        $request->merge(['__paid' => true]);

        $validator = Validator::make($request->all(), [
            'address_id' => 'required|exists:addresses,id',
            'schedule_at' => 'nullable|date',
        ]);
        if ($validator->fails()) return back()->withErrors($validator);

        $cart = $this->cart($request);
        if (empty($cart['products']) && empty($cart['services'])) {
            return redirect()->route('cart.index')->withErrors(['cart' => 'Your cart is empty']);
        }

        $order = Order::create([
            'user_id' => Auth::id(),
            'address_id' => $request->address_id,
            'status' => 'pending',
            'subtotal' => 0,
            'tax' => 0,
            'total' => 0,
            'payment_method' => 'dummy',
            'payment_status' => 'paid',
        ]);

        $subtotal = 0;

        foreach ($cart['products'] as $p) {
            $product = Product::find($p['id']);
            if (!$product) continue;
            $price = (float)$product->price;
            $qty = (int)$p['quantity'];
            $subtotal += $price * $qty;
            OrderItem::create([
                'order_id' => $order->id,
                'item_type' => 'product',
                'item_id' => $product->id,
                'name' => $product->name,
                'quantity' => $qty,
                'price' => $price,
            ]);
        }

        foreach ($cart['services'] as $s) {
            $service = Service::find($s['id']);
            if (!$service) continue;
            $price = (float)($service->sale_price ?? $service->price);
            $subtotal += $price;
            OrderItem::create([
                'order_id' => $order->id,
                'item_type' => 'service',
                'item_id' => $service->id,
                'name' => $service->name,
                'quantity' => 1,
                'price' => $price,
                'details' => [ 'scheduled_at' => $request->input('schedule_at') ],
            ]);

            Booking::create([
                'user_id' => Auth::id(),
                'service_id' => $service->id,
                'address_id' => $request->address_id,
                'scheduled_at' => $request->input('schedule_at'),
                'status' => 'pending',
                'price' => $price,
            ]);

            $address = $request->address_id ? Address::find($request->address_id) : null;
            $user = Auth::user();
            Lead::create([
                'name' => $user->name,
                'email' => $user->email,
                'phone' => $user->mobile ?? ($address->phone ?? null),
                'company' => null,
                'message' => 'Service booking placed via website checkout.',
                'source' => 'website',
                'status' => 'new',
                'priority' => 'medium',
                'type' => 'service',
                'service_id' => $service->id,
                'service_name' => $service->name,
                'metadata' => [
                    'order_id' => $order->id,
                    'scheduled_at' => $request->input('schedule_at'),
                ],
            ]);
        }

        $order->update([
            'subtotal' => $subtotal,
            'tax' => 0,
            'total' => $subtotal,
            'status' => 'placed',
        ]);

        $request->session()->forget('cart');

        return redirect()->route('user.dashboard')->with('success', 'Payment successful. Order placed.');
    }
}


