<?php

use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\userController;
use Illuminate\Support\Facades\Route;

// Public Routes
Route::get('/', function () {
    $productController = new ProductController();
    $featuredProducts = $productController->getFeaturedProducts(6);
    return view('home', compact('featuredProducts'));
})->name('home');

Route::get('/about', [AboutController::class, 'index'])->name('about');

Route::get('/contact', [ContactController::class, 'index'])->name('contact');
// Legal pages
Route::view('/privacy-policy', 'legal.privacy')->name('privacy');
Route::view('/terms-and-conditions', 'legal.terms')->name('terms');
Route::view('/disclaimer', 'legal.disclaimer')->name('disclaimer');

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

// Authenticated user profile (non-vendor)
Route::middleware(['web', 'auth'])->group(function () {
    Route::get('/profile', [userController::class, 'editProfile'])->name('profile.edit');
    Route::post('/profile', [userController::class, 'updateProfile'])->name('profile.update');

    // Cart
    Route::get('/cart', [App\Http\Controllers\CartController::class, 'index'])->name('cart.index');
    Route::post('/cart/product/{product}', [App\Http\Controllers\CartController::class, 'addProduct'])->name('cart.add.product');
    Route::post('/cart/service/{service}', [App\Http\Controllers\CartController::class, 'addService'])->name('cart.add.service');
    Route::post('/cart/product/{product}/update', [App\Http\Controllers\CartController::class, 'updateProduct'])->name('cart.update.product');
    Route::delete('/cart/product/{product}', [App\Http\Controllers\CartController::class, 'removeProduct'])->name('cart.remove.product');
    Route::delete('/cart/service/{service}', [App\Http\Controllers\CartController::class, 'removeService'])->name('cart.remove.service');
    Route::delete('/cart/clear', [App\Http\Controllers\CartController::class, 'clear'])->name('cart.clear');

    // Checkout
    Route::get('/checkout', [App\Http\Controllers\CheckoutController::class, 'show'])->name('checkout.show');
    Route::post('/checkout/address', [App\Http\Controllers\CheckoutController::class, 'addAddress'])->name('checkout.address.add');
    Route::post('/checkout/place', [App\Http\Controllers\CheckoutController::class, 'place'])->name('checkout.place');
    Route::post('/checkout/payment', [App\Http\Controllers\CheckoutController::class, 'payment'])->name('checkout.payment');
    Route::post('/checkout/payment/confirm', [App\Http\Controllers\CheckoutController::class, 'confirmPayment'])->name('checkout.payment.confirm');

    // Addresses
    Route::get('/addresses', [App\Http\Controllers\AddressController::class, 'index'])->name('user.addresses');
    Route::post('/addresses', [App\Http\Controllers\AddressController::class, 'store'])->name('user.addresses.store');
    Route::post('/addresses/{address}', [App\Http\Controllers\AddressController::class, 'update'])->name('user.addresses.update');
    Route::delete('/addresses/{address}', [App\Http\Controllers\AddressController::class, 'destroy'])->name('user.addresses.destroy');

    // User dashboard
    Route::get('/account', [App\Http\Controllers\User\DashboardController::class, 'index'])->name('user.dashboard');
    Route::get('/account/orders', [App\Http\Controllers\User\OrderController::class, 'index'])->name('user.orders');
    Route::get('/account/orders/{order}', [App\Http\Controllers\User\OrderController::class, 'show'])->name('user.orders.show');
});

// OTP Verification Routes
Route::get('/otp/verify', [userController::class, 'showOtpVerification'])->name('otp.verify');
Route::post('/otp/verify/registration', [userController::class, 'verifyRegistrationOtp'])->name('otp.verify.registration');
Route::post('/otp/verify/login', [userController::class, 'verifyLoginOtp'])->name('otp.verify.login');
Route::post('/otp/resend', [userController::class, 'resendOtp'])->name('otp.resend');

// Lead Capture Route
Route::post('/leads', [App\Http\Controllers\LeadController::class, 'store'])->name('leads.store');
