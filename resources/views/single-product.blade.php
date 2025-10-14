@extends('layouts.app')

@section('title', $product->name)

@section('content')
    <header id="fh5co-header" class="fh5co-cover fh5co-cover-sm" role="banner"
        style="background-image:url({{ asset($product->featured_image ? 'storage/' . $product->featured_image : 'images/img_bg_2.jpg') }});">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2 text-center">
                    <div class="display-t">
                        <div class="display-tc animate-box" data-animate-effect="fadeIn">
                            <h1>{{ $product->name }}</h1>
                            <h2>{{ $product->short_description ?? 'Premium quality product' }}</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div id="fh5co-product">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1 animate-box">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="product-image">
                                <img class="img-responsive" src="{{ asset($product->featured_image ? 'storage/' . $product->featured_image : 'images/product-1.jpg') }}" alt="{{ $product->name }}">
                                
                                @if($product->images && count($product->images) > 0)
                                    <div class="product-gallery mt-3">
                                        <div class="row">
                                            @foreach($product->images as $image)
                                                <div class="col-md-3 col-sm-3 col-xs-6">
                                                    <img class="img-responsive thumbnail" src="{{ asset('storage/' . $image) }}" alt="{{ $product->name }}" style="cursor: pointer;" onclick="changeMainImage(this.src)">
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="product-details">
                                <h2>{{ $product->name }}</h2>
                                
                                @if($product->category)
                                    <p class="category"><strong>Category:</strong> {{ $product->category->name }}</p>
                                @endif
                                
                                @if($product->subcategory)
                                    <p class="subcategory"><strong>Subcategory:</strong> {{ $product->subcategory->name }}</p>
                                @endif
                                
                                <div class="price-section">
                                    @if($product->isOnSale())
                                        <span class="old-price">₹{{ number_format($product->price, 2) }}</span>
                                        <span class="current-price">₹{{ number_format($product->current_price, 2) }}</span>
                                        <span class="discount">Save {{ $product->discount_percentage }}%</span>
                                    @else
                                        <span class="current-price">₹{{ number_format($product->price, 2) }}</span>
                                    @endif
                                </div>
                                
                                @if($product->description)
                                    <div class="description">
                                        <h4>Description</h4>
                                        <p>{{ $product->description }}</p>
                                    </div>
                                @endif
                                
                                @if($product->short_description)
                                    <div class="short-description">
                                        <p><em>{{ $product->short_description }}</em></p>
                                    </div>
                                @endif
                                
                                <div class="product-actions">
                                    <div class="stock-info">
                                        @if($product->in_stock)
                                            <span class="in-stock">✓ In Stock</span>
                                        @else
                                            <span class="out-of-stock">✗ Out of Stock</span>
                                        @endif
                                        
                                        @if($product->manage_stock && $product->stock_quantity)
                                            <span class="stock-quantity">({{ $product->stock_quantity }} available)</span>
                                        @endif
                                    </div>
                                    
                                    @if($product->in_stock)
                                        <p><a href="#" class="btn btn-primary btn-outline btn-lg">Add to Cart</a></p>
                                        <p><a href="#" class="btn btn-success btn-outline btn-lg">Buy Now</a></p>
                                    @else
                                        <p><a href="#" class="btn btn-secondary btn-outline btn-lg disabled">Out of Stock</a></p>
                                    @endif
                                </div>
                                
                                @if($product->sku)
                                    <div class="product-meta">
                                        <p><strong>SKU:</strong> {{ $product->sku }}</p>
                                    </div>
                                @endif
                                
                                @if($product->weight)
                                    <div class="product-meta">
                                        <p><strong>Weight:</strong> {{ $product->weight }}</p>
                                    </div>
                                @endif
                                
                                @if($product->dimensions)
                                    <div class="product-meta">
                                        <p><strong>Dimensions:</strong> {{ $product->dimensions }}</p>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @if($relatedProducts->count() > 0)
                <div class="row">
                    <div class="col-md-12">
                        <div class="row animate-box">
                            <div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
                                <span>Related Products</span>
                                <h2>You Might Also Like</h2>
                            </div>
                        </div>
                        <div class="row">
                            @foreach($relatedProducts as $relatedProduct)
                                <div class="col-md-3 text-center animate-box">
                                    <div class="product">
                                        <div class="product-grid" style="background-image:url({{ asset($relatedProduct->featured_image ? 'storage/' . $relatedProduct->featured_image : 'images/product-1.jpg') }});">
                                            @if($relatedProduct->isOnSale())
                                                <span class="sale">Sale</span>
                                            @endif
                                            <div class="inner">
                                                <p>
                                                    <a href="{{ route('product.show', $relatedProduct) }}" class="icon"><i class="icon-shopping-cart"></i></a>
                                                    <a href="{{ route('product.show', $relatedProduct) }}" class="icon"><i class="icon-eye"></i></a>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="desc">
                                            <h3><a href="{{ route('product.show', $relatedProduct) }}">{{ $relatedProduct->name }}</a></h3>
                                            <span class="price">
                                                @if($relatedProduct->isOnSale())
                                                    <span class="old-price">₹{{ number_format($relatedProduct->price, 2) }}</span>
                                                    ₹{{ number_format($relatedProduct->current_price, 2) }}
                                                @else
                                                    ₹{{ number_format($relatedProduct->price, 2) }}
                                                @endif
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>

    <script>
        function changeMainImage(src) {
            document.querySelector('.product-image img').src = src;
        }
    </script>

    <style>
        .price-section {
            margin: 20px 0;
        }
        
        .old-price {
            text-decoration: line-through;
            color: #999;
            font-size: 18px;
            margin-right: 10px;
        }
        
        .current-price {
            color: #e74c3c;
            font-size: 24px;
            font-weight: bold;
        }
        
        .discount {
            background: #e74c3c;
            color: white;
            padding: 2px 8px;
            border-radius: 3px;
            font-size: 12px;
            margin-left: 10px;
        }
        
        .in-stock {
            color: #27ae60;
            font-weight: bold;
        }
        
        .out-of-stock {
            color: #e74c3c;
            font-weight: bold;
        }
        
        .stock-quantity {
            color: #666;
            font-size: 14px;
        }
        
        .product-meta {
            margin: 10px 0;
            font-size: 14px;
            color: #666;
        }
        
        .thumbnail {
            border: 2px solid #ddd;
            border-radius: 4px;
            transition: border-color 0.3s;
        }
        
        .thumbnail:hover {
            border-color: #e74c3c;
        }
        
        .description, .short-description {
            margin: 20px 0;
        }
        
        .product-actions {
            margin: 30px 0;
        }
        
        .product-actions .btn {
            margin: 5px;
        }
    </style>
@endsection
