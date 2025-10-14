@extends('layouts.app')

@section('title', 'Our Services')

@section('content')
    <header id="fh5co-header" class="fh5co-cover fh5co-cover-sm" role="banner"
        style="background-image:url({{ asset('images/img_bg_2.jpg') }});">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2 text-center">
                    <div class="display-t">
                        <div class="display-tc animate-box" data-animate-effect="fadeIn">
                            <h1>Why Choose HandyVibe?</h1>
                            <h2>Experience the convenience and quality of professional home services.</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    {{-- This is the existing section with the feature icons --}}
    <div id="fh5co-services" class="fh5co-bg-section">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-4 text-center">
                    <div class="feature-center animate-box" data-animate-effect="fadeIn">
                        <span class="icon">
                            <i class="icon-user"></i>
                        </span>
                        <h3>Qualified Professionals</h3>
                        <p>You don't have to worry about quality as all services are provided by qualified and trustworthy professionals.</p>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 text-center">
                    <div class="feature-center animate-box" data-animate-effect="fadeIn">
                        <span class="icon">
                            <i class="icon-wallet"></i>
                        </span>
                        <h3>Save Time & Money</h3>
                        <p>Receive quality service within minimal time, saving time and money by sitting at home.</p>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 text-center">
                    <div class="feature-center animate-box" data-animate-effect="fadeIn">
                        <span class="icon">
                            <i class="icon-tools"></i>
                        </span>
                        <h3>Wide Range of Services</h3>
                        <p>Our offerings span everything required to run a home and manage personal care. This includes cleaning, plumbing, repairs, and even beauty services.</p>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 text-center">
                    <div class="feature-center animate-box" data-animate-effect="fadeIn">
                        <span class="icon">
                            <i class="icon-home"></i>
                        </span>
                        <h3>At Your Doorstep</h3>
                        <p>Stop running around for your daily chores when our app can get you all the facilities at your doorstep.</p>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 text-center">
                    <div class="feature-center animate-box" data-animate-effect="fadeIn">
                        <span class="icon">
                            <i class="icon-star"></i>
                        </span>
                        <h3>Guaranteed Quality</h3>
                        <p>Our technology-driven approach guarantees that every service meets a consistent standard of quality and professionalism.</p>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 text-center">
                    <div class="feature-center animate-box" data-animate-effect="fadeIn">
                        <span class="icon">
                            <i class="icon-mobile"></i>
                        </span>
                        <h3>Easy Booking</h3>
                        <p>Our platform makes it simple for you to book essential services right to your door with the help of one app!</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- NEW SECTION: Dynamic Service Listings --}}
    <div id="fh5co-detailed-services">
        <div class="container">
            <div class="row animate-box">
                <div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
                    <span>Our Offerings</span>
                    <h2>Explore Our Core Services</h2>
                    <p>HandyVibe offers a wide range of home services you could ever need for a festival or everyday life.</p>
                </div>
            </div>

            @forelse($services as $service)
                <div class="row {{ $loop->even ? 'flex-row-reverse' : '' }}">
                    <div class="col-md-6 {{ $loop->even ? 'col-md-push-6' : '' }} animate-box">
                        <img class="img-responsive" src="{{ asset($service->featured_image ? 'storage/' . $service->featured_image : 'images/img_bg_1.jpg') }}" alt="{{ $service->name }}">
                    </div>
                    <div class="col-md-6 {{ $loop->even ? 'col-md-pull-6' : '' }} animate-box">
                        <div class="desc">
                            <h3>{{ $service->name }}</h3>
                            @if($service->short_description)
                                <p class="service-short-desc">{{ $service->short_description }}</p>
                            @endif
                            @if($service->description)
                                <p>{{ $service->description }}</p>
                            @endif
                            
                            <div class="service-details">
                                <div class="price-section">
                                    @if($service->is_on_sale)
                                        <span class="old-price">₹{{ number_format($service->price, 2) }}</span>
                                        <span class="current-price">₹{{ number_format($service->current_price, 2) }}</span>
                                        <span class="discount">Save {{ $service->discount_percentage }}%</span>
                                    @else
                                        <span class="current-price">₹{{ number_format($service->price, 2) }}</span>
                                    @endif
                                </div>
                                
                                @if($service->duration)
                                    <div class="duration">
                                        <strong>Duration:</strong> {{ $service->duration }}
                                    </div>
                                @endif
                                
                                @if($service->service_type)
                                    <div class="service-type">
                                        <span class="badge badge-{{ $service->service_type }}">{{ ucfirst(str_replace('_', ' ', $service->service_type)) }}</span>
                                    </div>
                                @endif
                            </div>
                            
                            <p><a href="{{ route('service.show', $service->slug) }}" class="btn btn-primary btn-outline">Book Now</a></p>
                        </div>
                    </div>
                </div>
            @empty
                <div class="row">
                    <div class="col-md-12 text-center">
                        <p>No services available at the moment.</p>
                    </div>
                </div>
            @endforelse

            @if($services->hasPages())
                <div class="row">
                    <div class="col-md-12 text-center">
                        {{ $services->links() }}
                    </div>
                </div>
            @endif
        </div>
    </div>

    <style>
        .service-short-desc {
            font-weight: 500;
            color: #666;
            margin-bottom: 15px;
        }
        
        .service-details {
            margin: 20px 0;
        }
        
        .price-section {
            margin-bottom: 10px;
        }
        
        .old-price {
            text-decoration: line-through;
            color: #999;
            font-size: 16px;
            margin-right: 8px;
        }
        
        .current-price {
            color: #e74c3c;
            font-weight: bold;
            font-size: 18px;
        }
        
        .discount {
            background: #e74c3c;
            color: white;
            padding: 2px 6px;
            border-radius: 3px;
            font-size: 10px;
            margin-left: 8px;
        }
        
        .duration {
            margin: 10px 0;
            color: #666;
        }
        
        .service-type {
            margin: 10px 0;
        }
        
        .badge {
            padding: 4px 8px;
            border-radius: 4px;
            font-size: 12px;
            font-weight: 500;
        }
        
        .badge-one_time {
            background-color: #e3f2fd;
            color: #1976d2;
        }
        
        .badge-recurring {
            background-color: #e8f5e8;
            color: #388e3c;
        }
        
        .badge-subscription {
            background-color: #f3e5f5;
            color: #7b1fa2;
        }
        
        .flex-row-reverse {
            flex-direction: row-reverse;
        }
        
        @media (max-width: 768px) {
            .flex-row-reverse {
                flex-direction: column;
            }
        }
    </style>
@endsection