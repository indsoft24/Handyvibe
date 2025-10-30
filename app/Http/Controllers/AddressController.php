<?php

namespace App\Http\Controllers;

use App\Models\Address;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AddressController extends Controller
{
    public function index()
    {
        $addresses = Address::where('user_id', Auth::id())->orderByDesc('is_primary')->get();
        return view('user.addresses.index', compact('addresses'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:20',
            'line1' => 'required|string|max:255',
            'line2' => 'nullable|string|max:255',
            'city' => 'required|string|max:100',
            'state' => 'required|string|max:100',
            'postal_code' => 'required|string|max:12',
            'country' => 'required|string|max:100',
            'type' => 'required|in:home,office,other',
            'is_primary' => 'sometimes|boolean',
        ]);
        if ($validator->fails()) return back()->withErrors($validator)->withInput();

        $data = $validator->validated();
        $data['user_id'] = Auth::id();
        if (!empty($data['is_primary'])) {
            Address::where('user_id', Auth::id())->update(['is_primary' => false]);
        }
        Address::create($data);
        return back()->with('success', 'Address added');
    }

    public function update(Request $request, Address $address)
    {
        abort_if($address->user_id !== Auth::id(), 403);
        $validator = Validator::make($request->all(), [
            'name' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:20',
            'line1' => 'required|string|max:255',
            'line2' => 'nullable|string|max:255',
            'city' => 'required|string|max:100',
            'state' => 'required|string|max:100',
            'postal_code' => 'required|string|max:12',
            'country' => 'required|string|max:100',
            'type' => 'required|in:home,office,other',
            'is_primary' => 'sometimes|boolean',
        ]);
        if ($validator->fails()) return back()->withErrors($validator)->withInput();

        $data = $validator->validated();
        if (!empty($data['is_primary'])) {
            Address::where('user_id', Auth::id())->update(['is_primary' => false]);
        }
        $address->update($data);
        return back()->with('success', 'Address updated');
    }

    public function destroy(Address $address)
    {
        abort_if($address->user_id !== Auth::id(), 403);
        $address->delete();
        return back()->with('success', 'Address deleted');
    }
}


