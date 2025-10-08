@extends('layouts.app')

@section('title', 'Contact Us')

@section('content')
    <header id="fh5co-header" class="fh5co-cover fh5co-cover-sm" role="banner"
        style="background-image:url({{ asset('images/img_bg_2.jpg') }});">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2 text-center">
                    <div class="display-t">
                        <div class="display-tc animate-box" data-animate-effect="fadeIn">
                            <h1>Contact HandyVibe</h1>
                            <h2>Have questions about your privacy or our services? We’re here to help.</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div id="fh5co-contact">
        <div class="container">
            <div class="row">
                <div class="col-md-5 col-md-push-1 animate-box">

                    <div class="fh5co-contact-info">
                        <h3>Contact Information</h3>
                        <ul>
                            <li class="address">[Your Company Address] </li>
                            <li class="phone"><a href="tel://">[Your Contact Number] </a></li>
                            <li class="email"><a href="mailto:">[Your Company Email] </a></li>
                        </ul>
                    </div>

                </div>
                <div class="col-md-6 animate-box">
                    <h3>Get In Touch</h3>
                    <form action="#">
                        @csrf
                        <div class="row form-group">
                            <div class="col-md-6">
                                <input type="text" id="fname" class="form-control" placeholder="Your firstname">
                            </div>
                            <div class="col-md-6">
                                <input type="text" id="lname" class="form-control" placeholder="Your lastname">
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-md-12">
                                <input type="text" id="email" class="form-control" placeholder="Your email address">
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-md-12">
                                <input type="text" id="subject" class="form-control"
                                    placeholder="Your subject of this message">
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-md-12">
                                <textarea name="message" id="message" cols="30" rows="10" class="form-control"
                                    placeholder="Say something about us"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Send Message" class="btn btn-primary">
                        </div>

                    </form>
                </div>
            </div>

        </div>
    </div>
    

@endsection

@push('scripts')
@endpush