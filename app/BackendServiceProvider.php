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
            'Controlqtime\Core\Repositories\RoleRepo'
        );

        $this->app->bind(
            'Controlqtime\Core\Contracts\BaseRepoInterface',
            'Controlqtime\Core\Repositories\TypeCertificationRepo'
        );

        $this->app->bind(
            'Controlqtime\Core\Contracts\BaseRepoInterface',
            'Controlqtime\Core\Repositories\TypeDisabilityRepo'
        );

        $this->app->bind(
            'Controlqtime\Core\Contracts\BaseRepoInterface',
            'Controlqtime\Core\Repositories\TypeDiseaseRepo'
        );

        $this->app->bind(
            'Controlqtime\Core\Contracts\BaseRepoInterface',
            'Controlqtime\Core\Repositories\TypeSpecialityRepo'
        );

        $this->app->bind(
            'Controlqtime\Core\Contracts\BaseRepoInterface',
            'Controlqtime\Core\Repositories\TypeExamRepo'
        );

        $this->app->bind(
            'Controlqtime\Core\Contracts\BaseRepoInterface',
            'Controlqtime\Core\Repositories\PensionRepo'
        );

    }
}