<?php

use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\userController;
use Illuminate\Support\Facades\Route;

// Public Routes
Route::get('/', function () {
    $productController = new ProductController();
    $featuredProducts = $productController->getFeaturedProducts(6);
    return view('home', compact('featuredProducts'));
})->name('home');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::get('/services', [ServiceController::class, 'index'])->name('services');

Route::get('/service/{slug}', [ServiceController::class, 'show'])->name('service.show');

Route::get('/products', [ProductController::class, 'index'])->name('product');
Route::get('/product/{product}', [ProductController::class, 'show'])->name('product.show');

// Authentication Routes
Route::get('/register', [userController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [userController::class, 'sendRegistrationOtp'])->name('otp.send.registration');
Route::get('/login', [userController::class, 'showLoginForm'])->name('login');
Route::post('/login', [userController::class, 'sendLoginOtp'])->name('otp.send.login');
Route::post('/logout', [userController::class, 'logout'])->name('logout');

// OTP Verification Routes
Route::get('/otp/verify', [userController::class, 'showOtpVerification'])->name('otp.verify');
Route::post('/otp/verify/registration', [userController::class, 'verifyRegistrationOtp'])->name('otp.verify.registration');
Route::post('/otp/verify/login', [userController::class, 'verifyLoginOtp'])->name('otp.verify.login');
Route::post('/otp/resend', [userController::class, 'resendOtp'])->name('otp.resend');

// Lead Capture Route
Route::post('/leads', [App\Http\Controllers\LeadController::class, 'store'])->name('leads.store');
