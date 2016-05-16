<?php

namespace Controlqtime\Providers;

use Illuminate\Support\ServiceProvider;

class BackendServiceProvider extends ServiceProvider
{
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
            'Controlqtime\Core\Contracts\CityRepoInterface',
            'Controlqtime\Core\Repositories\CityRepo'
        );

        $this->app->bind(
            'Controlqtime\Core\Contracts\CommuneRepoInterface',
            'Controlqtime\Core\Repositories\CommuneRepo'
        );

        $this->app->bind(
            'Controlqtime\Core\Contracts\CountryRepoInterface',
            'Controlqtime\Core\Repositories\CountryRepo'
        );

        $this->app->bind(
            'Controlqtime\Core\Contracts\CompanyRepoInterface',
            'Controlqtime\Core\Repositories\CompanyRepo'
        );

        $this->app->bind(
            'Controlqtime\Core\Contracts\DegreeRepoInterface',
            'Controlqtime\Core\Repositories\DegreeRepo'
        );

        $this->app->bind(
            'Controlqtime\Core\Contracts\EmployeeRepoInterface',
            'Controlqtime\Core\Repositories\EmployeeRepo'
        );

        $this->app->bind(
            'Controlqtime\Core\Contracts\ForecastRepoInterface',
            'Controlqtime\Core\Repositories\ForecastRepo'
        );

        $this->app->bind(
            'Controlqtime\Core\Contracts\FuelRepoInterface',
            'Controlqtime\Core\Repositories\FuelRepo'
        );

        $this->app->bind(
            'Controlqtime\Core\Contracts\GenderRepoInterface',
            'Controlqtime\Core\Repositories\GenderRepo'
        );

        $this->app->bind(
            'Controlqtime\Core\Contracts\ImageCirculationPermitVehicleRepoInterface',
            'Controlqtime\Core\Repositories\ImageCirculationPermitVehicleRepo'
        );
        
        $this->app->bind(
            'Controlqtime\Core\Contracts\ImageObligatoryInsuranceVehicleRepoInterface',
            'Controlqtime\Core\Repositories\ImageObligatoryInsuranceVehicleRepo'
        );

        $this->app->bind(
            'Controlqtime\Core\Contracts\ImagePadronVehicleRepoInterface',
            'Controlqtime\Core\Repositories\ImagePadronVehicleRepo'
        );

        $this->app->bind(
            'Controlqtime\Core\Contracts\ImagePatentCompanyRepoInterface',
            'Controlqtime\Core\Repositories\ImagePatentCompanyRepo'
        );

        $this->app->bind(
            'Controlqtime\Core\Contracts\ImagePatentVehicleRepoInterface',
            'Controlqtime\Core\Repositories\ImagePatentVehicleRepo'
        );

        $this->app->bind(
            'Controlqtime\Core\Contracts\ImageRolCompanyRepoInterface',
            'Controlqtime\Core\Repositories\ImageRolCompanyRepo'
        );

        $this->app->bind(
            'Controlqtime\Core\Contracts\InstitutionRepoInterface',
            'Controlqtime\Core\Repositories\InstitutionRepo'
        );

        $this->app->bind(
            'Controlqtime\Core\Contracts\LegalRepresentativeRepoInterface',
            'Controlqtime\Core\Repositories\LegalRepresentativeRepo'
        );

        $this->app->bind(
            'Controlqtime\Core\Contracts\ModelVehicleRepoInterface',
            'Controlqtime\Core\Repositories\ModelVehicleRepo'
        );

        $this->app->bind(
            'Controlqtime\Core\Contracts\MutualityRepoInterface',
            'Controlqtime\Core\Repositories\MutualityRepo'
        );

        $this->app->bind(
            'Controlqtime\Core\Contracts\NationalityRepoInterface',
            'Controlqtime\Core\Repositories\NationalityRepo'
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
            'Controlqtime\Core\Contracts\ProvinceRepoInterface',
            'Controlqtime\Core\Repositories\ProvinceRepo'
        );

        $this->app->bind(
            'Controlqtime\Core\Contracts\RegionRepoInterface',
            'Controlqtime\Core\Repositories\RegionRepo'
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
            'Controlqtime\Core\Contracts\RouteRepoInterface',
            'Controlqtime\Core\Repositories\RouteRepo'
        );

        $this->app->bind(
            'Controlqtime\Core\Contracts\SubsidiaryRepoInterface',
            'Controlqtime\Core\Repositories\SubsidiaryRepo'
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
            'Controlqtime\Core\Contracts\TypeCompanyRepoInterface',
            'Controlqtime\Core\Repositories\TypeCompanyRepo'
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

        $this->app->bind(
            'Controlqtime\Core\Contracts\VehicleRepoInterface',
            'Controlqtime\Core\Repositories\VehicleRepo'
        );
    }
}