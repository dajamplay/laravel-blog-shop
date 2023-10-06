<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Web\Main;
use App\Http\Controllers\Web\Dashboard;


require_once base_path('routes/web/auth.php');

Route::middleware('auth')->group( function () {

    Route::get('/dashboard', [Dashboard\DashboardController::class, 'index'])->middleware('verified');

});

Route::get('/', [Main\MainController::class, 'home'])->name('home');
