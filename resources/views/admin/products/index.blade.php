@extends('layouts.main')

@section('title', 'Products Management')

@section('content')
<div class="container-fluid px-0">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="mb-0 font-weight-bold">Products</h2>
        <a href="{{ route('admin.products.create') }}" class="btn btn-primary shadow-sm">
            <i class="icon-plus"></i> Add New Product
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert">
                <span>&times;</span>
            </button>
        </div>
    @endif

    <div class="card border-0 shadow-sm">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="thead-light">
                        <tr>
                            <th>Image</th>
                            <th>Code</th>
                            <th>Name</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Status</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($products as $product)
                        <tr>
                            <td>
                                @if($product->image)
                                    <img src="{{ asset('storage/' . $product->image) }}" 
                                         alt="{{ $product->name }}" 
                                         class="img-thumbnail" 
                                         style="width: 50px; height: 50px; object-fit: cover;">
                                @else
                                    <span class="badge badge-light"><i class="icon-image text-muted"></i></span>
                                @endif
                            </td>
                            <td><strong>{{ $product->code }}</strong></td>
                            <td>{{ $product->name }}</td>
                            <td>
                                <span class="badge badge-{{ $product->quantity > 10 ? 'success' : 'warning' }}">
                                    {{ $product->quantity }}
                                </span>
                            </td>
                            <td>
                                <span class="text-primary font-weight-bold">${{ number_format($product->price, 2) }}</span>
                            </td>
                            <td>
                                <span class="badge badge-{{ $product->is_active ? 'success' : 'danger' }}">
                                    {{ $product->is_active ? 'Active' : 'Inactive' }}
                                </span>
                            </td>
                            <td class="text-center">
                                <a href="{{ route('admin.products.show', $product) }}" 
                                   class="btn btn-sm btn-info" 
                                   title="View">
                                    <i class="icon-eye"></i>
                                </a>
                                <a href="{{ route('admin.products.edit', $product) }}" 
                                   class="btn btn-sm btn-warning" 
                                   title="Edit">
                                    <i class="icon-pencil"></i>
                                </a>
                                <form action="{{ route('admin.products.destroy', $product) }}" 
                                      method="POST" 
                                      class="d-inline"
                                      onsubmit="return confirm('Are you sure you want to delete this product?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" 
                                            class="btn btn-sm btn-danger" 
                                            title="Delete">
                                        <i class="icon-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="text-center py-5 text-muted">
                                <i class="icon-info-circle" style="font-size: 48px; color: #ccc;"></i>
                                <p class="mt-3">No products found. 
                                    <a href="{{ route('admin.products.create') }}">Create your first product</a>
                                </p>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="mt-4 d-flex justify-content-center">
        {{ $products->links() }}
    </div>
</div>
@endsection

@push('styles')
<style>
    .card {
        border-radius: 12px;
    }
    .btn-group .btn, .btn-sm {
        margin: 0 2px;
    }
    .badge {
        padding: 5px 12px;
        font-size: 13px;
    }
    .table th, .table td {
        vertical-align: middle !important;
    }
</style>
@endpush
