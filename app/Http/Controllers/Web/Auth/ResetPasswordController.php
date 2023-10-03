<?php

namespace App\Http\Controllers\Web\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Web\Auth\ResetPasswordUserRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\View\View;
use Illuminate\Support\Facades\Password;

class ResetPasswordController extends Controller
{
    public function create(Request $request) : View
    {
        return view('auth.reset-password', [
            'request' => $request
        ]);
    }

    public function store(ResetPasswordUserRequest $request) : RedirectResponse
    {
        $data = $request->validated();

        $status = Password::reset(
            $data,
            function ($user) use ($data) {
                $user->forceFill([
                    'password' => Hash::make($data['password']),
                    'remember_token' => Str::random(60)
                ])->save();
            }
        );

        if ($status === Password::PASSWORD_RESET) {
            return redirect()->route('login')->with('status', trans($status));
        }

        return back()->withInput($request->only('email'))
            ->withErrors(['email' => trans($status)]);
    }
}
