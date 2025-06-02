<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminManagerController;
use App\Http\Controllers\DishController;
use App\Http\Controllers\ManagerController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\OrderController;

Route::get('/dishes/show/{id}', [DishController::class, 'show'])->name('dishes.show');

Route::middleware(['auth', 'is_role: 2'])->group(function () {
    Route::get('/dashboard', [AdminManagerController::class, 'admin'])->name('adminmanager.dashboard');
    Route::get('/transactions/content', [AdminController::class, 'loadContent'])->name('transactions.content');
});

Route::middleware(['auth', 'is_role: 1,2'])->group(function () {
    Route::get('/mgr-dashboard', [AdminManagerController::class, 'manager'])->name('adminmanager.mgr-dashboard');

    // Manager Routes
    Route::prefix('manager')->group(function () {
        Route::get('/products', [ManagerController::class, 'products'])->name('manager.products');
        Route::get('/orders', [ManagerController::class, 'orders'])->name('manager.orders');
    });

    // Dish Management Routes (CRUD)
    Route::get('/dishes', [DishController::class, 'index'])->name('dishes.index');
    Route::get('/dishes/create', [DishController::class, 'create'])->name('dishes.create');
    Route::post('/dishes', [DishController::class, 'store'])->name('dishes.store');
    Route::get('/dishes/{id}/edit', [DishController::class, 'edit'])->name('dishes.edit');
    Route::patch('/dishes/{id}', [DishController::class, 'update'])->name('dishes.update');
    Route::delete('/dishes/{id}', [DishController::class, 'destroy'])->name('dishes.destroy');

    Route::get('/orders/index', [OrderController::class, 'managerOrders'])->name('orders.index');

    Route::get('/export-users', [UserController::class, 'exportUsers'])->name('users.export');

});
