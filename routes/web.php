<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\EmergencyCallController;
use App\Http\Controllers\ReportingController;
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
    // Panggilan Darurat
    Route::get('emergency-call', [EmergencyCallController::class, 'index'])->middleware('can:emergency_call_access')->name('emergency_call');

    // Pengaduan
    Route::prefix('pengaduan')->group(function () {
        Route::get('/all', [ReportingController::class, 'index'])->middleware('can:read_all_reportings')->name('reportings.all');
        Route::get('', [ReportingController::class, 'userReportingsIndex'])->middleware('can:read_reportings')->name('reportings.user');
        Route::get('/create', [ReportingController::class, 'create'])->middleware('can:create_reportings')->name('reportings.create');
        Route::post('/store', [ReportingController::class, 'store'])->middleware('can:create_reportings')->name('reportings.store');

        // Detail & Download
        Route::get('/show', [ReportingController::class, 'show'])->middleware('can:show_detail_reportings')->name('reportings.show');

        // Progress Pengaduan
        Route::get('/progress', [ReportingController::class, 'reportingProgressIndex'])->middleware('can:read__reporting_progress')->name('reportings.progress');
        Route::post('/progress/create', [ReportingController::class, 'reportingProgressStore'])->middleware('can:create_reporting_progress')->name('reportings.progress.create');
    });

    Route::prefix('users')->middleware('can:read-users')->group(function () {
        Route::get('', [UserController::class, 'index'])->name('users');
        Route::get('{user}/delete', [UserController::class, 'destroy'])->middleware('can:delete-users')->name('users.delete');
        // Route buat edit
        // Route buat create
        // Route buat delete
    });
});
