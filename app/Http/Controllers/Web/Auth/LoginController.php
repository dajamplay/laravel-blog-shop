<?php

namespace App\Http\Controllers\Web\Auth;

use App\Actions\Auth\LogoutAction;
use App\Actions\Auth\AuthAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Web\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class LoginController extends Controller
{
    public function create() : View
    {
        return view('auth.login');
    }

    /**
     * @throws ValidationException
     */
    public function store(LoginRequest $request, AuthAction $action) : RedirectResponse
    {
        $action->handle(
            $request->validated(),
            $request->boolean('remember'),
            $request->session(),
        );

        return redirect()->intended(RouteServiceProvider::HOME);
    }

    public function destroy(Request $request, LogoutAction $action) : RedirectResponse
    {
        $action->handle($request->session());

        return redirect(RouteServiceProvider::HOME);
    }
}
