@extends('layouts.app')

@section('title', 'Register - HandyVibe')

@section('content')
<div class="register-hero">
  <div class="register-overlay"></div>
  <div class="register-cover" data-stellar-background-ratio="0.5" style="background-image: url({{ asset('images/img_bg_1.jpg') }});">
    <div class="register-desc">
      <div class="container">
        <div class="row justify-content-center align-items-center" style="min-height: 85vh;">
          <div class="col-lg-12 mx-auto">
            <div class="register-panel">
              <div class="register-header">
                <h2>Create Account</h2>
              </div>
              <div class="register-body">
                @if ($errors->any())
                  <div class="alert alert-danger mb-3">
                    <ul class="mb-0">
                      @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                      @endforeach
                    </ul>
                  </div>
                @endif

                @if (session('success'))
                  <div class="alert alert-success mb-3">
                    {{ session('success') }}
                  </div>
                @endif

                <form method="POST" action="{{ route('otp.send.registration') }}" autocomplete="off">
                  @csrf

                  <div class="form-group mb-4 position-relative">
                    <label for="name" class="form-label fw-bold">Full Name</label>
                    <input type="text" class="form-control styled-input" id="name" name="name"
                      value="{{ old('name') }}" required autofocus placeholder="Enter your name">
                  </div>

                  <div class="form-group mb-4 position-relative">
                    <label for="email" class="form-label fw-bold">Email Address</label>
                    <input type="email" class="form-control styled-input" id="email" name="email"
                      value="{{ old('email') }}" required placeholder="Enter your email">
                  </div>

                  <div class="form-group mb-4 position-relative">
                    <label for="mobile" class="form-label fw-bold">Mobile Number <small class="text-muted ms-1">(Optional)</small></label>
                    <input type="text" class="form-control styled-input" id="mobile" name="mobile"
                      value="{{ old('mobile') }}" placeholder="Enter your mobile number">
                  </div>

                  <div class="form-group mb-4 position-relative">
                    <label for="password" class="form-label fw-bold">Password</label>
                    <input type="password" class="form-control styled-input" id="password" name="password"
                      required placeholder="Set password">
                  </div>

                  <div class="form-group mb-4 position-relative">
                    <label for="password_confirmation" class="form-label fw-bold">Confirm Password</label>
                    <input type="password" class="form-control styled-input" id="password_confirmation"
                      name="password_confirmation" required placeholder="Confirm password">
                  </div>

                  <button type="submit" class="btn btn-primary btn-block register-btn">Send OTP</button>

                  <div class="text-center mt-4">
                    <p class="mb-0">Already have an account?
                      <a href="{{ route('login') }}" class="text-primary fw-bold text-decoration-none">Login here</a>
                    </p>
                  </div>
                </form>
              </div>
            </div>
            <!-- register-panel -->
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Custom Register Form Styles -->
<style>
  .register-hero {
    min-height: 100vh;
    position: relative;
    background: #f7f9fc;
  }
  .register-overlay {
    position: absolute; inset: 0;
    background: linear-gradient(115deg, #dde7f5cc 60%, #fafcffcc 100%);
    z-index: 1;
  }
  .register-cover {
    position: relative;
    z-index: 2;
    min-height: 100vh;
    background-size: cover;
    background-position: center;
    display: flex; align-items: center; justify-content: center;
  }
  .register-desc { position: relative; z-index: 2; }

  .register-panel {
    background: rgba(255,255,255,0.95);
    padding: 36px 28px 32px 28px;
    border-radius: 16px;
    box-shadow: 0 4px 24px rgba(98,119,164,0.16);
    max-width: 440px;
    margin: 0 auto;
    border: 1px solid #e6ebf4;
  }
  .register-header h2 {
    font-weight: bold;
    color: #293b6b;
    margin-bottom: 20px;
    letter-spacing: 0.5px;
  }
  .register-body { position: relative; }

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
  .input-icon {
    position: absolute;
    left: 10px; top: 50%;
    transform: translateY(-50%);
    color: #aac2e7;
    font-size: 18px;
    pointer-events: none;
  }
  .form-label {
    font-size: 15px;
    margin-bottom: 6px;
    color: #405d9b;
    background: transparent;
  }
  .btn.register-btn {
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
  .btn.register-btn:hover, .btn.register-btn:focus {
    background: linear-gradient(90deg,#355cec 85%, #007bff 100%);
    color: #fff !important;
  }
</style>
<!-- FontAwesome Icons (CDN) -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
@endsection
