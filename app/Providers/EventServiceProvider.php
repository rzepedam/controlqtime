<?php

namespace Controlqtime\Providers;

use Controlqtime\Events\AccessNotification;
use Controlqtime\Notifications\Assistance\Access;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        'Illuminate\Auth\Events\Login' => [
            'Controlqtime\Listeners\LogLastLogin',
            'Controlqtime\Listeners\UpdateLastLoggedAt'
        ],
	    AccessNotification::class => [
			Access::class
	    ]
    ];

    /**
     * Register any other events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();
    }
}
