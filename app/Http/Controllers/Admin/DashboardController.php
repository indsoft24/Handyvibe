<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Product;
use App\Models\Service;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Show admin dashboard
     */
    public function index()
    {
        // Get statistics
        $stats = [
            'total_categories' => Category::count(),
            'total_subcategories' => SubCategory::count(),
            'total_products' => Product::count(),
            'active_products' => Product::where('status', 1)->count(),
            'total_services' => Service::count(),
            'active_services' => Service::where('status', 1)->count(),
        ];

        // Get recent items
        $recent_categories = Category::latest()->limit(5)->get();
        $recent_subcategories = SubCategory::with('category')->latest()->limit(5)->get();
        $recent_products = Product::with(['category', 'subcategory'])->latest()->limit(5)->get();
        $recent_services = Service::with(['category', 'subCategory'])->latest()->limit(5)->get();

        return view('admin.dashboard', compact('stats', 'recent_categories', 'recent_subcategories', 'recent_products', 'recent_services'));
    }
}


