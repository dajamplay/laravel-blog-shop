<?php

use App\Http\Controllers\Web\Admin;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')
    ->name('admin.')
    ->middleware([
        'auth',
        'verified',
    ])
    ->group( function () {

    Route::get('/', [\App\Http\Controllers\Admin\AdminController::class, 'index'])->name('index');

    Route::resource('users', \App\Http\Controllers\Admin\UserController::class);

});
