@extends('vendor.layouts.vendor')

@section('title', 'Edit Service')

@section('content')
    <form action="{{ route('vendor.services.update', $service) }}" method="POST" class="max-w-3xl p-6 bg-white border rounded-xl shadow-sm">
        @csrf
        @method('PUT')
        <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
            <div>
                <label class="block mb-1 text-sm">Name</label>
                <input name="name" value="{{ old('name', $service->name) }}" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500/40" required />
            </div>
            <div>
                <label class="block mb-1 text-sm">Category</label>
                <select name="category_id" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500/40" required>
                    @foreach($categories as $cat)
                        <option value="{{ $cat->id }}" @selected(old('category_id', $service->category_id)==$cat->id)>{{ $cat->name }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label class="block mb-1 text-sm">Subcategory</label>
                <select name="sub_category_id" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500/40">
                    <option value="">Optional</option>
                    @foreach($subcategories as $sub)
                        <option value="{{ $sub->id }}" @selected(old('sub_category_id', $service->sub_category_id)==$sub->id)>{{ $sub->name }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label class="block mb-1 text-sm">Price</label>
                <input type="number" step="0.01" name="price" value="{{ old('price', $service->price) }}" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500/40" required />
            </div>
            <div>
                <label class="block mb-1 text-sm">Duration (HH:MM)</label>
                <input name="duration" value="{{ old('duration', $service->duration) }}" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500/40" />
            </div>
            <div class="md:col-span-2">
                <label class="block mb-1 text-sm">Description</label>
                <textarea name="description" rows="4" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500/40">{{ old('description', $service->description) }}</textarea>
            </div>
            <div>
                <label class="inline-flex items-center mt-2 text-sm">
                    <input type="checkbox" name="status" value="1" @checked(old('status', (int)$service->status)) class="mr-2 rounded text-indigo-600 border-slate-300 focus:ring-indigo-500/40" /> Active
                </label>
            </div>
        </div>
        <div class="mt-4">
            <button class="px-4 py-2 text-white bg-indigo-600 rounded hover:bg-indigo-700">Save</button>
            <a href="{{ route('vendor.services.index') }}" class="px-4 py-2 ml-2 text-slate-700 bg-slate-100 rounded hover:bg-slate-200">Cancel</a>
        </div>
    </form>
@endsection


