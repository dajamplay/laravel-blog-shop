<?php

namespace App\Http\Controllers\Web\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Web\Auth\LoginUserRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class LoginUserController extends Controller
{
    public function create() : View
    {
        return view('auth.login');
    }

    /**
     * @throws ValidationException
     */
    public function store(LoginUserRequest $request) : RedirectResponse
    {
        $credentials = $request->validated();

        if(!auth("web")->attempt($credentials, $request->boolean('remember'))) {
            throw ValidationException::withMessages([
               'email' => trans('auth.failed')
            ]);
        }

        $request->session()->regenerate();

        return redirect()->intended(RouteServiceProvider::HOME);
    }

    public function logout() : RedirectResponse
    {
        auth("web")->logout();
        return redirect(route("login"));
    }
}
