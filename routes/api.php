<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// API routes for Menu
Route::get('/menu/index', [\App\Http\Controllers\MenuController::class, 'index'])->name('menu.index');
Route::post('/menu/store', [\App\Http\Controllers\MenuController::class, 'store'])->name('menu.store');
Route::get('/menu/show/{id}', [\App\Http\Controllers\MenuController::class, 'show'])->name('menu.show');
Route::post('/menu/update/{id}', [\App\Http\Controllers\MenuController::class, 'update'])->name('menu.update');
Route::delete('/menu/delete/{id}', [\App\Http\Controllers\MenuController::class, 'destroy'])->name('menu.destroy');

// Route::prefix('menu')->group(function () {
//     Route::get('/menu/index', [\App\Http\Controllers\MenuController::class, 'index'])->name('menu.index');
// Route::post('/menu/store', [\App\Http\Controllers\MenuController::class, 'store'])->name('menu.store');
    // Route::get('/{id}', [\App\Http\Controllers\MenuController::class, 'show'])->name('menu.show');
    // Route::put('/{id}', [\App\Http\Controllers\MenuController::class, 'update'])->name('menu.update');
    // Route::delete('/{id}', [\App\Http\Controllers\MenuController::class, 'destroy'])->name('menu.destroy');
// });

// API routes for Customer
Route::get('/customer/index', [\App\Http\Controllers\CustomerController::class, 'index'])->name('customer.index');
Route::post('/customer/store', [\App\Http\Controllers\CustomerController::class, 'store'])->name('customer.store');
Route::get('/customer/show/{id}', [\App\Http\Controllers\CustomerController::class, 'show'])->name('customer.show');
Route::post('/customer/update/{id}', [\App\Http\Controllers\CustomerController::class, 'update'])->name('customer.update');
Route::delete('/customer/delete/{id}', [\App\Http\Controllers\CustomerController::class, 'destroy'])->name('customer.destroy');

// Route::prefix('customer')->group(function () {
    // Route::get('/customer/index', [\App\Http\Controllers\CustomerController::class, 'index'])->name('customer.index');
    // Route::post('/customer/store', [\App\Http\Controllers\CustomerController::class, 'store'])->name('customer.store');
    // Route::get('/{id}', [\App\Http\Controllers\CustomerController::class, 'show'])->name('customer.show');
    // Route::put('/{id}', [\App\Http\Controllers\CustomerController::class, 'update'])->name('customer.update');
    // Route::delete('/{id}', [\App\Http\Controllers\CustomerController::class, 'destroy'])->name('customer.destroy');