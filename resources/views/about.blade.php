@extends('layouts.app')

@section('title', 'About HandyVibe - Doorstep Home & Beauty Services')

@section('content')
    {{-- Hero Header --}}
    <header id="fh5co-header" class="fh5co-cover fh5co-cover-sm" role="banner"
        style="background-image:url({{ asset('images/img_bg_2.jpg') }});">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2 text-center">
                    <div class="display-t">
                        <div class="display-tc animate-box" data-animate-effect="fadeIn">
                            <h1>About HandyVibe</h1>
                            <h2>One App. All Services. Anytime.</h2>
                            <p>Bringing qualified experts to your doorstep for home solutions and beauty services.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    {{-- Main About Section --}}
    <div id="fh5co-about">
        <div class="container">
            
            {{-- Our Story Section with Split Layout --}}
            <div class="row animate-box section-padding">
                <div class="col-md-6">
                    <h2>Our Story & Mission</h2>
                    <p>HandyVibe is a reliable online platform connecting consumers with qualified service professionals right at their doorstep.</p>
                    <p>No more running around for daily chores. The concept is simple: quality service in minimal time, saving both time and money from the comfort of your home[web:2][web:6].</p>
                    <p>Our mission is to connect with the maximum number of consumers and deliver high-quality, standardized, and reliable services across home and beauty categories[web:4][web:6].</p>
                </div>
                <div class="col-md-6">
                    <img class="img-responsive rounded-img" src="{{ asset('images/img_bg_2.jpg') }}" 
                         alt="HandyVibe service professional at work">
                </div>
            </div>

            {{-- What We Do Section --}}
            <div class="row animate-box section-padding bg-light">
                <div class="col-md-12 text-center">
                    <h2>What We Do</h2>
                    <p class="lead">Our platform makes it simple to book essential services right to your door.</p>
                </div>
            </div>

            <div class="row animate-box">
                {{-- Home Solutions Card --}}
                <div class="col-md-6 col-sm-6">
                    <div class="service-card">
                        <div class="service-img-wrapper">
                            <img class="img-responsive" src="{{ asset('images/img_bg_2.jpg') }}" 
                                 alt="Home repair and maintenance services">
                        </div>
                        <div class="service-content">
                            <h3><i class="icon-home"></i> Home Solutions</h3>
                            <ul class="service-list">
                                <li><strong>Electrical:</strong> Find trusted electricians for all electrical needs</li>
                                <li><strong>Plumbing:</strong> Fix leaks, clogs, and all plumbing issues</li>
                                <li><strong>Carpentry:</strong> Skilled professionals for woodwork and repairs</li>
                                <li><strong>Cleaning:</strong> Professional home cleaning services</li>
                                <li><strong>Pest Control:</strong> Reliable pest management solutions</li>
                                <li><strong>Painting:</strong> Expert painting and finishing services</li>
                                <li><strong>Appliance Repair:</strong> Expert solutions for all home appliances</li>
                                <li><strong>Car Wash:</strong> Doorstep car washing services</li>
                            </ul>
                        </div>
                    </div>
                </div>

                {{-- Beauty & Health Card --}}
                <div class="col-md-6 col-sm-6">
                    <div class="service-card">
                        <div class="service-img-wrapper">
                            <img class="img-responsive" src="{{ asset('images/img_bg_2.jpg') }}" 
                                 alt="Professional beauty and wellness services">
                        </div>
                        <div class="service-content">
                            <h3><i class="icon-heart"></i> Beauty & Health</h3>
                            <ul class="service-list">
                                <li><strong>Skin Care:</strong> Professional facial and skincare treatments</li>
                                <li><strong>Hair Care:</strong> Expert hair styling and treatment services</li>
                                <li><strong>Massage Therapy:</strong> Relaxing therapeutic massage at home</li>
                            </ul>
                            <div class="quality-badge">
                                <p><i class="icon-check"></i> All services provided by qualified and trustworthy professionals</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- How We Deliver Quality Section --}}
            <div class="row animate-box section-padding">
                <div class="col-md-6">
                    <img class="img-responsive rounded-img" src="{{ asset('images/img_bg_2.jpg') }}" 
                         alt="Trained service professionals delivering quality work">
                </div>
                <div class="col-md-6">
                    <h2>How We Deliver Quality</h2>
                    <p>We go beyond simply listing providers. HandyVibe manages the entire service experience to ensure quality and reliability.</p>
                    
                    <div class="quality-points">
                        <div class="quality-item">
                            <i class="icon-users"></i>
                            <h4>Trained Professionals</h4>
                            <p>Services delivered by a network of trained, independent service professionals.</p>
                        </div>
                        <div class="quality-item">
                            <i class="icon-shield"></i>
                            <h4>Quality Assurance</h4>
                            <p>Every service meets a consistent standard of quality and professionalism.</p>
                        </div>
                        <div class="quality-item">
                            <i class="icon-mobile"></i>
                            <h4>Technology-Driven</h4>
                            <p>Our full-stack approach guarantees seamless service from booking to completion.</p>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Value Proposition Banner --}}
            <div class="row animate-box">
                <div class="col-md-12">
                    <div class="value-banner text-center">
                        <h2>Why Choose HandyVibe?</h2>
                        <div class="row">
                            <div class="col-md-3 col-sm-6">
                                <div class="value-item">
                                    <i class="icon-clock"></i>
                                    <h4>Quick Service</h4>
                                    <p>Minimal waiting time</p>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6">
                                <div class="value-item">
                                    <i class="icon-dollar"></i>
                                    <h4>Save Money</h4>
                                    <p>Affordable doorstep services</p>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6">
                                <div class="value-item">
                                    <i class="icon-home"></i>
                                    <h4>Convenience</h4>
                                    <p>Services at your doorstep</p>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6">
                                <div class="value-item">
                                    <i class="icon-star"></i>
                                    <h4>Quality Guaranteed</h4>
                                    <p>Verified professionals only</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Featured Services Highlight --}}
            <div class="row animate-box section-padding">
                <div class="col-md-12 text-center">
                    <h2>Popular Services</h2>
                    <p class="lead">Most requested by our customers</p>
                </div>
            </div>
            
            <div class="row animate-box">
                <div class="col-md-4 col-sm-6">
                    <div class="popular-service-card">
                        <img src="{{ asset('images/img_bg_2.jpg') }}" alt="Electrician services">
                        <h4>Electrical Services</h4>
                        <p>Reliable electricians for home and office electrical needs.</p>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="popular-service-card">
                        <img src="{{ asset('images/img_bg_3.jpg') }}" alt="Plumbing services">
                        <h4>Plumbing Services</h4>
                        <p>Trusted experts fixing leaks, clogs, and all plumbing problems.</p>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="popular-service-card">
                        <img src="{{ asset('images/img_bg_4.jpg') }}" alt="Appliance repair services">
                        <h4>Appliance Repair</h4>
                        <p>Expert solutions for hassle-free appliance repairs.</p>
                    </div>
                </div>
            </div>

            {{-- Call to Action --}}
            <div class="row animate-box section-padding">
                <div class="col-md-12 text-center">
                    <div class="cta-section">
                        <h2>Ready to Experience Hassle-Free Services?</h2>
                        <p>Download the HandyVibe app and get started today.</p>
                        <a href="{{ route('services') }}" class="btn btn-primary btn-lg">Explore Services</a>
                        <a href="{{ route('contact') }}" class="btn btn-outline btn-lg">Contact Us</a>
                    </div>
                </div>
            </div>

        </div>
    </div>

    {{-- Custom Styles --}}
    <style>
        .section-padding {
            padding: 60px 0;
        }
        
        .bg-light {
            background-color: #f8f9fa;
            padding: 40px 0;
            margin-bottom: 40px;
        }
        
        .service-card {
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 15px rgba(0,0,0,0.1);
            margin-bottom: 30px;
            transition: transform 0.3s;
        }
        
        .service-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 25px rgba(0,0,0,0.15);
        }
        
        .service-img-wrapper {
            height: 250px;
            overflow: hidden;
            border-radius: 8px 8px 0 0;
        }
        
        .service-img-wrapper img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        
        .service-content {
            padding: 30px;
        }
        
        .service-content h3 {
            color: #2c3e50;
            margin-bottom: 20px;
            font-size: 24px;
        }
        
        .service-list {
            list-style: none;
            padding: 0;
        }
        
        .service-list li {
            padding: 8px 0;
            border-bottom: 1px solid #eee;
        }
        
        .service-list li:last-child {
            border-bottom: none;
        }
        
        .quality-badge {
            background: #e8f5e9;
            padding: 15px;
            border-radius: 5px;
            margin-top: 20px;
        }
        
        .quality-badge i {
            color: #4caf50;
        }
        
        .quality-points {
            margin-top: 20px;
        }
        
        .quality-item {
            display: flex;
            align-items: start;
            margin-bottom: 25px;
        }
        
        .quality-item i {
            font-size: 36px;
            color: #f46f21;
            margin-right: 20px;
            flex-shrink: 0;
        }
        
        .quality-item h4 {
            margin: 0 0 8px 0;
            color: #2c3e50;
        }
        
        .quality-item p {
            margin: 0;
            color: #666;
        }
        
        .value-banner {
            background: linear-gradient(135deg, #f46f21 0%, #ff8c42 100%);
            color: white;
            padding: 50px 30px;
            border-radius: 10px;
            margin: 40px 0;
        }
        
        .value-banner h2 {
            color: white;
            margin-bottom: 40px;
        }
        
        .value-item {
            padding: 20px;
        }
        
        .value-item i {
            font-size: 48px;
            margin-bottom: 15px;
            opacity: 0.9;
        }
        
        .value-item h4 {
            color: white;
            margin: 15px 0 10px;
            font-weight: 600;
        }
        
        .value-item p {
            color: rgba(255,255,255,0.9);
            margin: 0;
        }
        
        .popular-service-card {
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.08);
            padding: 20px;
            margin-bottom: 30px;
            text-align: center;
            transition: all 0.3s;
        }
        
        .popular-service-card:hover {
            box-shadow: 0 5px 20px rgba(0,0,0,0.15);
        }
        
        .popular-service-card img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-radius: 5px;
            margin-bottom: 15px;
        }
        
        .popular-service-card h4 {
            color: #2c3e50;
            margin: 15px 0 10px;
        }
        
        .cta-section {
            background: #f8f9fa;
            padding: 60px 30px;
            border-radius: 10px;
        }
        
        .cta-section h2 {
            color: #2c3e50;
            margin-bottom: 20px;
        }
        
        .cta-section .btn {
            margin: 10px;
            padding: 15px 35px;
        }
        
        .rounded-img {
            border-radius: 8px;
            box-shadow: 0 3px 15px rgba(0,0,0,0.1);
        }
        
        @media (max-width: 768px) {
            .section-padding {
                padding: 30px 0;
            }
            
            .value-banner {
                padding: 30px 15px;
            }
            
            .quality-item {
                flex-direction: column;
                text-align: center;
            }
            
            .quality-item i {
                margin: 0 0 15px 0;
            }
        }
    </style>
@endsection
