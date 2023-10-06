<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\Dashboard;

Route::middleware(['auth', 'verified'])->group( function () {

    Route::get('/dashboard', [Dashboard\DashboardController::class, 'index'])->name('dashboard.index');

});
