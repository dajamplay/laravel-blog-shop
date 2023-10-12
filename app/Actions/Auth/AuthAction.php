<?php

namespace App\Actions\Auth;

use Illuminate\Contracts\Session\Session;
use Illuminate\Validation\ValidationException;

class AuthAction
{
    /**
     * @throws ValidationException
     */
    public function handle(array $credentials, bool $remember, Session $session) : void
    {
        if(!auth("web")->attempt($credentials, $remember)) {
            throw ValidationException::withMessages([
                'email' => trans('auth.failed')
            ]);
        }

        $session->regenerate();
    }
}
