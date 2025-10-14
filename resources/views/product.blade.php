@extends('layouts.app')

@section('title', 'Our Products')

@section('content')
    <header id="fh5co-header" class="fh5co-cover fh5co-cover-sm" role="banner"
        style="background-image:url({{ asset('images/img_bg_2.jpg') }});">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2 text-center">
                    <div class="display-t">
                        <div class="display-tc animate-box" data-animate-effect="fadeIn">
                            <h1>Our Products</h1>
                            <h2>All our professional services, available for booking.</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div id="fh5co-product">
        <div class="container">
            <div class="row animate-box">
                <div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
                    <span>For Your Home & Well-being</span>
                    <h2>HandyVibe Products</h2>
                    <p>Our platform makes it simple for you to book essential services right to your door, from home repairs to personal care.</p>
                </div>
            </div>
            <div class="row">
                @forelse($products as $product)
                    <div class="col-md-4 text-center animate-box">
                        <div class="product">
                            <div class="product-grid" style="background-image:url({{ asset($product->featured_image ? 'storage/' . $product->featured_image : 'images/product-1.jpg') }});">
                                @if($product->isOnSale())
                                    <span class="sale">Sale</span>
                                @endif
                                <div class="inner">
                                    <p>
                                        <a href="{{ route('product.show', $product) }}" class="icon"><i class="icon-shopping-cart"></i></a>
                                        <a href="{{ route('product.show', $product) }}" class="icon"><i class="icon-eye"></i></a>
                                    </p>
                                </div>
                            </div>
                            <div class="desc">
                                <h3><a href="{{ route('product.show', $product) }}">{{ $product->name }}</a></h3>
                                <span class="price">
                                    @if($product->isOnSale())
                                        <span class="old-price">₹{{ number_format($product->price, 2) }}</span>
                                        ₹{{ number_format($product->current_price, 2) }}
                                    @else
                                        ₹{{ number_format($product->price, 2) }}
                                    @endif
                                </span>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-md-12 text-center">
                        <p>No products available at the moment.</p>
                    </div>
                @endforelse
            </div>
            
            @if($products->hasPages())
                <div class="row">
                    <div class="col-md-12 text-center">
                        {{ $products->links() }}
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection