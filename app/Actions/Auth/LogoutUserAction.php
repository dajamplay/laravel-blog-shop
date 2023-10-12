<?php

namespace App\Actions\Auth;

use Illuminate\Contracts\Session\Session;

class LogoutUserAction
{
    public function handle(Session $session) : void
    {
        auth("web")->logout();

        $session->invalidate();

        $session->regenerateToken();
    }
}
