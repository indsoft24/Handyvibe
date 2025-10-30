@extends('layouts.app')

@section('title', 'HandyVibe')
@section('content')
    <aside id="fh5co-hero" class="js-fullheight">
        <div class="flexslider js-fullheight">
            <ul class="slides">
                <li style="background-image: url(images/electrician.jpg);">
                    <div class="overlay-gradient"></div>
                    <div class="container">
                        <div class="col-md-5 col-md-offset-2 col-md-pull-2 js-fullheight slider-text">
                            <div class="slider-text-inner">
                                <div class="desc">
                                    <span class="price">₹800</span>
                                    <h2>Electrician</h2>
                                    <p>Looking for a reliable electrician? Find trusted experts easily with HandyVibe – your
                                        one-stop solution for all electrical services at home or office.</p>
                                    <p><a href="" class="btn btn-primary btn-outline btn-lg">Book
                                            Now</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li style="background-image: url(images/plumber.jpg);">
                    <div class="container">
                        <div class="col-md-5 col-md-offset-2 col-md-pull-2 js-fullheight slider-text">
                            <div class="slider-text-inner">
                                <div class="desc">
                                    <span class="price">₹530</span>
                                    <h2>Plumber</h2>
                                    <p>Looking for a reliable plumber? HandyVibe relates you with trusted experts who can
                                        fix leaks, clogs, and all plumbing needs right at your doorstep.</p>
                                    <p><a href="" class="btn btn-primary btn-outline btn-lg">Book
                                            Now</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li style="background-image: url(images/carpenter.jpg);">
                    <div class="container">
                        <div class="col-md-5 col-md-offset-2 col-md-pull-2 js-fullheight slider-text">
                            <div class="slider-text-inner">
                                <div class="desc">
                                    <span class="price">₹750</span>
                                    <h2>Carpenter</h2>
                                    <p>FLooking for a reliable carpenter? Find skilled professionals easily with HandyVibe,
                                        your trusted company for doorstep services.</p>
                                    <p><a href="" class="btn btn-primary btn-outline btn-lg">Book
                                            Now</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li style="background-image: url(images/car wash.jpg);">
                    <div class="container">
                        <div class="col-md-5 col-md-offset-2 col-md-pull-2 js-fullheight slider-text">
                            <div class="slider-text-inner">
                                <div class="desc">
                                    <span class="price">₹540</span>
                                    <h2>Car washing</h2>
                                    <p>Looking for a quick and reliable car wash? HandyVibe brings trusted car washing
                                        services right to your doorstep.</p>
                                    <p><a href="" class="btn btn-primary btn-outline btn-lg">Book
                                            Now</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li style="background-image: url(images/img_bg_5.jpg);">
                    <div class="container">
                        <div class="col-md-5 col-md-offset-2 col-md-pull-2 js-fullheight slider-text">
                            <div class="slider-text-inner">
                                <div class="desc">
                                    <span class="price">₹940</span>
                                    <h2>Home appliances repair and service</h2>
                                    <p>Looking for reliable Home Appliances Repair and Services? Find expert solutions with
                                        HandyVibe, your trusted company for hassle-free repairs at your doorstep.</p>
                                    <p><a href="" class="btn btn-primary btn-outline btn-lg">Book
                                            Now</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </aside>

    <div id="fh5co-services" class="fh5co-bg-section position-relative">
        <div class="container">
            <div class="owl-carousel owl-theme" id="service-carousel">

                <!-- Card 1 -->
                <div class="item">
                    <div class="card shadow-sm">
                        <img src="{{ asset('images/img_bg_1.jpg') }}" class="img-responsive" alt="Service 1">
                    </div>
                </div>

                <!-- Card 2 -->
                <div class="item">
                    <div class="card shadow-sm">
                        <img src="{{ asset('images/img_bg_2.jpg') }}" class="img-responsive" alt="Service 2">
                    </div>
                </div>

                <div class="item">
                    <div class="card shadow-sm">
                        <img src="{{ asset('images/img_bg_3.jpg') }}" class="img-responsive" alt="Service 3">
                    </div>
                </div>

                <div class="item">
                    <div class="card shadow-sm">
                        <img src="{{ asset('images/img_bg_4.jpg') }}" class="img-responsive" alt="Service 4">
                    </div>
                </div>

                <div class="item">
                    <div class="card shadow-sm">
                        <img src="{{ asset('images/img_bg_5.jpg') }}" class="img-responsive" alt="Service 5">
                    </div>
                </div>
                {{-- <button class="custom-owl-prev">
                    <i class="icon-arrow-left"></i>
                </button>
                <button class="custom-owl-next">
                    <i class="icon-arrow-right"></i>
                </button> --}}

            </div>

            <!-- Custom Navigation -->

        </div>
    </div>


    <div id="fh5co-product">
        <div class="container">
            <div class="row animate-box">
                <div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
                    <span>Cool Stuff</span>
                    <h2>Products.</h2>
                    <p>The HandyVibe website offers repair and maintenance services for household appliances such as
                        refrigerators, washing machines, air conditioners, microwaves, geysers, etc..</p>
                </div>
            </div>
            <div class="row">
                @forelse($featuredProducts as $product)
                    <div class="col-md-4 text-center animate-box">
                        <div class="product">
                            <div class="product-grid"
                                style="background-image:url({{ asset($product->featured_image ? 'storage/' . $product->featured_image : 'images/product-1.jpg') }});">
                                @if($product->isOnSale())
                                    <span class="sale">Sale</span>
                                @endif
                                <div class="inner">
                                    <p>
                                        <a href="{{ route('product.show', $product) }}" class="icon"><i
                                                class="icon-shopping-cart"></i></a>
                                        <a href="{{ route('product.show', $product) }}" class="icon"><i
                                                class="icon-eye"></i></a>
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
        </div>
    </div>

    <div id="fh5co-testimonial" class="fh5co-bg-section">
        <div class="container">
            <div class="row animate-box">
                <div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
                    <span>Testimony</span>
                    <h2>Happy Clients</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="row animate-box">
                        <div class="owl-carousel owl-carousel-fullwidth">
                            <div class="item">
                                <div class="testimony-slide active text-center">
                                    <figure>
                                        <img src="images/person1.jpg" alt="user">
                                    </figure>
                                    <span>Jean Doe, via <a href="#" class="twitter">Twitter</a></span>
                                    <blockquote>
                                        <p>&ldquo;Far far away, behind the word mountains, far from the countries
                                            Vokalia and Consonantia, there live the blind texts. Separated they live
                                            in Bookmarksgrove right at the coast of the Semantics, a large language
                                            ocean.&rdquo;</p>
                                    </blockquote>
                                </div>
                            </div>
                            <div class="item">
                                <div class="testimony-slide active text-center">
                                    <figure>
                                        <img src="images/person2.jpg" alt="user">
                                    </figure>
                                    <span>John Doe, via <a href="#" class="twitter">Twitter</a></span>
                                    <blockquote>
                                        <p>&ldquo;Separated they live in Bookmarksgrove right at the coast of the
                                            Semantics, a large language ocean.&rdquo;</p>
                                    </blockquote>
                                </div>
                            </div>
                            <div class="item">
                                <div class="testimony-slide active text-center">
                                    <figure>
                                        <img src="images/person3.jpg" alt="user">
                                    </figure>
                                    <span>John Doe, via <a href="#" class="twitter">Twitter</a></span>
                                    <blockquote>
                                        <p>&ldquo;Far from the countries Vokalia and Consonantia, there live the
                                            blind texts. Separated they live in Bookmarksgrove right at the coast of
                                            the Semantics, a large language ocean.&rdquo;</p>
                                    </blockquote>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div id="fh5co-counter" class="fh5co-bg fh5co-counter" style="background-image:url(images/img_bg_5.jpg);">
        <div class="container">
            <div class="row">
                <div class="display-t">
                    <div class="display-tc">
                        <div class="col-md-3 col-sm-6 animate-box">
                            <div class="feature-center">
                                <span class="icon">
                                    <i class="icon-eye"></i>
                                </span>

                                <span class="counter js-counter" data-from="0" data-to="22070" data-speed="5000"
                                    data-refresh-interval="50">1</span>
                                <span class="counter-label">Creativity Fuel</span>

                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 animate-box">
                            <div class="feature-center">
                                <span class="icon">
                                    <i class="icon-shopping-cart"></i>
                                </span>

                                <span class="counter js-counter" data-from="0" data-to="450" data-speed="5000"
                                    data-refresh-interval="50">1</span>
                                <span class="counter-label">Happy Clients</span>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 animate-box">
                            <div class="feature-center">
                                <span class="icon">
                                    <i class="icon-shop"></i>
                                </span>
                                <span class="counter js-counter" data-from="0" data-to="700" data-speed="5000"
                                    data-refresh-interval="50">1</span>
                                <span class="counter-label">All Products</span>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 animate-box">
                            <div class="feature-center">
                                <span class="icon">
                                    <i class="icon-clock"></i>
                                </span>

                                <span class="counter js-counter" data-from="0" data-to="5605" data-speed="5000"
                                    data-refresh-interval="50">1</span>
                                <span class="counter-label">Hours Spent</span>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            $(document).ready(function () {
                var owl = $("#service-carousel");
                owl.owlCarousel({
                    items: 3,
                    margin: 20,
                    loop: true,
                    dots: false,
                    nav: false,
                    autoplay: true,
                    autoplayTimeout: 3000,
                    responsive: {
                        0: {
                            items: 1
                        },
                        600: {
                            items: 2
                        },
                        1000: {
                            items: 3
                        }
                    }
                });

                // Custom nav
                $(".custom-owl-next").click(function () {
                    owl.trigger('next.owl.carousel');
                });
                $(".custom-owl-prev").click(function () {
                    owl.trigger('prev.owl.carousel');
                });
            });
        </script>
    @endpush

    <style>
        .old-price {
            text-decoration: line-through;
            color: #999;
            font-size: 14px;
            margin-right: 8px;
        }

        .current-price {
            color: #e74c3c;
            font-weight: bold;
        }

        .discount {
            background: #e74c3c;
            color: white;
            padding: 2px 6px;
            border-radius: 3px;
            font-size: 10px;
            margin-left: 8px;
        }

        .product .desc .price {
            display: flex;
            align-items: center;
            justify-content: center;
            flex-wrap: wrap;
        }
    </style>
@endsection