<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\Lead;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $userId = Auth::id();

        $servicesQuery = Service::where('vendor_id', $userId);
        $serviceCount = (clone $servicesQuery)->count();
        $activeServiceCount = (clone $servicesQuery)->where('status', true)->count();

        // Fetch leads related to this vendor's services without relying on a conditional relation
        $serviceIds = (clone $servicesQuery)->pluck('id');
        $leadCount = Lead::where('type', 'service')
            ->whereIn('service_id', $serviceIds)
            ->count();

        $recentLeads = Lead::where('type', 'service')
            ->whereIn('service_id', $serviceIds)
            ->latest()->limit(10)->get();

        $recentServices = $servicesQuery->latest()->limit(5)->get();

        $stats = [
            'services_total' => $serviceCount,
            'services_active' => $activeServiceCount,
            'inquiries_total' => $leadCount,
        ];

        return view('vendor.dashboard', compact('stats', 'recentLeads', 'recentServices'));
    }
}


