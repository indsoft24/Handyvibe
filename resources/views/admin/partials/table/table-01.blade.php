<!-- ====== Table One Start -->
<div class="rounded-lg border border-gray-200 bg-white shadow-sm dark:border-gray-800 dark:bg-black">
    <div class="border-b border-gray-200 px-6 py-4 dark:border-gray-800">
        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Recent Activity</h3>
    </div>
    <div class="overflow-x-auto">
        <table class="w-full">
            <thead class="border-b border-gray-200 bg-gray-50 dark:border-gray-800 dark:bg-gray-900">
                <tr>
                    <th
                        class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500 dark:text-gray-400">
                        Type</th>
                    <th
                        class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500 dark:text-gray-400">
                        Name</th>
                    <th
                        class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500 dark:text-gray-400">
                        Status</th>
                    <th
                        class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500 dark:text-gray-400">
                        Created</th>
                    <th
                        class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500 dark:text-gray-400">
                        Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200 bg-white dark:divide-gray-800 dark:bg-black">
                @php
                    $recent_items = collect();

                    // Add recent categories
                    if (isset($recent_categories) && $recent_categories->count() > 0) {
                        $recent_items = $recent_items->merge(
                            $recent_categories->map(function ($item) {
                                $item->type = 'category';
                                $item->route_name = 'admin.categories.show';
                                return $item;
                            }),
                        );
                    }

                    // Add recent subcategories
                    if (isset($recent_subcategories) && $recent_subcategories->count() > 0) {
                        $recent_items = $recent_items->merge(
                            $recent_subcategories->map(function ($item) {
                                $item->type = 'subcategory';
                                $item->route_name = 'admin.sub-categories.show';
                                return $item;
                            }),
                        );
                    }

                    // Add recent products
                    if (isset($recent_products) && $recent_products->count() > 0) {
                        $recent_items = $recent_items->merge(
                            $recent_products->map(function ($item) {
                                $item->type = 'product';
                                $item->route_name = 'admin.products.show';
                                return $item;
                            }),
                        );
                    }

                    // Add recent services
                    if (isset($recent_services) && $recent_services->count() > 0) {
                        $recent_items = $recent_items->merge(
                            $recent_services->map(function ($item) {
                                $item->type = 'service';
                                $item->route_name = 'admin.services.show';
                                return $item;
                            }),
                        );
                    }

                    // Sort by created_at and take latest 10
                    $recent_items = $recent_items->sortByDesc('created_at')->take(10);
                @endphp

                @if ($recent_items->count() > 0)
                    @foreach ($recent_items as $item)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                @if ($item->type == 'category')
                                    <span
                                        class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-200">
                                        Category
                                    </span>
                                @elseif($item->type == 'subcategory')
                                    <span
                                        class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200">
                                        Sub Category
                                    </span>
                                @elseif($item->type == 'product')
                                    <span
                                        class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-purple-100 text-purple-800 dark:bg-purple-900 dark:text-purple-200">
                                        Product
                                    </span>
                                @elseif($item->type == 'service')
                                    <span
                                        class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-orange-100 text-orange-800 dark:bg-orange-900 dark:text-orange-200">
                                        Service
                                    </span>
                                @endif
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-white">
                                {{ $item->name }}
                                @if (($item->type == 'product' || $item->type == 'service') && isset($item->price))
                                    <span
                                        class="text-xs text-gray-500 dark:text-gray-400">(${{ number_format($item->price, 2) }})</span>
                                @endif
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span
                                    class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $item->status ? 'bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200' : 'bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-200' }}">
                                    {{ $item->status ? 'Active' : 'Inactive' }}
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">
                                {{ $item->created_at->format('M d, Y') }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                <a href="{{ route($item->route_name, $item) }}"
                                    class="text-primary hover:text-primary/80">View</a>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="5" class="px-6 py-4 text-center text-sm text-gray-500 dark:text-gray-400">
                            No recent activity found
                        </td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
</div>
<!-- ====== Table One End -->
