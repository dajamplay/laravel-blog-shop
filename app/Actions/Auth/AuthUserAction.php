<?php

namespace App\Actions\Auth;

use Illuminate\Contracts\Session\Session;
use Illuminate\Validation\ValidationException;

class AuthUserAction
{
    /**
     * @throws ValidationException
     */
    public function handle(array $credentials, bool $remember, Session $session, string $guard): void
    {
        if (!auth($guard)->attempt($credentials, $remember)) {
            throw ValidationException::withMessages([
                'email' => trans('auth.failed')
            ]);
        }

        $session->regenerate();
    }
}
