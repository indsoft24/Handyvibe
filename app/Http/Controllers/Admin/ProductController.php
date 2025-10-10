<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::with(['category', 'subcategory'])->ordered()->paginate(15);
        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::active()->ordered()->get();
        $subCategories = SubCategory::active()->ordered()->get();
        return view('admin.products.create', compact('categories', 'subCategories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'category_id' => 'required|exists:categories,id',
            'sub_category_id' => 'nullable|exists:sub_categories,id',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'short_description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'sale_price' => 'nullable|numeric|min:0',
            'sku' => 'nullable|string|unique:products,sku',
            'stock_quantity' => 'required|integer|min:0',
            'manage_stock' => 'boolean',
            'in_stock' => 'boolean',
            'weight' => 'nullable|string|max:50',
            'dimensions' => 'nullable|string|max:100',
            'featured_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'images' => 'nullable|array|max:5',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'featured' => 'boolean',
            'status' => 'required|boolean',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:500',
            'meta_keywords' => 'nullable|string|max:255',
            'sort_order' => 'nullable|integer|min:0',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $data = $request->only([
            'category_id', 'sub_category_id', 'name', 'description', 'short_description',
            'price', 'sale_price', 'sku', 'stock_quantity', 'manage_stock', 'in_stock',
            'weight', 'dimensions', 'featured', 'status', 'meta_title', 'meta_description',
            'meta_keywords', 'sort_order'
        ]);

        // Handle featured image upload
        if ($request->hasFile('featured_image')) {
            $imagePath = $request->file('featured_image')->store('products', 'public');
            $data['featured_image'] = $imagePath;
        }

        // Handle multiple images upload
        if ($request->hasFile('images')) {
            $imagePaths = [];
            foreach ($request->file('images') as $image) {
                $imagePaths[] = $image->store('products', 'public');
            }
            $data['images'] = $imagePaths;
        }

        Product::create($data);

        return redirect()->route('admin.products.index')
            ->with('success', 'Product created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        $product->load(['category', 'subcategory']);
        return view('admin.products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $categories = Category::active()->ordered()->get();
        $subCategories = SubCategory::active()->ordered()->get();
        return view('admin.products.edit', compact('product', 'categories', 'subCategories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $validator = Validator::make($request->all(), [
            'category_id' => 'required|exists:categories,id',
            'sub_category_id' => 'nullable|exists:sub_categories,id',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'short_description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'sale_price' => 'nullable|numeric|min:0',
            'sku' => 'nullable|string|unique:products,sku,' . $product->id,
            'stock_quantity' => 'required|integer|min:0',
            'manage_stock' => 'boolean',
            'in_stock' => 'boolean',
            'weight' => 'nullable|string|max:50',
            'dimensions' => 'nullable|string|max:100',
            'featured_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'images' => 'nullable|array|max:5',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'featured' => 'boolean',
            'status' => 'required|boolean',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:500',
            'meta_keywords' => 'nullable|string|max:255',
            'sort_order' => 'nullable|integer|min:0',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $data = $request->only([
            'category_id', 'sub_category_id', 'name', 'description', 'short_description',
            'price', 'sale_price', 'sku', 'stock_quantity', 'manage_stock', 'in_stock',
            'weight', 'dimensions', 'featured', 'status', 'meta_title', 'meta_description',
            'meta_keywords', 'sort_order'
        ]);

        // Handle featured image upload
        if ($request->hasFile('featured_image')) {
            // Delete old image
            if ($product->featured_image) {
                Storage::disk('public')->delete($product->featured_image);
            }
            
            $imagePath = $request->file('featured_image')->store('products', 'public');
            $data['featured_image'] = $imagePath;
        }

        // Handle multiple images upload
        if ($request->hasFile('images')) {
            // Delete old images
            if ($product->images) {
                foreach ($product->images as $image) {
                    Storage::disk('public')->delete($image);
                }
            }
            
            $imagePaths = [];
            foreach ($request->file('images') as $image) {
                $imagePaths[] = $image->store('products', 'public');
            }
            $data['images'] = $imagePaths;
        }

        $product->update($data);

        return redirect()->route('admin.products.index')
            ->with('success', 'Product updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        // Delete images
        if ($product->featured_image) {
            Storage::disk('public')->delete($product->featured_image);
        }
        
        if ($product->images) {
            foreach ($product->images as $image) {
                Storage::disk('public')->delete($image);
            }
        }

        $product->delete();

        return redirect()->route('admin.products.index')
            ->with('success', 'Product deleted successfully!');
    }

    /**
     * Toggle product status
     */
    public function toggleStatus(Product $product)
    {
        $product->update(['status' => !$product->status]);
        
        $status = $product->status ? 'activated' : 'deactivated';
        return redirect()->back()
            ->with('success', "Product {$status} successfully!");
    }

    /**
     * Toggle product featured status
     */
    public function toggleFeatured(Product $product)
    {
        $product->update(['featured' => !$product->featured]);
        
        $status = $product->featured ? 'featured' : 'unfeatured';
        return redirect()->back()
            ->with('success', "Product {$status} successfully!");
    }
}
