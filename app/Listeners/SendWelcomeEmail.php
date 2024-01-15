<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendWelcomeEmail
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        dd('listener');
    }

    /**
     * Handle the event.
     */
    public function handle(object $event): void
    {
        //
    }
}
