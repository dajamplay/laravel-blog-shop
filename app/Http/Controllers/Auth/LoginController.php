<?php

namespace App\Http\Controllers\Auth;

use App\Actions\Auth\AuthUserAction;
use App\Actions\Auth\LogoutUserAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class LoginController extends Controller
{
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * @throws ValidationException
     */
    public function store(LoginRequest $request, AuthUserAction $action): RedirectResponse
    {
        $action->handle(
            $request->validated(),
            $request->boolean('remember'),
            $request->session(),
            'web'
        );

        return redirect()->intended(RouteServiceProvider::HOME);
    }

    public function destroy(Request $request, LogoutUserAction $action): RedirectResponse
    {
        $action->handle(
            $request->session(),
            'web'
        );

        return redirect(RouteServiceProvider::HOME);
    }
}
