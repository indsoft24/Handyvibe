@extends('vendor.layouts.vendor')

@section('title', 'My Customers')

@section('content')
    <div class="overflow-x-auto bg-white border rounded-xl shadow-sm">
        <table class="w-full text-sm">
            <thead>
                <tr class="text-xs tracking-wider text-left text-slate-500 uppercase bg-slate-50">
                    <th class="p-3">Name</th>
                    <th class="p-3">Email</th>
                    <th class="p-3">Phone</th>
                    <th class="p-3">Company</th>
                </tr>
            </thead>
            <tbody class="divide-y">
                @forelse($customers as $c)
                    <tr>
                        <td class="p-3 font-medium text-slate-800">{{ $c->name }}</td>
                        <td class="p-3">{{ $c->email }}</td>
                        <td class="p-3">{{ $c->phone ?? '-' }}</td>
                        <td class="p-3">{{ $c->company ?? '-' }}</td>
                    </tr>
                @empty
                    <tr><td class="p-3" colspan="4">No customers found.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="mt-4">{{ $customers->links() }}</div>
@endsection


