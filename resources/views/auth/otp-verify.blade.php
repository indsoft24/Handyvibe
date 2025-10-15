@extends('layouts.app')

@section('title', 'Verify OTP - Handyvibe')

@section('content')
    <div class="otp-hero">
        <div class="otp-overlay"></div>
        <div class="otp-cover text-center" data-stellar-background-ratio="0.5"
            style="background-image: url({{ asset('images/img_bg_3.jpg') }});">
            <div class="otp-desc">
                <div class="container">
                    <div class="row justify-content-center align-items-center" style="min-height: 85vh;">
                        <div class="col-lg-12 mx-auto">
                            <div class="otp-panel">
                                <div class="otp-header">
                                    <h2>
                                        @if (session('type') === 'registration')
                                            Verify Registration
                                        @else
                                            Verify Login
                                        @endif
                                    </h2>
                                </div>
                                <div class="otp-body">
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

                                        <div class="form-group mb-4 position-relative">
                                            <label for="otp" class="form-label fw-bold">Enter OTP Code</label>
                                            <input type="text" class="form-control styled-input text-center" id="otp"
                                                name="otp" maxlength="6" pattern="[0-9]{6}" required autofocus
                                                style="font-size: 24px; letter-spacing: 5px; font-weight: bold;">
                                            <small class="text-muted">Enter the 6-digit code sent to your email</small>
                                        </div>

                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary btn-block otp-btn">
                                                @if (session('type') === 'registration')
                                                    Complete Registration
                                                @else
                                                    Complete Login
                                                @endif
                                            </button>
                                        </div>

                                        <div class="text-center mt-4">
                                            <p class="mb-2">Didn't receive the OTP?</p>
                                            <form method="POST" action="{{ route('otp.resend') }}"
                                                style="display: inline;">
                                                @csrf
                                                <input type="hidden" name="email" value="{{ session('email') }}">
                                                <input type="hidden" name="type" value="{{ session('type') }}">
                                                <button type="submit" class="btn btn-link text-primary fw-bold text-decoration-none">
                                                    Resend OTP
                                                </button>
                                            </form>
                                        </div>

                                        <div class="text-center mt-3">
                                            <a href="{{ session('type') === 'registration' ? route('register') : route('login') }}"
                                                class="text-muted text-decoration-none">
                                                ← Back to
                                                {{ session('type') === 'registration' ? 'Registration' : 'Login' }}
                                            </a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!-- otp-panel -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Custom OTP Verification Form Styles -->
    <style>
        .otp-hero {
            min-height: 100vh;
            position: relative;
            background: #f7f9fc;
        }
        .otp-overlay {
            position: absolute; inset: 0;
            background: linear-gradient(115deg, #dde7f5cc 60%, #fafcffcc 100%);
            z-index: 1;
        }
        .otp-cover {
            position: relative;
            z-index: 2;
            min-height: 100vh;
            background-size: cover;
            background-position: center;
            display: flex; align-items: center; justify-content: center;
        }
        .otp-desc { position: relative; z-index: 2; }

        .otp-panel {
            background: #ffffff;
            padding: 36px 28px 32px 28px;
            border-radius: 16px;
            box-shadow: 0 4px 24px rgba(98,119,164,0.16);
            max-width: 440px;
            margin: 0 auto;
            border: 1px solid #e6ebf4;
        }
        .otp-header h2 {
            font-weight: bold;
            color: #293b6b;
            margin-bottom: 20px;
            letter-spacing: 0.5px;
        }
        .otp-body { position: relative; }

        .styled-input {
            padding-left: 38px;
            padding-right: 12px;
            border-radius: 8px;
            border: 1px solid #d5deef;
            box-shadow: none !important;
            font-size: 15px;
            transition: border-color .2s, box-shadow .2s;
            height: 44px;
            background: #f7faff;
        }
        .styled-input:focus {
            border-color: #007bff;
            background: #ffffff;
            outline: 0;
            box-shadow: 0 0 0 3px rgba(0,123,255,.1);
        }
        .form-label {
            font-size: 15px;
            margin-bottom: 6px;
            color: #405d9b;
            background: transparent;
        }
        .btn.otp-btn {
            display: block;
            width: 100%;
            background: linear-gradient(90deg,#007bff 85%, #355cec 100%);
            border: none;
            color: #fff !important;
            padding: 14px;
            font-size: 18px;
            border-radius: 8px;
            font-weight: 700;
            letter-spacing: 0.4px;
            box-shadow: 0 2px 12px #007bff20;
        }
        .btn.otp-btn:hover, .btn.otp-btn:focus {
            background: linear-gradient(90deg,#355cec 85%, #007bff 100%);
            color: #fff !important;
        }
        .alert {
            border-radius: 8px;
            margin-bottom: 20px;
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
