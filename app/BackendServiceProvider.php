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

        $this->app->bind(
            'Controlqtime\Core\Contracts\BaseRepoInterface',
            'Controlqtime\Core\Repositories\DegreeRepo'
        );

        $this->app->bind(
            'Controlqtime\Core\Contracts\BaseRepoInterface',
            'Controlqtime\Core\Repositories\TypeProfessionalLicenseRepo'
        );

        $this->app->bind(
            'Controlqtime\Core\Contracts\BaseRepoInterface',
            'Controlqtime\Core\Repositories\TrademarkRepo'
        );

        $this->app->bind(
            'Controlqtime\Core\Contracts\BaseRepoInterface',
            'Controlqtime\Core\Repositories\MutualityRepo'
        );

        $this->app->bind(
            'Controlqtime\Core\Contracts\BaseRepoInterface',
            'Controlqtime\Core\Repositories\CountryRepo'
        );

        $this->app->bind(
            'Controlqtime\Core\Contracts\BaseRepoInterface',
            'Controlqtime\Core\Repositories\ForecastRepo'
        );

        $this->app->bind(
            'Controlqtime\Core\Contracts\BaseRepoInterface',
            'Controlqtime\Core\Repositories\RelationshipRepo'
        );

        $this->app->bind(
            'Controlqtime\Core\Contracts\BaseRepoInterface',
            'Controlqtime\Core\Repositories\TerminalRepo'
        );

        $this->app->bind(
            'Controlqtime\Core\Contracts\BaseRepoInterface',
            'Controlqtime\Core\Repositories\TypeInstitutionRepo'
        );

        $this->app->bind(
            'Controlqtime\Core\Contracts\BaseRepoInterface',
            'Controlqtime\Core\Repositories\TypeVehicleRepo'
        );

    }
}