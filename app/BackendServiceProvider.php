<?php

namespace Controlqtime;

use Illuminate\Support\ServiceProvider;

class BackendServiceProvider extends ServiceProvider
{

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            'Controlqtime\Core\Contracts\ProfessionRepoInterface',
            'Controlqtime\Core\Repositories\ProfessionRepo'
        );
    }
}