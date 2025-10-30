@extends('vendor.layouts.vendor')

@section('title', 'Inquiries')

@section('content')
    <div class="overflow-x-auto bg-white border rounded-xl shadow-sm">
        <table class="w-full text-sm">
            <thead>
                <tr class="text-xs tracking-wider text-left text-slate-500 uppercase bg-slate-50">
                    <th class="p-3">Name</th>
                    <th class="p-3">Email</th>
                    <th class="p-3">Subject</th>
                    <th class="p-3">Status</th>
                    <th class="p-3">Date</th>
                </tr>
            </thead>
            <tbody class="divide-y">
                @forelse($inquiries as $lead)
                    <tr>
                        <td class="p-3 font-medium text-slate-800">{{ $lead->name }}</td>
                        <td class="p-3">{{ $lead->email }}</td>
                        <td class="p-3">{{ $lead->subject ?? '-' }}</td>
                        <td class="p-3">
                            <span class="px-2 py-1 text-xs font-medium rounded {{ $lead->status==='new' ? 'text-indigo-700 bg-indigo-100' : 'text-slate-700 bg-slate-100' }}">{{ ucfirst($lead->status) }}</span>
                        </td>
                        <td class="p-3">{{ $lead->created_at?->format('d M Y, h:i A') }}</td>
                    </tr>
                @empty
                    <tr><td class="p-3" colspan="5">No inquiries yet.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="mt-4">{{ $inquiries->links() }}</div>
@endsection


