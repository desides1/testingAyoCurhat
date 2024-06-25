<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\User\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [DashboardController::class, 'index'])->middleware('auth')->name('dashboard');

Route::prefix('auth')->group(function () {
    // Login
    Route::prefix('login')->group(function () {
        Route::get('', [LoginController::class, 'index'])->middleware('guest')->name('login');
        Route::post('', [LoginController::class, 'login'])->middleware('guest');
    });

    // Logout
    Route::get('logout', [LoginController::class, 'logout'])->middleware('auth')->name('logout');
});

Route::middleware('auth')->group(function () {
    Route::get('emergency-call', [DashboardController::class, 'emergencyCall'])->middleware('can:emergency_call_access')->name('emergency_call');

    Route::prefix('users')->middleware('can:read-users')->group(function () {
        Route::get('', [UserController::class, 'index'])->name('users');
        Route::get('{user}/delete', [UserController::class, 'destroy'])->middleware('can:delete-users')->name('users.delete');
        // Route buat edit
        // Route buat create
        // Route buat delete
    });
});
