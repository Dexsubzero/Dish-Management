<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\DishController;

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
    Route::get('/directory/checkout', [CartController::class, 'checkout'])->name('directory.checkout');
    Route::post('/checkout', [OrderController::class, 'store'])->name('checkout.store');
    Route::get('/home/{id}', [OrderController::class, 'userPurchase'])->name('dashboard.home');

    // Directory Routes
    Route::prefix('directory')->group(function () {
        Route::get('/contacts', [DashboardController::class, 'contacts'])->name('directory.contacts');
        Route::get('/menu', [DashboardController::class, 'menu'])->name('directory.menu');
        Route::get('/services', [DashboardController::class, 'services'])->name('directory.services');
        Route::get('/about', [DashboardController::class, 'about'])->name('directory.about');
    });

    // Logout
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    //

    Route::post('/dishes/import', [DishController::class, 'import'])->name('dishes.import');
    Route::get('/dishes/export', [DishController::class, 'export'])->name('dishes.export');
});
