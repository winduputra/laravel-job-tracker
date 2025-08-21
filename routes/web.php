<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

// Redirect root ke login
Route::get('/', function () {
    return redirect()->route('login');
});

// Dashboard CRUD routes
Route::middleware(['auth', 'verified'])->group(function () {

    // Index dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard.index');

    // Store lamaran baru
    Route::post('/dashboard', [DashboardController::class, 'store'])
        ->name('dashboard.store');

    // Form edit lamaran
    Route::get('/dashboard/{lamaran}/edit', [DashboardController::class, 'edit'])
        ->name('dashboard.edit');

    // Update lamaran
    Route::put('/dashboard/{lamaran}', [DashboardController::class, 'update'])
        ->name('dashboard.update');

    // Delete lamaran
    Route::delete('/dashboard/{lamaran}', [DashboardController::class, 'destroy'])
        ->name('dashboard.destroy');
});
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


// Auth routes
require __DIR__.'/auth.php';
