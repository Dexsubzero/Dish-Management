<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

Route::get('/', [DashboardController::class, 'index'])->name('dashboard.welcome');

Route::middleware(['auth'])->group(function () {
Route::get('/home', [DashboardController::class, 'home'])->name('dashboard.home');

Route::get('/contacts', [DashboardController::class, 'contacts'])->name('directory.contacts');

Route::get('/menu', [DashboardController::class, 'menu'])->name('directory.menu');

Route::get('/services', [DashboardController::class, 'services'])->name('directory.services');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

Route::get('/register', [AuthController::class, 'register'])->name('register');

Route::post('/register', [AuthController::class, 'store']);

Route::get('/login', [AuthController::class, 'login'])->name('login');

Route::post('/login', [AuthController::class, 'authenticate']);
