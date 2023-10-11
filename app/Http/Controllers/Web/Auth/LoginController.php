<?php

namespace App\Http\Controllers\Web\Auth;

use App\Actions\Auth\LoginDestroyAction;
use App\Actions\Auth\LoginStoreAction;
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
    public function store(LoginRequest $request, LoginStoreAction $action) : RedirectResponse
    {
        $action->handle($request->validated(), $request->boolean('remember'));

        $request->session()->regenerate();

        return redirect()->intended(RouteServiceProvider::HOME);
    }

    public function destroy(Request $request, LoginDestroyAction $action) : RedirectResponse
    {
        $action->handle();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect(RouteServiceProvider::HOME);
    }
}
