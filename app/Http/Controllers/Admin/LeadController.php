<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Lead;
use App\Models\Product;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LeadController extends Controller
{
    /**
     * Display a listing of leads
     */
    public function index(Request $request)
    {
        $query = Lead::with('assignedAdmin');

        // Filter by status
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        // Filter by priority
        if ($request->filled('priority')) {
            $query->where('priority', $request->priority);
        }

        // Filter by source
        if ($request->filled('source')) {
            $query->where('source', $request->source);
        }

        // Filter by type
        if ($request->filled('type')) {
            $query->where('type', $request->type);
        }

        // Search
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%")
                    ->orWhere('phone', 'like', "%{$search}%")
                    ->orWhere('company', 'like', "%{$search}%")
                    ->orWhere('message', 'like', "%{$search}%");
            });
        }

        // Sort
        $sortBy = $request->get('sort_by', 'created_at');
        $sortOrder = $request->get('sort_order', 'desc');
        $query->orderBy($sortBy, $sortOrder);

        $leads = $query->paginate(15);

        // Statistics
        $stats = [
            'total' => Lead::count(),
            'new' => Lead::new()->count(),
            'contacted' => Lead::contacted()->count(),
            'qualified' => Lead::qualified()->count(),
            'converted' => Lead::converted()->count(),
            'urgent' => Lead::urgent()->count(),
            'needs_follow_up' => Lead::needsFollowUp()->count(),
        ];

        return view('admin.leads.index', compact('leads', 'stats'));
    }

    /**
     * Show the form for creating a new lead
     */
    public function create()
    {
        $admins = Admin::active()->get();
        $products = Product::where('status', true)->get();
        $services = Service::active()->get();

        return view('admin.leads.create', compact('admins', 'products', 'services'));
    }

    /**
     * Store a newly created lead
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
            'status' => 'required|in:new,contacted,qualified,converted,lost',
            'priority' => 'required|in:low,medium,high,urgent',
            'type' => 'required|in:service,product,general',
            'service_id' => 'nullable|integer',
            'service_name' => 'nullable|string|max:255',
            'assigned_to' => 'nullable|exists:admins,id',
            'follow_up_at' => 'nullable|date',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $lead = Lead::create($request->all());

        return redirect()->route('admin.leads.show', $lead)
            ->with('success', 'Lead created successfully!');
    }

    /**
     * Display the specified lead
     */
    public function show(Lead $lead)
    {
        $lead->load('assignedAdmin');

        return view('admin.leads.show', compact('lead'));
    }

    /**
     * Show the form for editing the specified lead
     */
    public function edit(Lead $lead)
    {
        $admins = Admin::active()->get();
        $products = Product::where('status', true)->get();
        $services = Service::all(); // Services table is empty, so get all

        return view('admin.leads.edit', compact('lead', 'admins', 'products', 'services'));
    }

    /**
     * Update the specified lead
     */
    public function update(Request $request, Lead $lead)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'company' => 'nullable|string|max:255',
            'message' => 'required|string',
            'source' => 'required|in:website,phone,email,social,referral',
            'status' => 'required|in:new,contacted,qualified,converted,lost',
            'priority' => 'required|in:low,medium,high,urgent',
            'type' => 'required|in:service,product,general',
            'service_id' => 'nullable|integer',
            'service_name' => 'nullable|string|max:255',
            'notes' => 'nullable|string',
            'assigned_to' => 'nullable|exists:admins,id',
            'contacted_at' => 'nullable|date',
            'follow_up_at' => 'nullable|date',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $lead->update($request->all());

        return redirect()->route('admin.leads.show', $lead)
            ->with('success', 'Lead updated successfully!');
    }

    /**
     * Remove the specified lead
     */
    public function destroy(Lead $lead)
    {
        $lead->delete();

        return redirect()->route('admin.leads.index')
            ->with('success', 'Lead deleted successfully!');
    }

    /**
     * Update lead status
     */
    public function updateStatus(Request $request, Lead $lead)
    {
        $validator = Validator::make($request->all(), [
            'status' => 'required|in:new,contacted,qualified,converted,lost',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => 'Invalid status'], 400);
        }

        $lead->update([
            'status' => $request->status,
            'contacted_at' => $request->status === 'contacted' ? now() : $lead->contacted_at,
        ]);

        return response()->json(['success' => true, 'message' => 'Status updated successfully']);
    }

    /**
     * Update lead priority
     */
    public function updatePriority(Request $request, Lead $lead)
    {
        $validator = Validator::make($request->all(), [
            'priority' => 'required|in:low,medium,high,urgent',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => 'Invalid priority'], 400);
        }

        $lead->update(['priority' => $request->priority]);

        return response()->json(['success' => true, 'message' => 'Priority updated successfully']);
    }

    /**
     * Assign lead to admin
     */
    public function assign(Request $request, Lead $lead)
    {
        $validator = Validator::make($request->all(), [
            'assigned_to' => 'required|exists:admins,id',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => 'Invalid admin'], 400);
        }

        $lead->update(['assigned_to' => $request->assigned_to]);

        return response()->json(['success' => true, 'message' => 'Lead assigned successfully']);
    }

    /**
     * Add notes to lead
     */
    public function addNotes(Request $request, Lead $lead)
    {
        $validator = Validator::make($request->all(), [
            'notes' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => 'Notes are required'], 400);
        }

        $currentNotes = $lead->notes ? $lead->notes."\n\n" : '';
        $newNotes = $currentNotes.now()->format('Y-m-d H:i:s').' - '.$request->notes;

        $lead->update(['notes' => $newNotes]);

        return response()->json(['success' => true, 'message' => 'Notes added successfully']);
    }
}
