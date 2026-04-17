<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\InquiryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\User\ContactController;
use Illuminate\Support\Facades\Route;


// Route::get('/welcome', function () {
//     return view('welcome');
// });

// Public route for the home page
Route::get('/', [HomeController::class, 'index'])->name('home');

// Admin routes
Route::middleware(['auth', 'verified'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        // Dashboard route
        Route::get(('/dashboard'), [DashboardController::class, 'index'])->name('dashboard');

        // Profile management routes
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

        // Resource routes for settings and inquiries
        Route::resource('settings', SettingsController::class);
        Route::resource('inquiries', InquiryController::class);
    });

// Contact form route
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

require __DIR__ . '/auth.php';
