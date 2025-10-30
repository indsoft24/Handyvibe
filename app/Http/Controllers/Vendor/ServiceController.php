<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Service;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ServiceController extends Controller
{
    public function index(Request $request)
    {
        $services = Service::with(['category', 'subCategory'])
            ->where('vendor_id', Auth::id())
            ->latest()
            ->paginate(15);

        return view('vendor.services.index', compact('services'));
    }

    public function create()
    {
        $categories = Category::active()->get();
        $subcategories = SubCategory::active()->get();
        return view('vendor.services.create', compact('categories', 'subcategories'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'sub_category_id' => 'nullable|exists:sub_categories,id',
            'price' => 'required|numeric|min:0',
            'duration' => 'nullable|string|max:10',
            'description' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data = $validator->validated();
        $data['vendor_id'] = Auth::id();
        $data['status'] = true;

        Service::create($data);

        return redirect()->route('vendor.services.index')->with('success', 'Service created successfully');
    }

    public function edit(Service $service)
    {
        abort_unless($service->vendor_id === Auth::id(), 403);
        $categories = Category::active()->get();
        $subcategories = SubCategory::active()->get();
        return view('vendor.services.edit', compact('service', 'categories', 'subcategories'));
    }

    public function update(Request $request, Service $service)
    {
        abort_unless($service->vendor_id === Auth::id(), 403);

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'sub_category_id' => 'nullable|exists:sub_categories,id',
            'price' => 'required|numeric|min:0',
            'duration' => 'nullable|string|max:10',
            'description' => 'nullable|string',
            'status' => 'nullable|boolean',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $service->update($validator->validated());

        return redirect()->route('vendor.services.index')->with('success', 'Service updated successfully');
    }

    public function destroy(Service $service)
    {
        abort_unless($service->vendor_id === Auth::id(), 403);
        $service->delete();
        return redirect()->route('vendor.services.index')->with('success', 'Service deleted');
    }
}


