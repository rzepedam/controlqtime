<?php

namespace Controlqtime\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

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
            'Controlqtime\Listeners\UpdateLastLoggedAt',
        ],
        'Controlqtime\Events\UserMessageSend' => [
            'Controlqtime\Listeners\SendEmailUser',
        ],
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
