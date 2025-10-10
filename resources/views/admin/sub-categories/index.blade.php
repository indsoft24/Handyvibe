@extends('layouts.admin')

@section('title', 'Sub Categories')

@section('content')
    <div class="grid grid-cols-12 gap-4 md:gap-6">
        <!-- Page Header -->
        <div class="col-span-12">
            <div class="flex items-center justify-between">
                <div>
                    <h1 class="text-2xl font-bold text-black dark:text-white">Sub Categories</h1>
                    <p class="text-sm text-gray-600 dark:text-gray-400">Manage your product sub categories</p>
                </div>
                <a href="{{ route('admin.sub-categories.create') }}"
                    class="inline-flex items-center justify-center rounded-md bg-primary px-4 py-2 text-center font-medium text-white hover:bg-opacity-90">
                    <svg class="mr-2 h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                    </svg>
                    Add New Sub Category
                </a>
            </div>
        </div>

        <!-- Sub Categories Table -->
        <div class="col-span-12">
            <div class="rounded-sm border border-stroke bg-white shadow-default dark:border-strokedark dark:bg-boxdark">
                <div class="border-b border-stroke px-7 py-4 dark:border-strokedark">
                    <h3 class="font-medium text-black dark:text-white">All Sub Categories</h3>
                </div>
                <div class="p-7">
                    @if ($subCategories->count() > 0)
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
                                        <th class="min-w-[150px] py-4 px-4 font-medium text-black dark:text-white">Slug</th>
                                        <th class="min-w-[100px] py-4 px-4 font-medium text-black dark:text-white">Products
                                        </th>
                                        <th class="min-w-[100px] py-4 px-4 font-medium text-black dark:text-white">Status
                                        </th>
                                        <th class="min-w-[100px] py-4 px-4 font-medium text-black dark:text-white">Sort
                                            Order</th>
                                        <th class="min-w-[120px] py-4 px-4 font-medium text-black dark:text-white">Created
                                        </th>
                                        <th class="py-4 px-4 font-medium text-black dark:text-white">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($subCategories as $subCategory)
                                        <tr class="border-b border-stroke dark:border-strokedark">
                                            <td
                                                class="border-b border-stroke py-5 px-4 pl-9 dark:border-strokedark xl:pl-11">
                                                <h5 class="font-medium text-black dark:text-white">{{ $subCategory->id }}
                                                </h5>
                                            </td>
                                            <td class="border-b border-stroke py-5 px-4 dark:border-strokedark">
                                                @if ($subCategory->image)
                                                    <img src="{{ asset('storage/' . $subCategory->image) }}"
                                                        alt="{{ $subCategory->name }}"
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
                                                    <h5 class="font-medium text-black dark:text-white">
                                                        {{ $subCategory->name }}</h5>
                                                    @if ($subCategory->description)
                                                        <p class="text-sm text-gray-500 dark:text-gray-400">
                                                            {{ Str::limit($subCategory->description, 50) }}</p>
                                                    @endif
                                                </div>
                                            </td>
                                            <td class="border-b border-stroke py-5 px-4 dark:border-strokedark">
                                                <span
                                                    class="inline-flex items-center rounded-full bg-blue-100 px-2.5 py-0.5 text-xs font-medium text-blue-800">
                                                    {{ $subCategory->category->name }}
                                                </span>
                                            </td>
                                            <td class="border-b border-stroke py-5 px-4 dark:border-strokedark">
                                                <code
                                                    class="text-sm text-gray-600 dark:text-gray-400">{{ $subCategory->slug }}</code>
                                            </td>
                                            <td class="border-b border-stroke py-5 px-4 dark:border-strokedark">
                                                <span
                                                    class="inline-flex items-center rounded-full bg-green-100 px-2.5 py-0.5 text-xs font-medium text-green-800">
                                                    {{ $subCategory->products_count }}
                                                </span>
                                            </td>
                                            <td class="border-b border-stroke py-5 px-4 dark:border-strokedark">
                                                <form method="POST"
                                                    action="{{ route('admin.sub-categories.toggle-status', $subCategory) }}"
                                                    class="inline">
                                                    @csrf
                                                    <button type="submit"
                                                        class="inline-flex items-center rounded-full px-2.5 py-0.5 text-xs font-medium {{ $subCategory->status ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                                        {{ $subCategory->status ? 'Active' : 'Inactive' }}
                                                    </button>
                                                </form>
                                            </td>
                                            <td class="border-b border-stroke py-5 px-4 dark:border-strokedark">
                                                <p class="text-sm text-black dark:text-white">
                                                    {{ $subCategory->sort_order }}</p>
                                            </td>
                                            <td class="border-b border-stroke py-5 px-4 dark:border-strokedark">
                                                <p class="text-sm text-black dark:text-white">
                                                    {{ $subCategory->created_at->format('M d, Y') }}</p>
                                            </td>
                                            <td class="border-b border-stroke py-5 px-4 dark:border-strokedark">
                                                <div class="flex items-center space-x-3.5">
                                                    <a href="{{ route('admin.sub-categories.show', $subCategory) }}"
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
                                                    <a href="{{ route('admin.sub-categories.edit', $subCategory) }}"
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
                                                        action="{{ route('admin.sub-categories.destroy', $subCategory) }}"
                                                        class="inline"
                                                        onsubmit="return confirm('Are you sure you want to delete this sub category?')">
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
                            {{ $subCategories->links() }}
                        </div>
                    @else
                        <div class="text-center py-12">
                            <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z">
                                </path>
                            </svg>
                            <h3 class="mt-2 text-sm font-medium text-gray-900 dark:text-white">No sub categories</h3>
                            <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Get started by creating your first sub
                                category.</p>
                            <div class="mt-6">
                                <a href="{{ route('admin.sub-categories.create') }}"
                                    class="inline-flex items-center rounded-md bg-primary px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-opacity-90">
                                    <svg class="-ml-0.5 mr-1.5 h-5 w-5" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 4v16m8-8H4"></path>
                                    </svg>
                                    Add New Sub Category
                                </a>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
