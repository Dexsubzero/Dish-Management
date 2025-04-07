<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;

Route::get('/contacts', [DashboardController::class, 'contacts'])->name('directory.contacts');

Route::get('/menu', [DashboardController::class, 'menu'])->name('directory.menu');

Route::get('/services', [DashboardController::class, 'services'])->name('directory.services');

Route::get('/', [DashboardController::class, 'index'])->name('dashboard.welcome');

Route::get('/register', [AuthController::class, 'register'])->name('register');

Route::post('/register', [AuthController::class, 'store']);

Route::get('/login', [AuthController::class, 'login'])->name('login');

Route::post('/login', [AuthController::class, 'authenticate']);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

