<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display a listing of services for frontend
     */
    public function index()
    {
        $services = Service::active()
            ->with(['category', 'subCategory'])
            ->orderBy('sort_order')
            ->orderBy('name')
            ->paginate(12);
        
        return view('services', compact('services'));
    }

    /**
     * Display the specified service
     */
    public function show($slug)
    {
        $service = Service::where('slug', $slug)
            ->active()
            ->with(['category', 'subCategory'])
            ->firstOrFail();

        // Load related services
        $relatedServices = Service::active()
            ->where('id', '!=', $service->id)
            ->where('category_id', $service->category_id)
            ->limit(3)
            ->get();

        return view('single-service', compact('service', 'relatedServices'));
    }

    /**
     * Get featured services for home page
     */
    public function getFeaturedServices($limit = 6)
    {
        return Service::active()
            ->featured()
            ->orderBy('sort_order')
            ->orderBy('name')
            ->limit($limit)
            ->get();
    }

    /**
     * Get latest services for home page
     */
    public function getLatestServices($limit = 6)
    {
        return Service::active()
            ->latest()
            ->limit($limit)
            ->get();
    }
}