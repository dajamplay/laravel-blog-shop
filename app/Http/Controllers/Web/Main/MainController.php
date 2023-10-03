<?php

namespace App\Http\Controllers\Web\Main;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;

class MainController extends Controller
{
    public function home() : View
    {
        return view('main.home');
    }
}
