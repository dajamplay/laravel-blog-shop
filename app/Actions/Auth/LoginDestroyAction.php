<?php

namespace App\Actions\Auth;

class LoginDestroyAction
{
    public function handle() : void
    {
        auth("web")->logout();
    }
}
