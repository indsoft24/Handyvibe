@extends('layouts.admin')

@section('title', 'Tables')

@section('content')
<!-- Breadcrumb Start -->
<div x-data="{ pageName: `Tables`}">
  @include('admin.partials.breadcrumb')
</div>
<!-- Breadcrumb End -->

<div class="overflow-hidden rounded-2xl border border-gray-200 bg-white px-5 pt-5 dark:border-gray-800 dark:bg-white/[0.03] sm:px-6 sm:pt-6">
  <h3 class="text-lg font-semibold text-gray-800 dark:text-white/90 mb-6">
    Basic Tables
  </h3>
  
  <div class="overflow-x-auto">
    <table class="w-full table-auto">
      <thead>
        <tr class="bg-gray-50 dark:bg-gray-800">
          <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider dark:text-gray-400">
            Name
          </th>
          <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider dark:text-gray-400">
            Email
          </th>
          <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider dark:text-gray-400">
            Role
          </th>
          <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider dark:text-gray-400">
            Status
          </th>
        </tr>
      </thead>
      <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-900 dark:divide-gray-700">
        <tr>
          <td class="px-4 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-white">
            John Doe
          </td>
          <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">
            john@example.com
          </td>
          <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">
            Admin
          </td>
          <td class="px-4 py-4 whitespace-nowrap">
            <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-success-100 text-success-800 dark:bg-success-500/20 dark:text-success-400">
              Active
            </span>
          </td>
        </tr>
        <tr>
          <td class="px-4 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-white">
            Jane Smith
          </td>
          <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">
            jane@example.com
          </td>
          <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">
            User
          </td>
          <td class="px-4 py-4 whitespace-nowrap">
            <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-warning-100 text-warning-800 dark:bg-warning-500/20 dark:text-warning-400">
              Pending
            </span>
          </td>
        </tr>
        <tr>
          <td class="px-4 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-white">
            Mike Johnson
          </td>
          <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">
            mike@example.com
          </td>
          <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">
            User
          </td>
          <td class="px-4 py-4 whitespace-nowrap">
            <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-error-100 text-error-800 dark:bg-error-500/20 dark:text-error-400">
              Inactive
            </span>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</div>
@endsection