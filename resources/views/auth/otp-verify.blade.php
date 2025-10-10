@extends('layouts.app')

@section('title', 'Verify OTP - Handyvibe')

@section('content')
    <div class="fh5co-hero">
        <div class="fh5co-overlay"></div>
        <div class="fh5co-cover text-center" data-stellar-background-ratio="0.5"
            style="background-image: url({{ asset('images/img_bg_3.jpg') }});">
            <div class="desc animate-box">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 col-md-offset-3">
                            <div class="panel panel-default"
                                style="background: rgba(255,255,255,0.95); padding: 30px; border-radius: 10px; box-shadow: 0 10px 30px rgba(0,0,0,0.3);">
                                <div class="panel-heading">
                                    <h2 class="fh5co-heading" style="color: #333; margin-bottom: 30px;">
                                        @if (session('type') === 'registration')
                                            Verify Registration
                                        @else
                                            Verify Login
                                        @endif
                                    </h2>
                                </div>
                                <div class="panel-body">
                                    @if (session('success'))
                                        <div class="alert alert-success">
                                            {{ session('success') }}
                                        </div>
                                    @endif

                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul class="mb-0">
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif

                                    <div class="text-center mb-4">
                                        <i class="icon-envelope" style="font-size: 48px; color: #007bff;"></i>
                                        <p class="mt-3">We've sent a 6-digit OTP to:</p>
                                        <strong>{{ session('email') }}</strong>
                                    </div>

                                    <form method="POST"
                                        action="{{ session('type') === 'registration' ? route('otp.verify.registration') : route('otp.verify.login') }}">
                                        @csrf

                                        <input type="hidden" name="email" value="{{ session('email') }}">

                                        <div class="form-group">
                                            <label for="otp" class="control-label">Enter OTP Code</label>
                                            <input type="text" class="form-control text-center" id="otp"
                                                name="otp" maxlength="6" pattern="[0-9]{6}" required autofocus
                                                style="font-size: 24px; letter-spacing: 5px; font-weight: bold;">
                                            <small class="text-muted">Enter the 6-digit code sent to your email</small>
                                        </div>

                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary btn-block"
                                                style="background: #007bff; border: none; padding: 12px; font-size: 16px;">
                                                @if (session('type') === 'registration')
                                                    Complete Registration
                                                @else
                                                    Complete Login
                                                @endif
                                            </button>
                                        </div>

                                        <div class="text-center">
                                            <p>Didn't receive the OTP?</p>
                                            <form method="POST" action="{{ route('otp.resend') }}"
                                                style="display: inline;">
                                                @csrf
                                                <input type="hidden" name="email" value="{{ session('email') }}">
                                                <input type="hidden" name="type" value="{{ session('type') }}">
                                                <button type="submit" class="btn btn-link" style="color: #007bff;">
                                                    Resend OTP
                                                </button>
                                            </form>
                                        </div>

                                        <div class="text-center mt-3">
                                            <a href="{{ session('type') === 'registration' ? route('register') : route('login') }}"
                                                style="color: #6c757d;">
                                                ← Back to
                                                {{ session('type') === 'registration' ? 'Registration' : 'Login' }}
                                            </a>
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

        .btn-link:hover {
            text-decoration: underline;
        }
    </style>

    <script>
        // Auto-focus on OTP input and format
        document.addEventListener('DOMContentLoaded', function() {
            const otpInput = document.getElementById('otp');

            // Only allow numbers
            otpInput.addEventListener('input', function(e) {
                e.target.value = e.target.value.replace(/[^0-9]/g, '');
            });

            // Auto-submit when 6 digits are entered
            otpInput.addEventListener('input', function(e) {
                if (e.target.value.length === 6) {
                    // Small delay to show the complete OTP
                    setTimeout(() => {
                        e.target.form.submit();
                    }, 500);
                }
            });
        });
    </script>
@endsection
