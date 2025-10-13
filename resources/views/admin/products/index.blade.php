@extends('layouts.admin')

@section('title', 'Products')

@section('content')
<div class="space-y-6">
    <!-- Page Header -->
    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
            <div class="flex items-center space-x-3">
                <div class="p-2 bg-indigo-100 dark:bg-indigo-900 rounded-lg">
                    <svg class="h-6 w-6 text-indigo-600 dark:text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                    </svg>
                </div>
                <div>
                    <h1 class="text-2xl font-bold text-gray-900 dark:text-white">Products</h1>
                    <p class="text-sm text-gray-600 dark:text-gray-400">Manage your product inventory and catalog</p>
                </div>
            </div>
            <a href="{{ route('admin.products.create') }}"
               class="inline-flex items-center justify-center rounded-lg font-semibold px-6 py-3 text-white bg-gradient-to-r from-indigo-600 to-indigo-700 shadow-lg transition-all duration-200 hover:from-indigo-700 hover:to-indigo-800 hover:shadow-xl focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transform hover:scale-105">
                <svg class="mr-2 h-5 w-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                </svg>
                Add New Product
            </a>
        </div>
    </div>
    <!-- Products Table -->
    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 overflow-hidden">
        <div class="border-b border-gray-200 dark:border-gray-700 px-6 py-4 bg-gray-50 dark:bg-gray-700">
            <div class="flex items-center justify-between">
                <h3 class="font-semibold text-lg text-gray-900 dark:text-white">All Products</h3>
                <div class="flex items-center space-x-2 text-sm text-gray-500 dark:text-gray-400">
                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                    </svg>
                    <span>{{ $products->total() }} products</span>
                </div>
            </div>
        </div>
        <div class="p-6">
            @if ($products->count() > 0)
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead>
                            <tr class="bg-gray-50 dark:bg-gray-700 text-left">
                                <th class="py-3 px-4 font-semibold text-xs text-gray-500 dark:text-gray-400 uppercase tracking-wider">ID</th>
                                <th class="py-3 px-4 font-semibold text-xs text-gray-500 dark:text-gray-400 uppercase tracking-wider">Image</th>
                                <th class="py-3 px-4 font-semibold text-xs text-gray-500 dark:text-gray-400 uppercase tracking-wider">Name</th>
                                <th class="py-3 px-4 font-semibold text-xs text-gray-500 dark:text-gray-400 uppercase tracking-wider">Category</th>
                                <th class="py-3 px-4 font-semibold text-xs text-gray-500 dark:text-gray-400 uppercase tracking-wider">SKU</th>
                                <th class="py-3 px-4 font-semibold text-xs text-gray-500 dark:text-gray-400 uppercase tracking-wider">Price</th>
                                <th class="py-3 px-4 font-semibold text-xs text-gray-500 dark:text-gray-400 uppercase tracking-wider">Stock</th>
                                <th class="py-3 px-4 font-semibold text-xs text-gray-500 dark:text-gray-400 uppercase tracking-wider">Status</th>
                                <th class="py-3 px-4 font-semibold text-xs text-gray-500 dark:text-gray-400 uppercase tracking-wider">Featured</th>
                                <th class="py-3 px-4 font-semibold text-xs text-gray-500 dark:text-gray-400 uppercase tracking-wider">Created</th>
                                <th class="py-3 px-4 font-semibold text-xs text-gray-500 dark:text-gray-400 uppercase tracking-wider">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                            @foreach ($products as $product)
                                <tr class="hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors duration-150">
                                    <td class="py-4 px-4 font-medium text-gray-900 dark:text-white">{{ $product->id }}</td>
                                    <td class="py-4 px-4">
                                        @if ($product->featured_image)
                                            <img src="{{ asset('storage/' . $product->featured_image) }}"
                                                 alt="{{ $product->name }}"
                                                 class="h-10 w-10 rounded-lg object-cover border border-gray-200 dark:border-gray-600 shadow-sm">
                                        @else
                                            <div class="h-10 w-10 rounded-lg bg-gray-100 dark:bg-gray-600 flex items-center justify-center">
                                                <svg class="h-5 w-5 text-gray-400 dark:text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                                </svg>
                                            </div>
                                        @endif
                                    </td>
                                    <td class="py-4 px-4">
                                        <div class="flex flex-col">
                                            <span class="font-semibold text-gray-900 dark:text-white">{{ $product->name }}</span>
                                            @if ($product->short_description)
                                                <span class="text-xs text-gray-500 dark:text-gray-400 mt-1">{{ Str::limit($product->short_description, 40) }}</span>
                                            @endif
                                        </div>
                                    </td>
                                    <td class="py-4 px-4">
                                        <div class="flex flex-col">
                                            <span class="inline-flex items-center rounded-full bg-blue-100 dark:bg-blue-900 px-2.5 py-0.5 text-xs font-medium text-blue-800 dark:text-blue-200">
                                                {{ $product->category->name }}
                                            </span>
                                            @if ($product->subcategory)
                                                <span class="text-xs text-gray-500 dark:text-gray-400 mt-1">{{ $product->subcategory->name }}</span>
                                            @endif
                                        </div>
                                    </td>
                                    <td class="py-4 px-4">
                                        <code class="text-xs text-gray-600 dark:text-gray-300 bg-gray-100 dark:bg-gray-700 px-2 py-1 rounded">{{ $product->sku ?? 'N/A' }}</code>
                                    </td>
                                    <td class="py-4 px-4">
                                        <div class="flex flex-col">
                                            <span class="text-sm font-semibold text-gray-900 dark:text-white">
                                                ${{ number_format($product->current_price ?? $product->price, 2) }}
                                            </span>
                                            @if ($product->sale_price && $product->sale_price < $product->price)
                                                <span class="text-xs text-gray-500 line-through">
                                                    ${{ number_format($product->price, 2) }}
                                                </span>
                                            @endif
                                        </div>
                                    </td>
                                    <td class="py-4 px-4">
                                        <span class="inline-flex items-center rounded-full px-2.5 py-0.5 text-xs font-medium {{ ($product->stock_quantity ?? 0) > 0 ? 'bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200' : 'bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-200' }}">
                                            {{ $product->stock_quantity ?? 0 }}
                                        </span>
                                    </td>
                                    <td class="py-4 px-4">
                                        <form method="POST" action="{{ route('admin.products.toggle-status', $product) }}" class="inline">
                                            @csrf
                                            <button type="submit" class="inline-flex items-center rounded-full px-2.5 py-0.5 text-xs font-medium transition-colors
                                                {{ $product->status 
                                                    ? 'bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200 hover:bg-green-200 dark:hover:bg-green-800' 
                                                    : 'bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-200 hover:bg-red-200 dark:hover:bg-red-800' }}">
                                                <span class="w-1.5 h-1.5 rounded-full mr-1.5 {{ $product->status ? 'bg-green-500' : 'bg-red-500' }}"></span>
                                                {{ $product->status ? 'Active' : 'Inactive' }}
                                            </button>
                                        </form>
                                    </td>
                                    <td class="py-4 px-4">
                                        <form method="POST" action="{{ route('admin.products.toggle-featured', $product) }}" class="inline">
                                            @csrf
                                            <button type="submit" class="inline-flex items-center rounded-full px-2.5 py-0.5 text-xs font-medium transition-colors
                                                {{ $product->featured 
                                                    ? 'bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-200 hover:bg-yellow-200 dark:hover:bg-yellow-800' 
                                                    : 'bg-gray-100 text-gray-800 dark:bg-gray-700 dark:text-gray-200 hover:bg-gray-200 dark:hover:bg-gray-600' }}">
                                                <span class="w-1.5 h-1.5 rounded-full mr-1.5 {{ $product->featured ? 'bg-yellow-500' : 'bg-gray-500' }}"></span>
                                                {{ $product->featured ? 'Featured' : 'Normal' }}
                                            </button>
                                        </form>
                                    </td>
                                    <td class="py-4 px-4 text-sm text-gray-600 dark:text-gray-400">
                                        {{ $product->created_at->format('M d, Y') }}
                                    </td>
                                    <td class="py-4 px-4">
                                        <div class="flex items-center space-x-2">
                                            <a href="{{ route('admin.products.show', $product) }}" 
                                               class="p-1.5 text-gray-400 hover:text-blue-600 dark:hover:text-blue-400 transition-colors rounded-lg hover:bg-blue-50 dark:hover:bg-blue-900/20" 
                                               title="View">
                                                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                                </svg>
                                            </a>
                                            <a href="{{ route('admin.products.edit', $product) }}" 
                                               class="p-1.5 text-gray-400 hover:text-green-600 dark:hover:text-green-400 transition-colors rounded-lg hover:bg-green-50 dark:hover:bg-green-900/20" 
                                               title="Edit">
                                                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                                </svg>
                                            </a>
                                            <form method="POST" action="{{ route('admin.products.destroy', $product) }}" class="inline" onsubmit="return confirm('Are you sure you want to delete this product?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="p-1.5 text-gray-400 hover:text-red-600 dark:hover:text-red-400 transition-colors rounded-lg hover:bg-red-50 dark:hover:bg-red-900/20" title="Delete">
                                                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                                    </svg>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                
                <!-- Pagination -->
                @if($products->hasPages())
                    <div class="mt-6 flex justify-center">
                        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm border border-gray-200 dark:border-gray-700 p-2">
                            {{ $products->links() }}
                        </div>
                    </div>
                @endif
            @else
                <div class="flex flex-col items-center justify-center text-center py-16">
                    <div class="p-4 bg-gray-100 dark:bg-gray-700 rounded-full mb-4">
                        <svg class="h-12 w-12 text-gray-400 dark:text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">No products found</h3>
                    <p class="text-sm text-gray-500 dark:text-gray-400 mb-6">Get started by creating your first product to build your catalog.</p>
                    <a href="{{ route('admin.products.create') }}"
                       class="inline-flex items-center rounded-lg bg-gradient-to-r from-indigo-600 to-indigo-700 px-6 py-3 text-sm font-semibold text-white shadow-lg transition-all duration-200 hover:from-indigo-700 hover:to-indigo-800 hover:shadow-xl focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transform hover:scale-105">
                        <svg class="mr-2 h-5 w-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                        </svg>
                        Create Your First Product
                    </a>
                </div>
            @endif
        </div>
    </div>
</div>

@endsection
