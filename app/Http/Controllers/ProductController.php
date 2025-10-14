<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of products for frontend
     */
    public function index()
    {
        $products = Product::active()
            ->inStock()
            ->with(['category', 'subcategory'])
            ->ordered()
            ->paginate(12);
        
        return view('product', compact('products'));
    }

    /**
     * Display the specified product
     */
    public function show(Product $product)
    {
        // Load related products
        $relatedProducts = Product::active()
            ->inStock()
            ->where('id', '!=', $product->id)
            ->where('category_id', $product->category_id)
            ->limit(4)
            ->get();

        return view('single-product', compact('product', 'relatedProducts'));
    }

    /**
     * Get featured products for home page
     */
    public function getFeaturedProducts($limit = 6)
    {
        return Product::active()
            ->inStock()
            ->featured()
            ->ordered()
            ->limit($limit)
            ->get();
    }

    /**
     * Get latest products for home page
     */
    public function getLatestProducts($limit = 6)
    {
        return Product::active()
            ->inStock()
            ->latest()
            ->limit($limit)
            ->get();
    }
}
