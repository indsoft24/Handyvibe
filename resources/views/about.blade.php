@extends('layouts.app')

@section('title', 'About Us')

@section('content')
    <header id="fh5co-header" class="fh5co-cover fh5co-cover-sm" role="banner"
        style="background-image:url({{ asset('images/img_bg_2.jpg') }});">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2 text-center">
                    <div class="display-t">
                        <div class="display-tc animate-box" data-animate-effect="fadeIn">
                            <h1>About HandyVibe</h1>
                            <h2>Connecting you with high-quality, standardized, and reliable home and beauty services. </h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div id="fh5co-about">
        <div class="container">
            <div class="about-content">
                <div class="row animate-box">
                    <div class="col-md-6">
                        <div class="desc">
                            <h3>Our Story & Purpose</h3>
                            <p>HandyVibe is a reliable online resource that brings qualified experts to your doorstep. Our mission is to connect with the maximum number of consumers and provide services with high-quality, standardized, and reliable services.  The concept is simple: whenever you need a service, you can receive quality assistance in minimal time, saving both time and money from the comfort of your home.</p>
                        </div>
                        <div class="desc">
                            <h3>What We Do</h3>
                            <p>Our platform makes it simple for you to book essential services right to your door. Our offerings span everything required to run a home and manage personal care:</p>
                             <ul>
                                <li><strong>Home Solutions:</strong> Cleaning, pest control, plumbing, carpentry, painting, and appliance servicing and repair.</li>
                                <li><strong>Beauty and Health:</strong> Home services for skin care, hair care, and massage therapy.</li>
                            </ul>
                        </div>
                         <div class="desc">
                            <h3>How We Deliver Quality</h3>
                            <p>We manage the entire service experience to ensure quality and reliability. All services are delivered by a network of trained, independent service professionals, ensuring every job meets a consistent standard of quality.</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <img class="img-responsive" src="{{ asset('images/img_bg_1.jpg') }}" alt="about">
                    </div>
                </div>
            </div>
            <div class="row animate-box">
                <div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
                    <span>Productive Staff</span>
                    <h2>Meet Our Team</h2>
                    <p>Dignissimos asperiores vitae velit veniam totam fuga molestias accusamus alias autem provident. Odit
                        ab aliquam dolor eius.</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 col-sm-4 animate-box" data-animate-effect="fadeIn">
                    <div class="fh5co-staff">
                        <img src="{{ asset('images/person1.jpg') }}" alt="Jean Smith">
                        <h3>Jean Smith</h3>
                        <strong class="role">Chief Executive Officer</strong>
                        <p>Quos quia provident consequuntur culpa facere ratione maxime commodi voluptates id repellat velit
                            eaque aspernatur expedita. Possimus itaque adipisci.</p>
                        <ul class="fh5co-social-icons">
                            <li><a href="#"><i class="icon-facebook"></i></a></li>
                            <li><a href="#"><i class="icon-twitter"></i></a></li>
                            <li><a href="#"><i class="icon-dribbble"></i></a></li>
                            <li><a href="#"><i class="icon-github"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 animate-box" data-animate-effect="fadeIn">
                    <div class="fh5co-staff">
                        <img src="{{ asset('images/person2.jpg') }}" alt="Hush Raven">
                        <h3>Hush Raven</h3>
                        <strong class="role">Co-Owner</strong>
                        <p>Quos quia provident consequuntur culpa facere ratione maxime commodi voluptates id repellat velit
                            eaque aspernatur expedita. Possimus itaque adipisci.</p>
                        <ul class="fh5co-social-icons">
                            <li><a href="#"><i class="icon-facebook"></i></a></li>
                            <li><a href="#"><i class="icon-twitter"></i></a></li>
                            <li><a href="#"><i class="icon-dribbble"></i></a></li>
                            <li><a href="#"><i class="icon-github"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 animate-box" data-animate-effect="fadeIn">
                    <div class="fh5co-staff">
                        <img src="{{ asset('images/person3.jpg') }}" alt="Alex King">
                        <h3>Alex King</h3>
                        <strong class="role">Co-Owner</strong>
                        <p>Quos quia provident consequuntur culpa facere ratione maxime commodi voluptates id repellat velit
                            eaque aspernatur expedita. Possimus itaque adipisci.</p>
                        <ul class="fh5co-social-icons">
                            <li><a href="#"><i class="icon-facebook"></i></a></li>
                            <li><a href="#"><i class="icon-twitter"></i></a></li>
                            <li><a href="#"><i class="icon-dribbble"></i></a></li>
                            <li><a href="#"><i class="icon-github"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="fh5co-started">
        <div class="container">
            <div class="row animate-box">
                <div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
                    <h2>Newsletter</h2>
                    <p>Just stay tuned for our latest Product. Now you can subscribe</p>
                </div>
            </div>
            <div class="row animate-box">
                <div class="col-md-8 col-md-offset-2">
                    <form class="form-inline">
                        <div class="col-md-6 col-sm-6">
                            <div class="form-group">
                                <label for="email" class="sr-only">Email</label>
                                <input type="email" class="form-control" id="email" placeholder="Email">
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <button type="submit" class="btn btn-default btn-block">Subscribe</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection