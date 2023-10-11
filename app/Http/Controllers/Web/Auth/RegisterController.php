<?php

namespace App\Http\Controllers\Web\Auth;

use App\Actions\Auth\RegisterStoreAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Web\Auth\RegisterRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class RegisterController extends Controller
{
    public function create() : View
    {
        return view('auth.register');
    }

    public function store(RegisterRequest $request, RegisterStoreAction $action) : RedirectResponse
    {
        $action->handle($request->validated());

        return redirect(RouteServiceProvider::HOME);
    }
}
