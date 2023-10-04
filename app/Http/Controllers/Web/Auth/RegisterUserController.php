<?php

namespace App\Http\Controllers\Web\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Web\Auth\RegisterUserRequest;
use App\Models\User;
use App\Providers\RouteServiceProvider;
//use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class RegisterUserController extends Controller
{
    public function create() : View
    {
        return view('auth.register');
    }

    public function store(RegisterUserRequest $request) : RedirectResponse
    {
        $data = $request->validated();

        $user = User::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        auth("web")->login($user);

        //event(new Registered($user));

        return redirect(RouteServiceProvider::HOME);
    }
}
