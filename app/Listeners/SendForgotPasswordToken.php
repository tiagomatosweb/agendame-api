<?php

namespace App\Listeners;

use App\Mail\PasswordResetTokenMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendForgotPasswordToken implements ShouldQueue
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(object $event): void
    {
        $user = $event->user;
        $token = $event->token;
        Mail::to($user->email)
            ->send(new PasswordResetTokenMail($user, $token));
    }
}
