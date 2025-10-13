<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Service;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class ServiceController extends Controller
{
    /**
     * Display a listing of services
     */
    public function index(Request $request)
    {
        $query = Service::with(['category', 'subCategory']);

        // Filter by status
        if ($request->filled('status')) {
            $query->where('status', $request->status === 'active');
        }

        // Filter by category
        if ($request->filled('category_id')) {
            $query->where('category_id', $request->category_id);
        }

        // Filter by featured
        if ($request->filled('featured')) {
            $query->where('featured', $request->featured === 'yes');
        }

        // Search
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                    ->orWhere('description', 'like', "%{$search}%")
                    ->orWhere('short_description', 'like', "%{$search}%");
            });
        }

        // Sort
        $sortBy = $request->get('sort_by', 'created_at');
        $sortOrder = $request->get('sort_order', 'desc');
        $query->orderBy($sortBy, $sortOrder);

        $services = $query->paginate(15);
        $categories = Category::active()->get();

        // Statistics
        $stats = [
            'total' => Service::count(),
            'active' => Service::active()->count(),
            'featured' => Service::featured()->count(),
            'inactive' => Service::where('status', false)->count(),
        ];

        return view('admin.services.index', compact('services', 'categories', 'stats'));
    }

    /**
     * Show the form for creating a new service
     */
    public function create()
    {
        $categories = Category::active()->get();
        $subCategories = SubCategory::active()->get();

        return view('admin.services.create', compact('categories', 'subCategories'));
    }

    /**
     * Store a newly created service
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:services,slug',
            'category_id' => 'nullable|exists:categories,id',
            'sub_category_id' => 'nullable|exists:sub_categories,id',
            'description' => 'nullable|string',
            'short_description' => 'nullable|string|max:500',
            'price' => 'required|numeric|min:0',
            'sale_price' => 'nullable|numeric|min:0|lt:price',
            'duration' => 'nullable|string|max:100',
            'service_type' => 'required|in:one_time,recurring,subscription',
            'featured_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'gallery.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'featured' => 'boolean',
            'status' => 'boolean',
            'sort_order' => 'nullable|integer|min:0',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:500',
            'meta_keywords' => 'nullable|string|max:255',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $data = $request->all();

        // Handle featured image upload
        if ($request->hasFile('featured_image')) {
            $data['featured_image'] = $request->file('featured_image')->store('services', 'public');
        }

        // Handle gallery uploads
        if ($request->hasFile('gallery')) {
            $gallery = [];
            foreach ($request->file('gallery') as $file) {
                $gallery[] = $file->store('services/gallery', 'public');
            }
            $data['gallery'] = $gallery;
        }

        // Handle features and requirements
        $data['features'] = $request->filled('features') ? array_filter($request->features) : null;
        $data['requirements'] = $request->filled('requirements') ? array_filter($request->requirements) : null;

        // Generate slug if not provided
        if (empty($data['slug'])) {
            $data['slug'] = Str::slug($data['name']);
        }

        $service = Service::create($data);

        return redirect()->route('admin.services.show', $service)
            ->with('success', 'Service created successfully!');
    }

    /**
     * Display the specified service
     */
    public function show(Service $service)
    {
        $service->load(['category', 'subCategory']);

        return view('admin.services.show', compact('service'));
    }

    /**
     * Show the form for editing the specified service
     */
    public function edit(Service $service)
    {
        $categories = Category::active()->get();
        $subCategories = SubCategory::active()->get();

        return view('admin.services.edit', compact('service', 'categories', 'subCategories'));
    }

    /**
     * Update the specified service
     */
    public function update(Request $request, Service $service)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:services,slug,'.$service->id,
            'category_id' => 'nullable|exists:categories,id',
            'sub_category_id' => 'nullable|exists:sub_categories,id',
            'description' => 'nullable|string',
            'short_description' => 'nullable|string|max:500',
            'price' => 'required|numeric|min:0',
            'sale_price' => 'nullable|numeric|min:0|lt:price',
            'duration' => 'nullable|string|max:100',
            'service_type' => 'required|in:one_time,recurring,subscription',
            'featured_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'gallery.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'featured' => 'boolean',
            'status' => 'boolean',
            'sort_order' => 'nullable|integer|min:0',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:500',
            'meta_keywords' => 'nullable|string|max:255',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $data = $request->all();

        // Handle featured image upload
        if ($request->hasFile('featured_image')) {
            // Delete old image
            if ($service->featured_image && Storage::disk('public')->exists($service->featured_image)) {
                Storage::disk('public')->delete($service->featured_image);
            }
            $data['featured_image'] = $request->file('featured_image')->store('services', 'public');
        }

        // Handle gallery uploads
        if ($request->hasFile('gallery')) {
            $gallery = $service->gallery ?: [];
            foreach ($request->file('gallery') as $file) {
                $gallery[] = $file->store('services/gallery', 'public');
            }
            $data['gallery'] = $gallery;
        }

        // Handle features and requirements
        $data['features'] = $request->filled('features') ? array_filter($request->features) : null;
        $data['requirements'] = $request->filled('requirements') ? array_filter($request->requirements) : null;

        // Generate slug if not provided
        if (empty($data['slug'])) {
            $data['slug'] = Str::slug($data['name']);
        }

        $service->update($data);

        return redirect()->route('admin.services.show', $service)
            ->with('success', 'Service updated successfully!');
    }

    /**
     * Remove the specified service
     */
    public function destroy(Service $service)
    {
        // Delete images
        if ($service->featured_image && Storage::disk('public')->exists($service->featured_image)) {
            Storage::disk('public')->delete($service->featured_image);
        }

        if ($service->gallery) {
            foreach ($service->gallery as $image) {
                if (Storage::disk('public')->exists($image)) {
                    Storage::disk('public')->delete($image);
                }
            }
        }

        $service->delete();

        return redirect()->route('admin.services.index')
            ->with('success', 'Service deleted successfully!');
    }

    /**
     * Toggle service status
     */
    public function toggleStatus(Service $service)
    {
        $service->update(['status' => ! $service->status]);

        $message = $service->status ? 'Service activated successfully!' : 'Service deactivated successfully!';

        return response()->json([
            'success' => true,
            'message' => $message,
            'status' => $service->status,
        ]);
    }

    /**
     * Toggle featured status
     */
    public function toggleFeatured(Service $service)
    {
        $service->update(['featured' => ! $service->featured]);

        $message = $service->featured ? 'Service marked as featured!' : 'Service unmarked as featured!';

        return response()->json([
            'success' => true,
            'message' => $message,
            'featured' => $service->featured,
        ]);
    }

    /**
     * Delete gallery image
     */
    public function deleteGalleryImage(Service $service, $imageIndex)
    {
        $gallery = $service->gallery ?: [];

        if (isset($gallery[$imageIndex])) {
            $imagePath = $gallery[$imageIndex];

            // Delete file from storage
            if (Storage::disk('public')->exists($imagePath)) {
                Storage::disk('public')->delete($imagePath);
            }

            // Remove from gallery array
            unset($gallery[$imageIndex]);
            $gallery = array_values($gallery); // Reindex array

            $service->update(['gallery' => $gallery]);
        }

        return response()->json([
            'success' => true,
            'message' => 'Image deleted successfully!',
        ]);
    }
}
