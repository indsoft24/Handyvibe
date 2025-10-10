<?php

use App\Http\Controllers\ServiceController;
use App\Http\Controllers\userController;
use Illuminate\Support\Facades\Route;

// Public Routes
Route::get('/', function () {
    return view('home');
})->name('home');

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

// Admin Authentication Routes (Public)
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/login', function () {
        return view('admin.signin');
    })->name('login');
    Route::post('/login', [App\Http\Controllers\Admin\AuthController::class, 'login'])->name('login.submit');
    Route::post('/logout', [App\Http\Controllers\Admin\AuthController::class, 'logout'])->name('logout');
});

// Admin Protected Routes
Route::prefix('admin')->name('admin.')->middleware(['web', 'admin'])->group(function () {
    // Dashboard
    Route::get('/', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');

    // Profile Management
    Route::get('/profile', [App\Http\Controllers\Admin\AuthController::class, 'profile'])->name('profile');
    Route::post('/profile', [App\Http\Controllers\Admin\AuthController::class, 'updateProfile'])->name('profile.update');

    // Categories Management
    Route::resource('categories', App\Http\Controllers\Admin\CategoryController::class);
    Route::post('/categories/{category}/toggle-status', [App\Http\Controllers\Admin\CategoryController::class, 'toggleStatus'])->name('categories.toggle-status');

    // Sub Categories Management
    Route::resource('sub-categories', App\Http\Controllers\Admin\SubCategoryController::class);
    Route::post('/sub-categories/{subCategory}/toggle-status', [App\Http\Controllers\Admin\SubCategoryController::class, 'toggleStatus'])->name('sub-categories.toggle-status');

    // Products Management
    Route::resource('products', App\Http\Controllers\Admin\ProductController::class);
    Route::post('/products/{product}/toggle-status', [App\Http\Controllers\Admin\ProductController::class, 'toggleStatus'])->name('products.toggle-status');
    Route::post('/products/{product}/toggle-featured', [App\Http\Controllers\Admin\ProductController::class, 'toggleFeatured'])->name('products.toggle-featured');

    // Additional Admin Routes
    Route::get('/calendar', function () {
        return view('admin.calendar');
    })->name('calendar');

    Route::get('/images', function () {
        return view('admin.images');
    })->name('images');

    Route::get('/videos', function () {
        return view('admin.videos');
    })->name('videos');

    Route::get('/tables', function () {
        return view('admin.tables');
    })->name('tables');

    Route::get('/charts', function () {
        return view('admin.charts');
    })->name('charts');

    Route::get('/charts/bar', function () {
        return view('admin.charts.bar');
    })->name('charts.bar');

    Route::get('/charts/line', function () {
        return view('admin.charts.line');
    })->name('charts.line');

    Route::get('/forms', function () {
        return view('admin.forms');
    })->name('forms');

    Route::get('/components', function () {
        return view('admin.components');
    })->name('components');

    Route::get('/components/alerts', function () {
        return view('admin.components.alerts');
    })->name('components.alerts');

    Route::get('/components/avatars', function () {
        return view('admin.components.avatars');
    })->name('components.avatars');

    Route::get('/components/badges', function () {
        return view('admin.components.badges');
    })->name('components.badges');

    Route::get('/components/buttons', function () {
        return view('admin.components.buttons');
    })->name('components.buttons');
});
