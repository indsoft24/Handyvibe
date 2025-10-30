<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Vendor\DashboardController as VendorDashboardController;
use App\Http\Controllers\Vendor\ServiceController as VendorServiceController;
use App\Http\Controllers\Vendor\CustomerController as VendorCustomerController;
use App\Http\Controllers\Vendor\ProfileController as VendorProfileController;

// Vendor protected routes
Route::prefix('vendor')->name('vendor.')->middleware(['web', 'auth', 'vendor'])->group(function () {
    Route::get('/', [VendorDashboardController::class, 'index'])->name('dashboard');

    // Services
    Route::resource('services', VendorServiceController::class);

    // Customers & Inquiries
    Route::get('/customers', [VendorCustomerController::class, 'index'])->name('customers.index');
    Route::get('/inquiries', [VendorCustomerController::class, 'inquiries'])->name('inquiries.index');

    // Profile
    Route::get('/profile', [VendorProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/profile', [VendorProfileController::class, 'update'])->name('profile.update');
});


