<?php

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use Illuminate\Support\Facades\Route;

// Route::middleware('guest')->group(function () {
//     Route::middleware('guest')->group(function () {
//         Route::get('register', [RegisterController::class, 'create'])->name('register');
//         Route::post('register', [RegisterController::class, 'store']);
        
//         Route::get('login', [LoginController::class, 'create'])->name('login');
//         Route::post('login', [LoginController::class, 'store']);
//         Route::post('logout', [LogoutController::class, 'destroy'])->name('logout');

    
        // Remove or comment out these routes if you’re not implementing password reset
        // Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])->name('password.request');
        // Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])->name('password.email');
        // Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])->name('password.reset');
//         // Route::post('reset-password', [NewPasswordController::class, 'store'])->name('password.store');
//     });
    
// });
