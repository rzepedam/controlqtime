<?php

namespace Controlqtime\Core\Providers;

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
            'Controlqtime\Core\Contracts\AreaRepoInterface',
            'Controlqtime\Core\Repositories\AreaRepo'
        );

        $this->app->bind(
            'Controlqtime\Core\Contracts\CountryRepoInterface',
            'Controlqtime\Core\Repositories\CountryRepo'
        );

        $this->app->bind(
            'Controlqtime\Core\Contracts\DegreeRepoInterface',
            'Controlqtime\Core\Repositories\DegreeRepo'
        );

        $this->app->bind(
            'Controlqtime\Core\Contracts\ForecastRepoInterface',
            'Controlqtime\Core\Repositories\ForecastRepo'
        );

        $this->app->bind(
            'Controlqtime\Core\Contracts\MutualityRepoInterface',
            'Controlqtime\Core\Repositories\MutualityRepo'
        );

        $this->app->bind(
            'Controlqtime\Core\Contracts\PensionRepoInterface',
            'Controlqtime\Core\Repositories\PensionRepo'
        );

        $this->app->bind(
            'Controlqtime\Core\Contracts\ProfessionRepoInterface',
            'Controlqtime\Core\Repositories\ProfessionRepo'
        );

        $this->app->bind(
            'Controlqtime\Core\Contracts\RelationshipRepoInterface',
            'Controlqtime\Core\Repositories\RelationshipRepo'
        );

        $this->app->bind(
            'Controlqtime\Core\Contracts\RoleRepoInterface',
            'Controlqtime\Core\Repositories\RoleRepo'
        );

        $this->app->bind(
            'Controlqtime\Core\Contracts\TerminalRepoInterface',
            'Controlqtime\Core\Repositories\TerminalRepo'
        );

        $this->app->bind(
            'Controlqtime\Core\Contracts\TrademarkRepoInterface',
            'Controlqtime\Core\Repositories\TrademarkRepo'
        );

        $this->app->bind(
            'Controlqtime\Core\Contracts\TypeCertificationRepoInterface',
            'Controlqtime\Core\Repositories\TypeCertificationRepo'
        );

        $this->app->bind(
            'Controlqtime\Core\Contracts\TypeDisabilityRepoInterface',
            'Controlqtime\Core\Repositories\TypeDisabilityRepo'
        );

        $this->app->bind(
            'Controlqtime\Core\Contracts\TypeDiseaseRepoInterface',
            'Controlqtime\Core\Repositories\TypeDiseaseRepo'
        );

        $this->app->bind(
            'Controlqtime\Core\Contracts\TypeExamRepoInterface',
            'Controlqtime\Core\Repositories\TypeExamRepo'
        );

        $this->app->bind(
            'Controlqtime\Core\Contracts\TypeInstitutionRepoInterface',
            'Controlqtime\Core\Repositories\TypeInstitutionRepo'
        );

        $this->app->bind(
            'Controlqtime\Core\Contracts\TypeProfessionalLicenseRepoInterface',
            'Controlqtime\Core\Repositories\TypeProfessionalLicenseRepo'
        );

        $this->app->bind(
            'Controlqtime\Core\Contracts\TypeSpecialityRepoInterface',
            'Controlqtime\Core\Repositories\TypeSpecialityRepo'
        );

        $this->app->bind(
            'Controlqtime\Core\Contracts\TypeVehicleRepoInterface',
            'Controlqtime\Core\Repositories\TypeVehicleRepo'
        );
    }
}