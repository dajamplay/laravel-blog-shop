<?php

namespace App\Http\Controllers\Web\Auth;

use App\Actions\Auth\RegisterUserAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Web\Admin\StoreUserRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class RegisterController extends Controller
{
    public function create() : View
    {
        return view('auth.register');
    }

    public function store(
        StoreUserRequest $request,
        RegisterUserAction $action
    ) : RedirectResponse
    {
        $action->handle($request->validated());

        return redirect(RouteServiceProvider::HOME);
    }
}
