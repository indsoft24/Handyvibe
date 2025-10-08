@extends('layouts.app')

@section('title', $service['name'])

@section('content')
    <div id="fh5co-product">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1 animate-box">
                    <div class="row">
                        <div class="col-md-6">
                            <img class="img-responsive" src="{{ asset($service['image']) }}" alt="{{ $service['name'] }}">
                        </div>
                        <div class="col-md-6">
                            <h2>{{ $service['name'] }}</h2>
                            <p>{{ $service['long_description'] }}</p>

                            <div class="price-and-cart">
                                <span class="price">₹{{ $service['price'] }}</span>
                                <p><a href="#" class="btn btn-primary btn-outline btn-lg">Book Now</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Related Services Section --}}
            <div class="row">
                <div class="col-md-12 text-center animate-box">
                    <div class="fh5co-heading">
                        <h2>Related Services</h2>
                    </div>
                </div>
                @foreach($related as $relatedService)
                    <div class="col-md-4 text-center animate-box">
                        <div class="product">
                            <div class="product-grid" style="background-image:url({{ asset($relatedService['image']) }});">
                                <div class="inner">
                                    <p>
                                        <a href="{{ route('service.show', ['slug' => $relatedService['slug']]) }}" class="icon"><i class="icon-shopping-cart"></i></a>
                                        <a href="{{ route('service.show', ['slug' => $relatedService['slug']]) }}" class="icon"><i class="icon-eye"></i></a>
                                    </p>
                                </div>
                            </div>
                            <div class="desc">
                                <h3><a href="{{ route('service.show', ['slug' => $relatedService['slug']]) }}">{{ $relatedService['name'] }}</a></h3>
                                <span class="price">₹{{ $relatedService['price'] }}</span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection