<?php

namespace Controlqtime\Listeners;

use Illuminate\Log\Writer as Log;
use Illuminate\Auth\Events\Login;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class LogLastLogin
{
	/**
	 * @var Log
	 */
	protected $log;
	
	/**
	 * Create the event listener.
	 *
	 * @param Log $log
	 */
    public function __construct(Log $log)
    {
	    $this->log = $log;
    }

    /**
     * Handle the event.
     *
     * @param  Login  $event
     * @return void
     */
    public function handle(Login $event)
    {
        $this->log->info("El usuario {$event->user->email} ha iniciado sesión");
    }
}
