<?php

namespace App\Http\Controllers\Web\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Web\Auth\ForgotPasswordRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Password;
use Illuminate\View\View;

class ForgotPasswordController extends Controller
{
    public function create() : View
    {
        return view('auth.forgot-password');
    }

    public function store(ForgotPasswordRequest $request) : RedirectResponse
    {
        $status = Password::sendResetLink(
            $request->validated()
        );

        if ($status === Password::RESET_LINK_SENT) {
            return back()->with('status', trans($status));
        }

        return back()
            ->withInput($request->only('email'))
            ->withErrors([
                'email' => trans($status)
            ]);
    }
}
