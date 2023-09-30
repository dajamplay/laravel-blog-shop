<?php

namespace app\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function showRegisterForm()
    {
        return view('auth.register');
    }

    public function login(Request $request)
    {
        $data = $request->validate([
            'email' => ['required', 'string', 'max:100', 'email'],
            'password' => ['required', 'string', 'min:3'],
        ]);

        if(auth("web")->attempt($data)) {
            return redirect(route("home"));
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

    public function register(Request $request)
    {
        $data = $request->validate([
            'first_name' => ['required', 'string', 'max:50'],
            'last_name' => ['required', 'string', 'max:50'],
            'email' => ['required', 'string', 'max:100', 'email', 'unique:users,email'],
            'password' => ['required', 'string', 'min:3', 'confirmed'],
            "birthday" => ['nullable', 'string', 'date'] // 2021-10-09/09-10-2021 12:30:00
        ]);

        $user = User::create([
            "email" => $data["email"],
            "password" => $data["password"],
            "first_name" => $data["first_name"],
            "last_name" => $data["last_name"],
            "birthday" => isset($data["birthday"]) ? strtotime($data["birthday"]) : null
        ]);

        if($user) {
            auth("web")->login($user);
        }

        return redirect(route("home"));
    }



}
