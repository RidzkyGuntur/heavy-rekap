<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

// Basic route for the home page
Route::get('/', function () {
    return view('welcome');
});

// Authentication routes (example with Laravel Breeze)
Route::get('login', [AuthenticatedSessionController::class, 'create'])
    ->middleware('guest')
    ->name('login');

Route::post('login', [AuthenticatedSessionController::class, 'store'])
    ->middleware('guest');

Route::get('register', [RegisteredUserController::class, 'create'])
    ->middleware('guest')
    ->name('register');

Route::post('register', [RegisteredUserController::class, 'store'])
    ->middleware('guest');

// Password Reset Routes
Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
    ->middleware('guest')
    ->name('password.request');

Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
    ->middleware('guest')
    ->name('password.email');

Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
    ->middleware('guest')
    ->name('password.reset');

Route::post('reset-password', [NewPasswordController::class, 'store'])
    ->middleware('guest')
    ->name('password.update');
