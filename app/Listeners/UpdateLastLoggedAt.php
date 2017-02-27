<?php

namespace Controlqtime\Listeners;

use Carbon\Carbon;
use Illuminate\Auth\Events\Login;

class UpdateLastLoggedAt
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
     *
     * @param Login $event
     *
     * @return void
     */
    public function handle(Login $event)
    {
        $event->user->last_logged_at = Carbon::now();
        $event->user->timestamps = false;
        $event->user->save();
    }
}
