<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use App\Models\Lead;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
    public function index()
    {
        $vendorId = Auth::id();
        $serviceIds = \App\Models\Service::where('vendor_id', $vendorId)->pluck('id');

        // Unique customers based on email for vendor's services
        $customers = Lead::select('name', 'email', 'phone', 'company')
            ->where('type', 'service')
            ->whereIn('service_id', $serviceIds)
            ->groupBy('name', 'email', 'phone', 'company')
            ->orderByDesc('id')
            ->paginate(20);

        return view('vendor.customers.index', compact('customers'));
    }

    public function inquiries()
    {
        $vendorId = Auth::id();
        $serviceIds = \App\Models\Service::where('vendor_id', $vendorId)->pluck('id');

        $inquiries = Lead::where('type', 'service')
            ->whereIn('service_id', $serviceIds)
            ->latest()->paginate(20);

        return view('vendor.inquiries.index', compact('inquiries'));
    }
}


