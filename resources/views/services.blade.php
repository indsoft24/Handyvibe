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

    {{-- NEW SECTION: Detailed Service Descriptions --}}
    <div id="fh5co-detailed-services">
        <div class="container">
            <div class="row animate-box">
                <div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
                    <span>Our Offerings</span>
                    <h2>Explore Our Core Services</h2>
                    [cite_start]<p>HandyVibe offers a wide range of home services you could ever need for a festival or everyday life. [cite: 1]</p>
                </div>
            </div>

            {{-- Electrician Service --}}
            <div class="row">
                <div class="col-md-6 animate-box">
                    <img class="img-responsive" src="{{ asset('images/img_bg_1.jpg') }}" alt="Electrician Service">
                </div>
                <div class="col-md-6 animate-box">
                    <div class="desc">
                        <h3>Expert Electrician Services</h3>
                        [cite_start]<p>Modern homes use advanced electrical appliances, and attempting repairs yourself can be life-threatening. [cite: 1] [cite_start]The HandyVibe company has a solution for all your problems. [cite: 1] [cite_start]If you need a residential electrician, you can get it done through the HandyVibe website within a reasonable budget. [cite: 1]</p>
                        <p><a href="{{ route('products') }}" class="btn btn-primary btn-outline">Book Now</a></p>
                    </div>
                </div>
            </div>

            {{-- Plumber Service --}}
            <div class="row">
                <div class="col-md-6 col-md-push-6 animate-box">
                    <img class="img-responsive" src="{{ asset('images/img_bg_2.jpg') }}" alt="Plumber Service">
                </div>
                <div class="col-md-6 col-md-pull-6 animate-box">
                     <div class="desc">
                        <h3>Reliable Plumbing Solutions</h3>
                        [cite_start]<p>A leaking faucet is something no one can tolerate, especially at night, and local plumbers can cost a fortune. [cite: 1] [cite_start]In the future, if you ever need a plumber, just remember the HandyVibe company directly to get all kinds of services at a minimum price. [cite: 1]</p>
                        <p><a href="{{ route('products') }}" class="btn btn-primary btn-outline">Book Now</a></p>
                    </div>
                </div>
            </div>

            {{-- Carpenter Service --}}
            <div class="row">
                <div class="col-md-6 animate-box">
                    <img class="img-responsive" src="{{ asset('images/img_bg_3.jpg') }}" alt="Carpenter Service">
                </div>
                <div class="col-md-6 animate-box">
                    <div class="desc">
                        <h3>Skilled Carpentry Work</h3>
                        [cite_start]<p>A carpenter is an artist who can give a new look to your house. [cite: 1] [cite_start]For tasks like fixing a sticky door, a rotting window frame, or a damaged deck board, you'll need a carpenter. [cite: 1] [cite_start]You can directly book one by visiting the HandyVibe website. [cite: 1]</p>
                        <p><a href="{{ route('products') }}" class="btn btn-primary btn-outline">Book Now</a></p>
                    </div>
                </div>
            </div>

            {{-- Car Washing Service --}}
             <div class="row">
                <div class="col-md-6 col-md-push-6 animate-box">
                    <img class="img-responsive" src="{{ asset('images/img_bg_4.jpg') }}" alt="Car Washing Service">
                </div>
                <div class="col-md-6 col-md-pull-6 animate-box">
                     <div class="desc">
                        <h3>Convenient Car Washing</h3>
                        [cite_start]<p>Washing your car is a boring and time-consuming task. [cite: 1] [cite_start]Instead of waiting in lines or wasting time, get your car serviced right in your parking space with the help of HandyVibe company services. [cite: 1]</p>
                        <p><a href="{{ route('products') }}" class="btn btn-primary btn-outline">Book Now</a></p>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection