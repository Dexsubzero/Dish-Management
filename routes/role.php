<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminManagerController;

Route::middleware(['auth', 'is_role: 1,2'])->group(function () {
    Route::get('/adminmanager/dashboard', [AdminManagerController::class, 'role'])->name('adminmanager.dashboard');
});