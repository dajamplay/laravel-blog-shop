<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\Public;

Route::get('/', [Public\PublicController::class, 'index'])->name('public.index');
