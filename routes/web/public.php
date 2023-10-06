<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\Public;

Route::get('/', [Public\PublicController::class, 'home'])->name('home');
