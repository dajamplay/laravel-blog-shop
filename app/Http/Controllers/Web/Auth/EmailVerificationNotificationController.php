<?php

namespace App\Http\Controllers\Web\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class EmailVerificationNotificationController extends Controller
{
    public function __invoke(Request $request) : RedirectResponse
    {
        if ($request->user()->hasVerifiedEmail()) {
            return redirect()->intended(\App\Providers\RouteServiceProvider::HOME);
        }

        $request->user()->sendEmailVerificationNotification();

        return back()->with('status', __('Ссылка для подтверждения почты была отправлена'));
    }
}
