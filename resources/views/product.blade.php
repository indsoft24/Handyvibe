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
                @foreach ($services as $service)
                    <div class="col-md-4 text-center animate-box">
                        <div class="product">
                            <div class="product-grid" style="background-image:url({{ asset($service['image']) }});">
                                <div class="inner">
                                    <p>
                                        <a href="{{ route('service.show', ['slug' => $service['slug']]) }}" class="icon"><i class="icon-shopping-cart"></i></a>
                                        <a href="{{ route('service.show', ['slug' => $service['slug']]) }}" class="icon"><i class="icon-eye"></i></a>
                                    </p>
                                </div>
                            </div>
                            <div class="desc">
                                <h3><a href="{{ route('service.show', ['slug' => $service['slug']]) }}">{{ $service['name'] }}</a></h3>
                                <span class="price">₹{{ $service['price'] }}</span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection