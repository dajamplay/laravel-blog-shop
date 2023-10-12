<?php

namespace App\Notifications;

use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Facades\Lang;
use Illuminate\Auth\Notifications\VerifyEmail as VerifyEmailBase;

class VerifyEmail extends VerifyEmailBase
{
    protected function buildMailMessage($url)
    {
        return (new MailMessage)
            ->subject(Lang::get('Custom: Verify Email Address'))
            ->line(Lang::get('Custom: Please click the button below to verify your email address.'))
            ->action(Lang::get('Custom: Verify Email Address'), $url)
            ->line(Lang::get('Custom: If you did not create an account, no further action is required.'));
    }
}
