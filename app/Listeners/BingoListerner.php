<?php

namespace App\Listeners;

use App\Events\BingoEvent;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class BingoListerner
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {

    }


    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(BingoEvent $event)
    {
        dump($event->balance);
    }
}
