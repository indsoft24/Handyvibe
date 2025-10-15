@extends('layouts.app')

@section('title', 'Login - Handyvibe')

@section('content')
    <div class="login-hero">
        <div class="login-overlay"></div>
        <div class="login-cover text-center" data-stellar-background-ratio="0.5"
            style="background-image: url({{ asset('images/img_bg_2.jpg') }});">
            <div class="login-desc">
                <div class="container">
                    <div class="row justify-content-center align-items-center" style="min-height: 85vh;">
                        <div class="col-lg-12 mx-auto">
                            <div class="login-panel">
                                <div class="login-header">
                                    <h2>Login to Your Account</h2>
                                </div>
                                <div class="login-body">
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

                                    <form method="POST" action="{{ route('otp.send.login') }}">
                                        @csrf

                                        <div class="form-group mb-4 position-relative">
                                            <label for="email" class="form-label fw-bold">Email Address</label>
                                            <input type="email" class="form-control styled-input" id="email" name="email"
                                                value="{{ old('email') }}" required autofocus
                                                placeholder="Enter your email address">
                                        </div>

                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary btn-block login-btn">
                                                Send OTP
                                            </button>
                                        </div>

                                        <div class="text-center mt-4">
                                            <p class="mb-0">Don't have an account? 
                                                <a href="{{ route('register') }}" class="text-primary fw-bold text-decoration-none">Register here</a>
                                            </p>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!-- login-panel -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Custom Login Form Styles -->
    <style>
        .login-hero {
            min-height: 100vh;
            position: relative;
            background: #f7f9fc;
        }
        .login-overlay {
            position: absolute; inset: 0;
            background: linear-gradient(115deg, #dde7f5cc 60%, #fafcffcc 100%);
            z-index: 1;
        }
        .login-cover {
            position: relative;
            z-index: 2;
            min-height: 100vh;
            background-size: cover;
            background-position: center;
            display: flex; align-items: center; justify-content: center;
        }
        .login-desc { position: relative; z-index: 2; }

        .login-panel {
            background: #ffffff;
            padding: 36px 28px 32px 28px;
            border-radius: 16px;
            box-shadow: 0 4px 24px rgba(98,119,164,0.16);
            max-width: 440px;
            margin: 0 auto;
            border: 1px solid #e6ebf4;
        }
        .login-header h2 {
            font-weight: bold;
            color: #293b6b;
            margin-bottom: 20px;
            letter-spacing: 0.5px;
        }
        .login-body { position: relative; }

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
        .btn.login-btn {
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
        .btn.login-btn:hover, .btn.login-btn:focus {
            background: linear-gradient(90deg,#355cec 85%, #007bff 100%);
            color: #fff !important;
        }
        .alert {
            border-radius: 8px;
            margin-bottom: 20px;
        }
    </style>
@endsection
