<?php

use App\Http\Controllers\Web\Main;
use Illuminate\Support\Facades\Route;

require_once './web/auth.php';

Route::middleware('auth')->group( function () {

    Route::get('/dashboard', function () {
        return 'Is auth user... Dashboard...';
    })->middleware('verified');

});

Route::get('/', [Main\MainController::class, 'home'])->name('home');
