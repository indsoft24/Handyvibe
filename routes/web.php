<?php

use App\Http\Controllers\ServiceController;
use App\Http\Controllers\userController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\CalendarController;
use App\Http\Controllers\Admin\ImagesController;
use App\Http\Controllers\Admin\VideosController;
use App\Http\Controllers\Admin\TablesController;
use App\Http\Controllers\Admin\ChartsController;
use App\Http\Controllers\Admin\FormsController;
use App\Http\Controllers\Admin\ComponentsController;
use Illuminate\Support\Facades\Route;

// Public Routes
Route::get('/', function () {
    return view('home');
});

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::get('/services', function () {
    return view('services');
})->name('services');

Route::get('/service/{slug}', [ServiceController::class, 'show'])->name('service.show');

Route::get('/products', [ServiceController::class, 'index'])->name('product');

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

// Admin Routes
Route::prefix('admin')->name('admin.')->middleware(['web'])->group(function () {
    // Admin Dashboard
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    
    // Admin Authentication
    Route::get('/signin', [AdminController::class, 'signin'])->name('signin');
    Route::get('/signup', [AdminController::class, 'signup'])->name('signup');
    
    // Admin Profile
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    
    // Admin Calendar
    Route::get('/calendar', [CalendarController::class, 'index'])->name('calendar');
    
    // Admin Media
    Route::get('/images', [ImagesController::class, 'index'])->name('images');
    Route::get('/videos', [VideosController::class, 'index'])->name('videos');
    
    // Admin Tables
    Route::get('/tables', [TablesController::class, 'index'])->name('tables');
    
    // Admin Charts
    Route::get('/charts', [ChartsController::class, 'index'])->name('charts');
    Route::get('/charts/bar', [ChartsController::class, 'bar'])->name('charts.bar');
    Route::get('/charts/line', [ChartsController::class, 'line'])->name('charts.line');
    
    // Admin Forms
    Route::get('/forms', [FormsController::class, 'index'])->name('forms');
    
    // Admin Components
    Route::get('/components', [ComponentsController::class, 'index'])->name('components');
    Route::get('/components/alerts', [ComponentsController::class, 'alerts'])->name('components.alerts');
    Route::get('/components/avatars', [ComponentsController::class, 'avatars'])->name('components.avatars');
    Route::get('/components/badges', [ComponentsController::class, 'badges'])->name('components.badges');
    Route::get('/components/buttons', [ComponentsController::class, 'buttons'])->name('components.buttons');
    
    // Admin 404
    Route::get('/404', [AdminController::class, 'notFound'])->name('404');
});
