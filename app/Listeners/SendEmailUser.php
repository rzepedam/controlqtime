<?php

namespace Controlqtime\Listeners;

use Controlqtime\Events\UserMessageSend;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Controlqtime\Notifications\EmployeeWasRegistered;

class SendEmailUser implements ShouldQueue
{
	use InteractsWithQueue;
	
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
     * @param  UserMessageSend  $event
     * @return void
     */
    public function handle(UserMessageSend $event)
    {
	    $event->user->notify(new EmployeeWasRegistered($event->user));
    }
}
