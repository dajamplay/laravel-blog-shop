<?php

namespace App\Services;

class AuthService
{
    public function generateAccessMessageForForm(): string
    {
        return __('Ссылка для подтверждения почты была отправлена');
    }
}
