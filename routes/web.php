<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Web\Public;
use App\Http\Controllers\Web\Dashboard;


require_once base_path('routes/web/auth.php');

Route::middleware('auth')->group( function () {

    Route::get('/dashboard', [Dashboard\DashboardController::class, 'index'])->middleware('verified');

});

Route::get('/', [Public\PublicController::class, 'home'])->name('home');
