<?php

use App\Http\Controllers\Web\Auth;
use App\Http\Controllers\Web\Main;

use Illuminate\Support\Facades\Route;

Route::middleware("auth")->group( function () {

    Route::post('/logout', [Auth\LoginUserController::class, 'destroy'])->name('logout');

    Route::get('/dashboard', function () {
        return 'Is auth user... Dashboard...';
    });

});

Route::middleware("guest")->group( function () {

    Route::get('/login', [Auth\LoginUserController::class, 'create'])->name('login');
    Route::post('/login', [Auth\LoginUserController::class, 'store']);

    Route::get('/register', [Auth\RegisterUserController::class, 'create'])->name('register');
    Route::post('/register', [Auth\RegisterUserController::class, 'store']);

    Route::get('/forgot-password', [Auth\ForgotPasswordController::class, 'create'])->name('password.request');
    Route::post('/forgot-password', [Auth\ForgotPasswordController::class, 'store'])->name('password.email');

    Route::get('/reset-password', [Auth\ResetPasswordController::class, 'create'])->name('password.reset');
    Route::post('/reset-password', [Auth\ResetPasswordController::class, 'store'])->name('password.update');

});

Route::get('/', [Main\MainController::class, 'home'])->name('home');
