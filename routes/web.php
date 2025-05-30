<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CartController;

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
    Route::get('/add-to-cart/{id}', [CartController::class, 'addToCart'])->name('cart.add');
    Route::get('/cart', [CartController::class, 'index'])->name('directory.cart');
    Route::delete('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');
    Route::match(['get', 'post'], '/checkout', [CartController::class, 'checkout'])->name('directory.checkout');

    // Directory Routes
    Route::prefix('directory')->group(function () {
        Route::get('/contacts', [DashboardController::class, 'contacts'])->name('directory.contacts');
        Route::get('/menu', [DashboardController::class, 'menu'])->name('directory.menu');
        Route::get('/services', [DashboardController::class, 'services'])->name('directory.services');
        Route::get('/about', [DashboardController::class, 'about'])->name('directory.about');
    });

    // Logout
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});
