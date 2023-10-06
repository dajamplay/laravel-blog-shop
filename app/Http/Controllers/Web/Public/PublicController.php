<?php

namespace App\Http\Controllers\Web\Public;

use App\Http\Controllers\Controller;
use Illuminate\View\View;

class PublicController extends Controller
{
    public function home() : View
    {
        return view('public.index');
    }
}
