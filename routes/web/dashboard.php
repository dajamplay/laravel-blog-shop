<?php

use App\Http\Controllers\Web\Dashboard;
use Illuminate\Support\Facades\Route;

Route::prefix('dashboard')
    ->name('dashboard.')
    ->middleware([
        'auth',
        'verified',
    ])
    ->group( function () {

    Route::get('/', [Dashboard\DashboardController::class, 'index'])->name('index');

    Route::resource('users', Dashboard\User\DashboardUserController::class);

});
