<?php

namespace App\Http\Controllers\Web\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Web\Auth\LoginUserRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
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

    public function destroy(Request $request) : RedirectResponse
    {
        auth("web")->logout();

        //session id refresh
        $request->session()->invalidate();

        //csrf token refresh
        $request->session()->regenerateToken();

        return redirect(route('home'));
    }
}
