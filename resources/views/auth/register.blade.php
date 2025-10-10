@extends('layouts.app')

@section('title', 'Register - Handyvibe')

@section('content')
    <div class="fh5co-hero">
        <div class="fh5co-overlay"></div>
        <div class="fh5co-cover text-center" data-stellar-background-ratio="0.5"
            style="background-image: url({{ asset('images/img_bg_1.jpg') }});">
            <div class="desc animate-box">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 col-md-offset-3">
                            <div class="panel panel-default"
                                style="background: rgba(255,255,255,0.95); padding: 30px; border-radius: 10px; box-shadow: 0 10px 30px rgba(0,0,0,0.3);">
                                <div class="panel-heading">
                                    <h2 class="fh5co-heading" style="color: #333; margin-bottom: 30px;">Create Account</h2>
                                </div>
                                <div class="panel-body">
                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul class="mb-0">
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif

                                    @if (session('success'))
                                        <div class="alert alert-success">
                                            {{ session('success') }}
                                        </div>
                                    @endif

                                    <form method="POST" action="{{ route('otp.send.registration') }}">
                                        @csrf

                                        <div class="form-group">
                                            <label for="name" class="control-label">Full Name</label>
                                            <input type="text" class="form-control" id="name" name="name"
                                                value="{{ old('name') }}" required autofocus>
                                        </div>

                                        <div class="form-group">
                                            <label for="email" class="control-label">Email Address</label>
                                            <input type="email" class="form-control" id="email" name="email"
                                                value="{{ old('email') }}" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="mobile" class="control-label">Mobile Number
                                                <small>(Optional)</small></label>
                                            <input type="text" class="form-control" id="mobile" name="mobile"
                                                value="{{ old('mobile') }}" placeholder="Enter your mobile number">
                                        </div>

                                        <div class="form-group">
                                            <label for="password" class="control-label">Password</label>
                                            <input type="password" class="form-control" id="password" name="password"
                                                required>
                                        </div>

                                        <div class="form-group">
                                            <label for="password_confirmation" class="control-label">Confirm
                                                Password</label>
                                            <input type="password" class="form-control" id="password_confirmation"
                                                name="password_confirmation" required>
                                        </div>

                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary btn-block"
                                                style="background: #007bff; border: none; padding: 12px; font-size: 16px;">
                                                Send OTP
                                            </button>
                                        </div>

                                        <div class="text-center">
                                            <p>Already have an account? <a href="{{ route('login') }}"
                                                    style="color: #007bff;">Login here</a></p>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .fh5co-hero {
            min-height: 100vh;
            display: flex;
            align-items: center;
        }

        .panel {
            margin-top: 50px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-control {
            height: 45px;
            border-radius: 5px;
            border: 1px solid #ddd;
            padding: 10px 15px;
        }

        .form-control:focus {
            border-color: #007bff;
            box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, .25);
        }

        .alert {
            border-radius: 5px;
            margin-bottom: 20px;
        }

        .btn-primary:hover {
            background: #0056b3 !important;
        }
    </style>
@endsection
