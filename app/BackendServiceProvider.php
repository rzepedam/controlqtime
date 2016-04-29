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

        /*
         * Maintainers
         */

        $this->app->bind(
            'Controlqtime\Core\Contracts\BaseRepoInterface',
            'Controlqtime\Core\Repositories\ProfessionRepo'
        );

        $this->app->bind(
            'Controlqtime\Core\Contracts\BaseRepoInterface',
            'Controlqtime\Core\Repositories\RatingRepo'
        );
    }
}