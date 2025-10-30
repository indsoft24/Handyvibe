@extends('vendor.layouts.vendor')

@section('title', 'My Services')

@section('content')
    <div class="flex items-center justify-between mb-4">
        <h2 class="text-xl font-semibold text-slate-800">Your Services</h2>
        <a href="{{ route('vendor.services.create') }}" class="px-3 py-2 text-sm text-white bg-indigo-600 rounded hover:bg-indigo-700">Add New Service</a>
    </div>

    <div class="overflow-x-auto bg-white border rounded-xl shadow-sm">
        <table class="w-full text-sm">
            <thead>
                <tr class="text-xs tracking-wider text-left text-slate-500 uppercase bg-slate-50">
                    <th class="p-3">Service Name</th>
                    <th class="p-3">Category</th>
                    <th class="p-3">Subcategory</th>
                    <th class="p-3">Price</th>
                    <th class="p-3">Duration</th>
                    <th class="p-3">Status</th>
                    <th class="p-3">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y">
                @forelse($services as $service)
                    <tr>
                        <td class="p-3 font-medium text-slate-800">{{ $service->name }}</td>
                        <td class="p-3">{{ $service->category->name ?? '-' }}</td>
                        <td class="p-3">{{ $service->subCategory->name ?? '-' }}</td>
                        <td class="p-3">₹{{ number_format($service->price, 2) }}</td>
                        <td class="p-3">{{ $service->duration ?? '-' }}</td>
                        <td class="p-3">
                            @if($service->status)
                                <span class="px-2 py-1 text-xs font-medium text-green-700 bg-green-100 rounded">Active</span>
                            @else
                                <span class="px-2 py-1 text-xs font-medium text-slate-700 bg-slate-100 rounded">Draft</span>
                            @endif
                        </td>
                        <td class="p-3 space-x-2 whitespace-nowrap">
                            <a href="{{ route('vendor.services.edit', $service) }}" class="px-2 py-1 text-white bg-indigo-600 rounded hover:bg-indigo-700">Edit</a>
                            <form action="{{ route('vendor.services.destroy', $service) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button onclick="return confirm('Delete this service?')" class="px-2 py-1 text-white bg-rose-600 rounded hover:bg-rose-700">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td class="p-3" colspan="7">No services yet.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-4">{{ $services->links() }}</div>
@endsection


