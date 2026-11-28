<?php

use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\IndividualProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('landing');
});

// Registration routes
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');

Route::post('/register', [RegisterController::class, 'register'])->name('register.store');

// Login routes
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');

Route::post('/login', [LoginController::class, 'login'])->name('login.store');

// Logout route
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Forgot Password routes
Route::get('/forgot-password', [ForgotPasswordController::class, 'showForgotPasswordForm'])
    ->name('password.request');

Route::post('/forgot-password', [ForgotPasswordController::class, 'sendResetLink'])
    ->name('password.email');

// Reset Password routes
Route::get('/reset-password/{token}', [ResetPasswordController::class, 'showResetPasswordForm'])
    ->name('password.reset');

Route::post('/reset-password', [ResetPasswordController::class, 'resetPassword'])
    ->name('password.update');

// Individual Profile Routes

Route::middleware(['auth', 'account.type:individual'])->group(function () {
    Route::get('/profile', [IndividualProfileController::class, 'show'])
        ->name('profile.show');

    Route::get('/profile/edit', [IndividualProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::put('/profile', [IndividualProfileController::class, 'update'])
        ->name('profile.update');
});
