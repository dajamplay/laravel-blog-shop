<?php

namespace App\Http\Controllers\Web\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Web\Auth\LoginUserRequest;
use Illuminate\View\View;

class LoginUserController extends Controller
{
    public function create() : View
    {
        return view('auth.login');
    }

    public function store(LoginUserRequest $request)
    {
        $data = $request->validated();

        if(auth("web")->attempt($data)) {
            return 'Вход выполнен успешно';
        }

        return redirect(route("login"))->withErrors([
            "email" => __("Неверный логин или пароль.")
        ]);
    }

    public function logout()
    {
        auth("web")->logout();
        return redirect(route("login"));
    }
}
