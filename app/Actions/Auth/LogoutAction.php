<?php

namespace App\Actions\Auth;

use Illuminate\Contracts\Session\Session;

class LogoutAction
{
    public function handle(Session $session) : void
    {
        auth("web")->logout();

        $session->invalidate();

        $session->regenerateToken();
    }
}
