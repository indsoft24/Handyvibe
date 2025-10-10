@extends('layouts.admin')

@section('title', 'Products')

@section('content')
    <div class="grid grid-cols-12 gap-4 md:gap-6">
        <!-- Page Header -->
        <div class="col-span-12">
            <div class="flex items-center justify-between">
                <div>
                    <h1 class="text-2xl font-bold text-black dark:text-white">Products</h1>
                    <p class="text-sm text-gray-600 dark:text-gray-400">Manage your products</p>
                </div>
                <a href="{{ route('admin.products.create') }}"
                    class="inline-flex items-center justify-center rounded-md bg-primary px-4 py-2 text-center font-medium text-white hover:bg-opacity-90">
                    <svg class="mr-2 h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                    </svg>
                    Add New Product
                </a>
            </div>
        </div>

        <!-- Products Table -->
        <div class="col-span-12">
            <div class="rounded-sm border border-stroke bg-white shadow-default dark:border-strokedark dark:bg-boxdark">
                <div class="border-b border-stroke px-7 py-4 dark:border-strokedark">
                    <h3 class="font-medium text-black dark:text-white">All Products</h3>
                </div>
                <div class="p-7">
                    @if ($products->count() > 0)
                        <div class="overflow-x-auto">
                            <table class="w-full table-auto">
                                <thead>
                                    <tr class="bg-gray-2 text-left dark:bg-meta-4">
                                        <th class="min-w-[80px] py-4 px-4 font-medium text-black dark:text-white xl:pl-11">
                                            ID</th>
                                        <th class="min-w-[100px] py-4 px-4 font-medium text-black dark:text-white">Image
                                        </th>
                                        <th class="min-w-[200px] py-4 px-4 font-medium text-black dark:text-white">Name</th>
                                        <th class="min-w-[150px] py-4 px-4 font-medium text-black dark:text-white">Category
                                        </th>
                                        <th class="min-w-[120px] py-4 px-4 font-medium text-black dark:text-white">SKU</th>
                                        <th class="min-w-[100px] py-4 px-4 font-medium text-black dark:text-white">Price
                                        </th>
                                        <th class="min-w-[100px] py-4 px-4 font-medium text-black dark:text-white">Stock
                                        </th>
                                        <th class="min-w-[100px] py-4 px-4 font-medium text-black dark:text-white">Status
                                        </th>
                                        <th class="min-w-[100px] py-4 px-4 font-medium text-black dark:text-white">Featured
                                        </th>
                                        <th class="min-w-[120px] py-4 px-4 font-medium text-black dark:text-white">Created
                                        </th>
                                        <th class="py-4 px-4 font-medium text-black dark:text-white">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($products as $product)
                                        <tr class="border-b border-stroke dark:border-strokedark">
                                            <td
                                                class="border-b border-stroke py-5 px-4 pl-9 dark:border-strokedark xl:pl-11">
                                                <h5 class="font-medium text-black dark:text-white">{{ $product->id }}</h5>
                                            </td>
                                            <td class="border-b border-stroke py-5 px-4 dark:border-strokedark">
                                                @if ($product->featured_image)
                                                    <img src="{{ asset('storage/' . $product->featured_image) }}"
                                                        alt="{{ $product->name }}"
                                                        class="h-12 w-12 rounded-full object-cover">
                                                @else
                                                    <div
                                                        class="h-12 w-12 rounded-full bg-gray-200 dark:bg-gray-700 flex items-center justify-center">
                                                        <svg class="h-6 w-6 text-gray-400" fill="none"
                                                            stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2"
                                                                d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                                                            </path>
                                                        </svg>
                                                    </div>
                                                @endif
                                            </td>
                                            <td class="border-b border-stroke py-5 px-4 dark:border-strokedark">
                                                <div>
                                                    <h5 class="font-medium text-black dark:text-white">{{ $product->name }}
                                                    </h5>
                                                    @if ($product->short_description)
                                                        <p class="text-sm text-gray-500 dark:text-gray-400">
                                                            {{ Str::limit($product->short_description, 50) }}</p>
                                                    @endif
                                                </div>
                                            </td>
                                            <td class="border-b border-stroke py-5 px-4 dark:border-strokedark">
                                                <div>
                                                    <span
                                                        class="inline-flex items-center rounded-full bg-blue-100 px-2.5 py-0.5 text-xs font-medium text-blue-800">
                                                        {{ $product->category->name }}
                                                    </span>
                                                    @if ($product->subcategory)
                                                        <br>
                                                        <span
                                                            class="text-xs text-gray-500 dark:text-gray-400">{{ $product->subcategory->name }}</span>
                                                    @endif
                                                </div>
                                            </td>
                                            <td class="border-b border-stroke py-5 px-4 dark:border-strokedark">
                                                <code
                                                    class="text-sm text-gray-600 dark:text-gray-400">{{ $product->sku }}</code>
                                            </td>
                                            <td class="border-b border-stroke py-5 px-4 dark:border-strokedark">
                                                <div>
                                                    <p class="text-sm font-medium text-black dark:text-white">
                                                        ${{ number_format($product->current_price, 2) }}</p>
                                                    @if ($product->is_on_sale)
                                                        <p class="text-xs text-gray-500 line-through">
                                                            ${{ number_format($product->price, 2) }}</p>
                                                    @endif
                                                </div>
                                            </td>
                                            <td class="border-b border-stroke py-5 px-4 dark:border-strokedark">
                                                <span
                                                    class="inline-flex items-center rounded-full px-2.5 py-0.5 text-xs font-medium {{ $product->in_stock ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                                    {{ $product->stock_quantity }}
                                                </span>
                                            </td>
                                            <td class="border-b border-stroke py-5 px-4 dark:border-strokedark">
                                                <form method="POST"
                                                    action="{{ route('admin.products.toggle-status', $product) }}"
                                                    class="inline">
                                                    @csrf
                                                    <button type="submit"
                                                        class="inline-flex items-center rounded-full px-2.5 py-0.5 text-xs font-medium {{ $product->status ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                                        {{ $product->status ? 'Active' : 'Inactive' }}
                                                    </button>
                                                </form>
                                            </td>
                                            <td class="border-b border-stroke py-5 px-4 dark:border-strokedark">
                                                <form method="POST"
                                                    action="{{ route('admin.products.toggle-featured', $product) }}"
                                                    class="inline">
                                                    @csrf
                                                    <button type="submit"
                                                        class="inline-flex items-center rounded-full px-2.5 py-0.5 text-xs font-medium {{ $product->featured ? 'bg-yellow-100 text-yellow-800' : 'bg-gray-100 text-gray-800' }}">
                                                        {{ $product->featured ? 'Featured' : 'Normal' }}
                                                    </button>
                                                </form>
                                            </td>
                                            <td class="border-b border-stroke py-5 px-4 dark:border-strokedark">
                                                <p class="text-sm text-black dark:text-white">
                                                    {{ $product->created_at->format('M d, Y') }}</p>
                                            </td>
                                            <td class="border-b border-stroke py-5 px-4 dark:border-strokedark">
                                                <div class="flex items-center space-x-3.5">
                                                    <a href="{{ route('admin.products.show', $product) }}"
                                                        class="hover:text-primary" title="View">
                                                        <svg class="h-4 w-4" fill="none" stroke="currentColor"
                                                            viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z">
                                                            </path>
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2"
                                                                d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
                                                            </path>
                                                        </svg>
                                                    </a>
                                                    <a href="{{ route('admin.products.edit', $product) }}"
                                                        class="hover:text-primary" title="Edit">
                                                        <svg class="h-4 w-4" fill="none" stroke="currentColor"
                                                            viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2"
                                                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                                                            </path>
                                                        </svg>
                                                    </a>
                                                    <form method="POST"
                                                        action="{{ route('admin.products.destroy', $product) }}"
                                                        class="inline"
                                                        onsubmit="return confirm('Are you sure you want to delete this product?')">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="hover:text-red-600" title="Delete">
                                                            <svg class="h-4 w-4" fill="none" stroke="currentColor"
                                                                viewBox="0 0 24 24">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    stroke-width="2"
                                                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                                                </path>
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
                        <div class="mt-6 flex justify-center">
                            {{ $products->links() }}
                        </div>
                    @else
                        <div class="text-center py-12">
                            <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4">
                                </path>
                            </svg>
                            <h3 class="mt-2 text-sm font-medium text-gray-900 dark:text-white">No products</h3>
                            <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Get started by creating your first
                                product.</p>
                            <div class="mt-6">
                                <a href="{{ route('admin.products.create') }}"
                                    class="inline-flex items-center rounded-md bg-primary px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-opacity-90">
                                    <svg class="-ml-0.5 mr-1.5 h-5 w-5" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 4v16m8-8H4"></path>
                                    </svg>
                                    Add New Product
                                </a>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
