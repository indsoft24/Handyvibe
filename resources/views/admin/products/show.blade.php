@extends('layouts.main')

@section('title', $product->name)

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 offset-md-1">
            <div class="my-5">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h2 class="mb-0">Product Details</h2>
                    <a href="{{ route('admin.products.index') }}" class="btn btn-secondary">
                        <i class="icon-arrow-left"></i> Back to List
                    </a>
                </div>

                <div class="card shadow-sm">
                    <div class="card-body p-4">
                        <div class="row">
                            <div class="col-md-5">
                                @if($product->image)
                                    <img src="{{ asset('storage/' . $product->image) }}" 
                                         alt="{{ $product->name }}" 
                                         class="img-fluid rounded shadow-sm">
                                @else
                                    <div class="bg-light d-flex align-items-center justify-content-center rounded" 
                                         style="height: 400px;">
                                        <div class="text-center">
                                            <i class="icon-image" style="font-size: 80px; color: #ccc;"></i>
                                            <p class="text-muted mt-3">No image available</p>
                                        </div>
                                    </div>
                                @endif
                            </div>
                            
                            <div class="col-md-7">
                                <div class="mb-4">
                                    <h3 class="mb-3">{{ $product->name }}</h3>
                                    <span class="badge badge-{{ $product->is_active ? 'success' : 'danger' }} mb-3">
                                        {{ $product->is_active ? 'Active' : 'Inactive' }}
                                    </span>
                                </div>

                                <table class="table table-borderless">
                                    <tbody>
                                        <tr>
                                            <th width="35%" class="text-muted">Product Code:</th>
                                            <td><strong>{{ $product->code }}</strong></td>
                                        </tr>
                                        <tr>
                                            <th class="text-muted">Price:</th>
                                            <td><h4 class="text-primary mb-0">${{ number_format($product->price, 2) }}</h4></td>
                                        </tr>
                                        <tr>
                                            <th class="text-muted">Quantity in Stock:</th>
                                            <td>
                                                <span class="badge badge-{{ $product->quantity > 10 ? 'success' : 'warning' }}">
                                                    {{ $product->quantity }} units
                                                </span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="text-muted">Created Date:</th>
                                            <td>{{ $product->created_at ? $product->created_at->format('M d, Y - h:i A') : '' }}</td>
                                        </tr>
                                        <tr>
                                            <th class="text-muted">Last Updated:</th>
                                            <td>{{ $product->updated_at ? $product->updated_at->format('M d, Y - h:i A') : '' }}</td>
                                        </tr>
                                    </tbody>
                                </table>

                                @if($product->description)
                                <div class="mt-4">
                                    <h5 class="text-muted">Description</h5>
                                    <p class="text-justify">{{ $product->description }}</p>
                                </div>
                                @endif

                                <hr class="my-4">

                                <div class="d-flex gap-2">
                                    <a href="{{ route('admin.products.edit', $product) }}" class="btn btn-warning">
                                        <i class="icon-pencil"></i> Edit Product
                                    </a>
                                    <form action="{{ route('admin.products.destroy', $product) }}" method="POST" class="d-inline ml-2" onsubmit="return confirm('Are you sure you want to delete this product?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">
                                            <i class="icon-trash"></i> Delete Product
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
