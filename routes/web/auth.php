<?php

use App\Http\Controllers\Web\Auth;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group( function () {

    Route::post('/logout', [\App\Http\Controllers\Auth\LoginController::class, 'destroy'])
        ->name('logout');

    Route::get('/email/verify/{id}/{hash}', \App\Http\Controllers\Auth\VerifyEmailController::class)
        ->middleware('signed')
        ->name('verification.verify');

    Route::get('/email/verify', \App\Http\Controllers\Auth\EmailVerificationController::class)
        ->name('verification.notice');

    Route::post('/email/verification-notification', \App\Http\Controllers\Auth\EmailVerificationNotificationController::class)
        ->name('verification.send');

});

Route::middleware('guest')->group( function () {

    Route::get('/login', [\App\Http\Controllers\Auth\LoginController::class, 'create'])
        ->name('login');
    Route::post('/login', [\App\Http\Controllers\Auth\LoginController::class, 'store']);

    Route::get('/register', [\App\Http\Controllers\Auth\RegisterController::class, 'create'])
        ->name('register');
    Route::post('/register', [\App\Http\Controllers\Auth\RegisterController::class, 'store']);

    Route::get('/forgot-password', [\App\Http\Controllers\Auth\ForgotPasswordController::class, 'create'])
        ->name('password.request');
    Route::post('/forgot-password', [\App\Http\Controllers\Auth\ForgotPasswordController::class, 'store'])
        ->name('password.email');

    Route::get('/reset-password', [\App\Http\Controllers\Auth\ResetPasswordController::class, 'create'])
        ->name('password.reset');
    Route::post('/reset-password', [\App\Http\Controllers\Auth\ResetPasswordController::class, 'store'])
        ->name('password.update');

});
