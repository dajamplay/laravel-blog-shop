<?php

namespace App\Actions\Auth;

use Illuminate\Validation\ValidationException;

class LoginStoreAction
{
    /**
     * @throws ValidationException
     */
    public function handle($credentials, $remember) : void
    {
        if(!auth("web")->attempt($credentials, $remember)) {
            throw ValidationException::withMessages([
                'email' => trans('auth.failed')
            ]);
        }
    }
}
