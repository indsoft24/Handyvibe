@extends('vendor.layouts.vendor')

@section('title', 'Dashboard')

@section('content')
    <div class="grid grid-cols-12 gap-6">
        <!-- Stats -->
        <div class="col-span-12 sm:col-span-6 lg:col-span-4">
            <div class="p-6 bg-white border rounded-xl shadow-sm">
                <div class="flex items-center justify-between">
                    <div>
                        <div class="text-xs font-medium tracking-wider text-indigo-600 uppercase">Total Services</div>
                        <div class="mt-2 text-3xl font-semibold text-slate-800">{{ $stats['services_total'] }}</div>
                    </div>
                    <div class="flex items-center justify-center w-10 h-10 text-white rounded-lg bg-indigo-600/90">S</div>
                </div>
            </div>
        </div>
        <div class="col-span-12 sm:col-span-6 lg:col-span-4">
            <div class="p-6 bg-white border rounded-xl shadow-sm">
                <div class="flex items-center justify-between">
                    <div>
                        <div class="text-xs font-medium tracking-wider text-green-600 uppercase">Active Services</div>
                        <div class="mt-2 text-3xl font-semibold text-slate-800">{{ $stats['services_active'] }}</div>
                    </div>
                    <div class="flex items-center justify-center w-10 h-10 text-white bg-green-600 rounded-lg">A</div>
                </div>
            </div>
        </div>
        <div class="col-span-12 lg:col-span-4">
            <div class="p-6 bg-white border rounded-xl shadow-sm">
                <div class="flex items-center justify-between">
                    <div>
                        <div class="text-xs font-medium tracking-wider text-rose-600 uppercase">Total Inquiries</div>
                        <div class="mt-2 text-3xl font-semibold text-slate-800">{{ $stats['inquiries_total'] }}</div>
                    </div>
                    <div class="flex items-center justify-center w-10 h-10 text-white bg-rose-600 rounded-lg">I</div>
                </div>
            </div>
        </div>

        <!-- Tables -->
        <div class="col-span-12 lg:col-span-7">
            <div class="p-6 bg-white border rounded-xl shadow-sm">
                <div class="mb-4 text-lg font-semibold text-slate-800">Recent Inquiries</div>
                <div class="overflow-x-auto">
                    <table class="w-full text-sm">
                        <thead>
                        <tr class="text-xs tracking-wider text-left text-slate-500 uppercase">
                            <th class="p-2">Name</th>
                            <th class="p-2">Email</th>
                            <th class="p-2">Subject</th>
                            <th class="p-2">Date</th>
                        </tr>
                        </thead>
                        <tbody class="divide-y">
                        @forelse($recentLeads as $lead)
                            <tr>
                                <td class="p-2">{{ $lead->name }}</td>
                                <td class="p-2">{{ $lead->email }}</td>
                                <td class="p-2">{{ $lead->subject ?? '-' }}</td>
                                <td class="p-2">{{ $lead->created_at?->format('d M Y') }}</td>
                            </tr>
                        @empty
                            <tr><td class="p-2" colspan="4">No inquiries yet.</td></tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-span-12 lg:col-span-5">
            <div class="p-6 bg-white border rounded-xl shadow-sm">
                <div class="mb-4 text-lg font-semibold text-slate-800">Recent Services</div>
                <ul class="space-y-3">
                    @forelse($recentServices as $service)
                        <li class="flex items-center justify-between">
                            <div>
                                <div class="font-medium text-slate-800">{{ $service->name }}</div>
                                <div class="text-sm text-slate-500">₹{{ number_format($service->price, 2) }} • {{ $service->duration ?? 'N/A' }}</div>
                            </div>
                            <a class="text-indigo-600 hover:underline" href="{{ route('vendor.services.edit', $service) }}">Edit</a>
                        </li>
                    @empty
                        <li>No services added yet.</li>
                    @endforelse
                </ul>
            </div>
        </div>
    </div>
@endsection


