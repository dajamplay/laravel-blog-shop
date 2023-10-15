<?php

use App\Http\Controllers\Web\Public;
use Illuminate\Support\Facades\Route;

Route::get('/', [\App\Http\Controllers\Public\PublicController::class, 'index'])->name('public.index');
