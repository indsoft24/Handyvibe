<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SubCategory;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subCategories = SubCategory::with(['category', 'products'])->withCount('products')->ordered()->paginate(15);
        return view('admin.sub-categories.index', compact('subCategories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::active()->ordered()->get();
        return view('admin.sub-categories.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'category_id' => 'required|exists:categories,id',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'required|boolean',
            'sort_order' => 'nullable|integer|min:0',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $data = $request->only(['category_id', 'name', 'description', 'status', 'sort_order']);

        // Handle image upload
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('sub-categories', 'public');
            $data['image'] = $imagePath;
        }

        SubCategory::create($data);

        return redirect()->route('admin.sub-categories.index')
            ->with('success', 'Sub Category created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(SubCategory $subCategory)
    {
        $subCategory->load(['category', 'products']);
        return view('admin.sub-categories.show', compact('subCategory'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SubCategory $subCategory)
    {
        $categories = Category::active()->ordered()->get();
        return view('admin.sub-categories.edit', compact('subCategory', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SubCategory $subCategory)
    {
        $validator = Validator::make($request->all(), [
            'category_id' => 'required|exists:categories,id',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'required|boolean',
            'sort_order' => 'nullable|integer|min:0',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $data = $request->only(['category_id', 'name', 'description', 'status', 'sort_order']);

        // Handle image upload
        if ($request->hasFile('image')) {
            // Delete old image
            if ($subCategory->image) {
                Storage::disk('public')->delete($subCategory->image);
            }
            
            $imagePath = $request->file('image')->store('sub-categories', 'public');
            $data['image'] = $imagePath;
        }

        $subCategory->update($data);

        return redirect()->route('admin.sub-categories.index')
            ->with('success', 'Sub Category updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SubCategory $subCategory)
    {
        // Check if subcategory has products
        if ($subCategory->products()->count() > 0) {
            return redirect()->back()
                ->with('error', 'Cannot delete subcategory with products. Please remove all products first.');
        }

        // Delete image if exists
        if ($subCategory->image) {
            Storage::disk('public')->delete($subCategory->image);
        }

        $subCategory->delete();

        return redirect()->route('admin.sub-categories.index')
            ->with('success', 'Sub Category deleted successfully!');
    }

    /**
     * Toggle subcategory status
     */
    public function toggleStatus(SubCategory $subCategory)
    {
        $subCategory->update(['status' => !$subCategory->status]);
        
        $status = $subCategory->status ? 'activated' : 'deactivated';
        return redirect()->back()
            ->with('success', "Sub Category {$status} successfully!");
    }
}
