<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Service;
use Illuminate\Http\Request;

class CartController extends Controller
{
    private function getCart(Request $request): array
    {
        return $request->session()->get('cart', ['products' => [], 'services' => []]);
    }

    private function saveCart(Request $request, array $cart): void
    {
        $request->session()->put('cart', $cart);
    }

    public function index(Request $request)
    {
        $cart = $this->getCart($request);
        return view('cart.index', compact('cart'));
    }

    public function addProduct(Request $request, Product $product)
    {
        $quantity = max(1, (int)$request->input('quantity', 1));
        // Stock enforcement
        if (!$product->in_stock) {
            return back()->withErrors(['stock' => 'This product is out of stock']);
        }
        if ($product->manage_stock && $product->stock_quantity && $quantity > $product->stock_quantity) {
            $quantity = (int)$product->stock_quantity;
        }
        $cart = $this->getCart($request);
        $existing = $cart['products'][$product->id]['quantity'] ?? 0;
        $newQty = $existing + $quantity;
        if ($product->manage_stock && $product->stock_quantity) {
            $newQty = min($newQty, (int)$product->stock_quantity);
        }
        $cart['products'][$product->id] = [
            'id' => $product->id,
            'name' => $product->name,
            'price' => (float)$product->price,
            'quantity' => $newQty,
        ];
        $this->saveCart($request, $cart);
        return redirect()->route('cart.index')->with('success', 'Product added to cart');
    }

    public function addService(Request $request, Service $service)
    {
        $cart = $this->getCart($request);
        // Each service is a single line item; optional schedule stored as details later in checkout
        $cart['services'][$service->id] = [
            'id' => $service->id,
            'name' => $service->name,
            'price' => (float)($service->sale_price ?? $service->price),
        ];
        $this->saveCart($request, $cart);
        return redirect()->route('cart.index')->with('success', 'Service added to cart');
    }

    public function updateProduct(Request $request, Product $product)
    {
        $quantity = max(1, (int)$request->input('quantity', 1));
        if ($product->manage_stock && $product->stock_quantity) {
            $quantity = min($quantity, (int)$product->stock_quantity);
        }
        $cart = $this->getCart($request);
        if (isset($cart['products'][$product->id])) {
            $cart['products'][$product->id]['quantity'] = $quantity;
            $this->saveCart($request, $cart);
        }
        return back();
    }

    public function removeProduct(Request $request, Product $product)
    {
        $cart = $this->getCart($request);
        unset($cart['products'][$product->id]);
        $this->saveCart($request, $cart);
        return back();
    }

    public function removeService(Request $request, Service $service)
    {
        $cart = $this->getCart($request);
        unset($cart['services'][$service->id]);
        $this->saveCart($request, $cart);
        return back();
    }

    public function clear(Request $request)
    {
        $this->saveCart($request, ['products' => [], 'services' => []]);
        return back();
    }
}


