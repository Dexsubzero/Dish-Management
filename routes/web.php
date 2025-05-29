<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;

// Public Routes
Route::get('/', [DashboardController::class, 'index'])->name('dashboard.welcome');

Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'store']);

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'authenticate']);

// Protected Routes (Requires auth and role 0)
Route::middleware(['auth', 'is_role: 0'])->group(function () {

    // Dashboard Routes
    Route::get('/home', [DashboardController::class, 'home'])->name('dashboard.home');

    // Directory Routes
    Route::prefix('directory')->group(function () {
        Route::get('/contacts', [DashboardController::class, 'contacts'])->name('directory.contacts');
        Route::get('/menu', [DashboardController::class, 'menu'])->name('directory.menu');
        Route::get('/services', [DashboardController::class, 'services'])->name('directory.services');
        Route::get('/about', [DashboardController::class, 'about'])->name('directory.about');
        Route::get('/cart', [DashboardController::class, 'cart'])->name('directory.cart');
        Route::get('/checkout', [DashboardController::class, 'checkout'])->name('directory.checkout');
    });

    // Logout
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});
