<?php

namespace App\Actions\Auth;

use Illuminate\Contracts\Session\Session;

class LogoutUserAction
{
    public function handle(Session $session, string $guard): void
    {
        auth($guard)->logout();

        $session->invalidate();

        $session->regenerateToken();
    }
}
