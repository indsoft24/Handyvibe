<?php

namespace App\Http\Controllers;

use App\Models\Lead;
use App\Events\NewLeadNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LeadController extends Controller
{
    /**
     * Store a new lead from frontend
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'company' => 'nullable|string|max:255',
            'message' => 'required|string',
            'source' => 'required|in:website,phone,email,social,referral',
            'type' => 'required|in:service,product,general',
            'service_id' => 'nullable|integer',
            'service_name' => 'nullable|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        // Add metadata
        $metadata = [
            'ip_address' => $request->ip(),
            'user_agent' => $request->userAgent(),
            'referrer' => $request->header('referer'),
        ];

        $lead = Lead::create(array_merge($request->all(), [
            'status' => 'new',
            'priority' => 'medium',
            'metadata' => $metadata,
        ]));

        // Broadcast the new lead notification
        broadcast(new NewLeadNotification($lead));

        return response()->json([
            'success' => true,
            'message' => 'Thank you for your inquiry! We will get back to you soon.',
            'lead_id' => $lead->id
        ]);
    }
}
