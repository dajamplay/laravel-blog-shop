<?php

use App\Http\Controllers\Web\Auth\LoginUserController;
use App\Http\Controllers\Web\Auth\RegisterUserController;
use Illuminate\Support\Facades\Route;

Route::middleware("auth")->group( function () {

    Route::post('/logout', [LoginUserController::class, 'logout'])->name('logout');

    Route::get('/dashboard', function () {
        return 'Is auth user... Dashboard...';
    });

});

Route::middleware("guest")->group( function () {

    Route::get('/login', [LoginUserController::class, 'create'])->name('login');

    Route::post('/login', [LoginUserController::class, 'store']);

    Route::get('/register', [RegisterUserController::class, 'create'])->name('register');

    Route::post('/register', [RegisterUserController::class, 'store']);

});
