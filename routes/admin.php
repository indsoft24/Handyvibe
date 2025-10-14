<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register admin routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group and admin authentication middleware.
|
*/

// Admin Authentication Routes (Public)
Route::prefix('admin')->name('admin.')->middleware('web')->group(function () {
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

    // Services Management
    Route::resource('services', App\Http\Controllers\Admin\ServiceController::class);
    Route::post('/services/{service}/toggle-status', [App\Http\Controllers\Admin\ServiceController::class, 'toggleStatus'])->name('services.toggle-status');
    Route::post('/services/{service}/toggle-featured', [App\Http\Controllers\Admin\ServiceController::class, 'toggleFeatured'])->name('services.toggle-featured');
    Route::delete('/services/{service}/gallery/{imageIndex}', [App\Http\Controllers\Admin\ServiceController::class, 'deleteGalleryImage'])->name('services.delete-gallery-image');

    // Leads Management
    Route::resource('leads', App\Http\Controllers\Admin\LeadController::class);
    Route::post('/leads/{lead}/update-status', [App\Http\Controllers\Admin\LeadController::class, 'updateStatus'])->name('leads.update-status');
    Route::post('/leads/{lead}/update-priority', [App\Http\Controllers\Admin\LeadController::class, 'updatePriority'])->name('leads.update-priority');
    Route::post('/leads/{lead}/assign', [App\Http\Controllers\Admin\LeadController::class, 'assign'])->name('leads.assign');
    Route::post('/leads/{lead}/add-notes', [App\Http\Controllers\Admin\LeadController::class, 'addNotes'])->name('leads.add-notes');

    // Notifications Management
    Route::get('/notifications', [App\Http\Controllers\Admin\NotificationController::class, 'getNotifications'])->name('notifications');
    Route::get('/notifications/stats', [App\Http\Controllers\Admin\NotificationController::class, 'getNotificationStats'])->name('notifications.stats');
    Route::post('/notifications/mark-read', [App\Http\Controllers\Admin\NotificationController::class, 'markAsRead'])->name('notifications.mark-read');

    // User Management Routes
    Route::get('users/stats', [App\Http\Controllers\Admin\UserController::class, 'getStats'])->name('users.stats');
    Route::resource('users', App\Http\Controllers\Admin\UserController::class)->except(['create', 'store']);
    Route::post('/users/{user}/toggle-status', [App\Http\Controllers\Admin\UserController::class, 'toggleStatus'])->name('users.toggle-status');
    Route::post('/users/{user}/verify-email', [App\Http\Controllers\Admin\UserController::class, 'verifyEmail'])->name('users.verify-email');
    Route::post('/users/{user}/unverify-email', [App\Http\Controllers\Admin\UserController::class, 'unverifyEmail'])->name('users.unverify-email');
    Route::post('/users/{user}/reset-password', [App\Http\Controllers\Admin\UserController::class, 'resetPassword'])->name('users.reset-password');

    // Settings Management
    Route::prefix('settings')->name('settings.')->group(function () {
        Route::get('/', [App\Http\Controllers\Admin\SettingsController::class, 'index'])->name('index');

        // Page Content Management
        Route::prefix('pages')->name('pages.')->group(function () {
            Route::get('/', [App\Http\Controllers\Admin\SettingsController::class, 'pages'])->name('index');
            Route::post('/update', [App\Http\Controllers\Admin\SettingsController::class, 'updatePages'])->name('update');
        });

        // Banner Management
        Route::prefix('banners')->name('banners.')->group(function () {
            Route::get('/', [App\Http\Controllers\Admin\SettingsController::class, 'banners'])->name('index');
            Route::post('/update', [App\Http\Controllers\Admin\SettingsController::class, 'updateBanners'])->name('update');
            Route::delete('/{type}', [App\Http\Controllers\Admin\SettingsController::class, 'deleteBanner'])->name('delete');
        });
    });

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
