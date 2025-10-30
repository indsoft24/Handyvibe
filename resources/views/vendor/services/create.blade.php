@extends('vendor.layouts.vendor')

@section('title', 'Add Service')

@section('content')
    <form action="{{ route('vendor.services.store') }}" method="POST" class="max-w-3xl p-6 bg-white border rounded-xl shadow-sm">
        @csrf
        <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
            <div>
                <label class="block mb-1 text-sm">Name</label>
                <input name="name" value="{{ old('name') }}" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500/40" required />
            </div>
            <div>
                <label class="block mb-1 text-sm">Category</label>
                <select name="category_id" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500/40" required>
                    <option value="">Select category</option>
                    @foreach($categories as $cat)
                        <option value="{{ $cat->id }}" @selected(old('category_id')==$cat->id)>{{ $cat->name }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label class="block mb-1 text-sm">Subcategory</label>
                <select name="sub_category_id" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500/40">
                    <option value="">Optional</option>
                    @foreach($subcategories as $sub)
                        <option value="{{ $sub->id }}" @selected(old('sub_category_id')==$sub->id)>{{ $sub->name }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label class="block mb-1 text-sm">Price</label>
                <input type="number" step="0.01" name="price" value="{{ old('price') }}" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500/40" required />
            </div>
            <div>
                <label class="block mb-1 text-sm">Duration (HH:MM)</label>
                <input name="duration" value="{{ old('duration') }}" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500/40" />
            </div>
            <div class="md:col-span-2">
                <label class="block mb-1 text-sm">Description</label>
                <textarea name="description" rows="4" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500/40">{{ old('description') }}</textarea>
            </div>
        </div>
        <div class="mt-4">
            <button class="px-4 py-2 text-white bg-indigo-600 rounded hover:bg-indigo-700">Create</button>
            <a href="{{ route('vendor.services.index') }}" class="px-4 py-2 ml-2 text-slate-700 bg-slate-100 rounded hover:bg-slate-200">Cancel</a>
        </div>
    </form>
@endsection


