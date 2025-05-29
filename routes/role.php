<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminManagerController;
use App\Http\Controllers\DishController;
use App\Http\Controllers\ManagerController;

Route::middleware(['auth', 'is_role: 1,2'])->group(function () {

    // Admin/Manager Dashboards
    Route::prefix('adminmanager')->group(function () {
        Route::get('/dashboard', [AdminManagerController::class, 'admin'])->name('adminmanager.dashboard');
        Route::get('/mgr-dashboard', [AdminManagerController::class, 'manager'])->name('adminmanager.mgr-dashboard');
    });

    // Manager Routes
    Route::prefix('manager')->group(function () {
        Route::get('/products', [ManagerController::class, 'products'])->name('manager.products');
        Route::get('/orders', [ManagerController::class, 'orders'])->name('manager.orders');
    });

    // Dish Management Routes (CRUD)
    Route::prefix('dishes')->name('dishes.')->group(function () {
        Route::get('/', [DishController::class, 'index'])->name('index');
        Route::get('/create', [DishController::class, 'create'])->name('create');
        Route::post('/', [DishController::class, 'store'])->name('store');
        Route::get('/{id}', [DishController::class, 'show'])->name('show');
        Route::get('/{id}/edit', [DishController::class, 'edit'])->name('edit');
        Route::patch('/{id}', [DishController::class, 'update'])->name('update');
        Route::delete('/{id}', [DishController::class, 'destroy'])->name('destroy');
    });

});
