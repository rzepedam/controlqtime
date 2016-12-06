<?php

namespace Controlqtime\Providers;

use Illuminate\Support\ServiceProvider;

class BackendServiceProvider extends ServiceProvider
{
    public function register()
    {
	    $this->app->bind(
		    'Controlqtime\Core\Contracts\AccessControlRepoInterface',
		    'Controlqtime\Core\Repositories\AccessControlRepo'
	    );
	
	    // Interface with class. Not content Repo
	    $this->app->bind(
		    'Controlqtime\Core\Contracts\ActivateVehicleInterface',
		    'Controlqtime\Core\Entities\ActivateVehicle'
	    );
	
	    $this->app->bind(
		    'Controlqtime\Core\Contracts\AddressRepoInterface',
		    'Controlqtime\Core\Repositories\AddressRepo'
	    );
        
        $this->app->bind(
            'Controlqtime\Core\Contracts\CertificationRepoInterface',
            'Controlqtime\Core\Repositories\CertificationRepo'
        );
	
	    $this->app->bind(
		    'Controlqtime\Core\Contracts\CheckVehicleFormRepoInterface',
		    'Controlqtime\Core\Repositories\CheckVehicleFormRepo'
	    );

		$this->app->bind(
			'Controlqtime\Core\Contracts\ContactEmployeeRepoInterface',
			'Controlqtime\Core\Repositories\ContactEmployeeRepo'
		);
	
	    $this->app->bind(
		    'Controlqtime\Core\Contracts\DailyAssistanceRepoInterface',
		    'Controlqtime\Core\Repositories\DailyAssistanceRepo'
	    );
	    
		$this->app->bind(
			'Controlqtime\Core\Contracts\DateDocumentationVehicleRepoInterface',
			'Controlqtime\Core\Repositories\DateDocumentationVehicleRepo'
		);

        $this->app->bind(
            'Controlqtime\Core\Contracts\DegreeRepoInterface',
            'Controlqtime\Core\Repositories\DegreeRepo'
        );
	
	    $this->app->bind(
		    'Controlqtime\Core\Contracts\DetailAddressCompanyRepoInterface',
		    'Controlqtime\Core\Repositories\DetailAddressCompanyRepo'
	    );
	    
	    $this->app->bind(
		    'Controlqtime\Core\Contracts\DetailAddressLegalEmployeeRepoInterface',
		    'Controlqtime\Core\Repositories\DetailAddressLegalEmployeeRepo'
	    );
	    
	    $this->app->bind(
		    'Controlqtime\Core\Contracts\DetailBusesRepoInterface',
		    'Controlqtime\Core\Repositories\DetailBusesRepo'
	    );
	
	    $this->app->bind(
		    'Controlqtime\Core\Contracts\DetailCollegeStudyRepoInterface',
		    'Controlqtime\Core\Repositories\DetailCollegeStudyRepo'
	    );
	    
	    $this->app->bind(
		    'Controlqtime\Core\Contracts\DetailSchoolStudyRepoInterface',
		    'Controlqtime\Core\Repositories\DetailSchoolStudyRepo'
	    );
	
	    $this->app->bind(
		    'Controlqtime\Core\Contracts\DetailTechnicalStudyRepoInterface',
		    'Controlqtime\Core\Repositories\DetailTechnicalStudyRepo'
	    );

		$this->app->bind(
			'Controlqtime\Core\Contracts\DetailVehicleRepoInterface',
			'Controlqtime\Core\Repositories\DetailVehicleRepo'
		);

        $this->app->bind(
            'Controlqtime\Core\Contracts\DisabilityRepoInterface',
            'Controlqtime\Core\Repositories\DisabilityRepo'
        );

        $this->app->bind(
            'Controlqtime\Core\Contracts\DiseaseRepoInterface',
            'Controlqtime\Core\Repositories\DiseaseRepo'
        );

        $this->app->bind(
            'Controlqtime\Core\Contracts\EngineCubicRepoInterface',
            'Controlqtime\Core\Repositories\EngineCubicRepo'
        );

        $this->app->bind(
            'Controlqtime\Core\Contracts\ExamRepoInterface',
            'Controlqtime\Core\Repositories\ExamRepo'
        );

        $this->app->bind(
            'Controlqtime\Core\Contracts\FamilyRelationshipRepoInterface',
            'Controlqtime\Core\Repositories\FamilyRelationshipRepo'
        );

        $this->app->bind(
            'Controlqtime\Core\Contracts\FamilyResponsabilityRepoInterface',
            'Controlqtime\Core\Repositories\FamilyResponsabilityRepo'
        );

        $this->app->bind(
            'Controlqtime\Core\Contracts\GenderRepoInterface',
            'Controlqtime\Core\Repositories\GenderRepo'
        );

		$this->app->bind(
			'Controlqtime\Core\Contracts\LegalRepresentativeRepoInterface',
			'Controlqtime\Core\Repositories\LegalRepresentativeRepo'
		);
	
	    $this->app->bind(
		    'Controlqtime\Core\Contracts\MasterFormPieceVehicleRepoInterface',
		    'Controlqtime\Core\Repositories\MasterFormPieceVehicleRepo'
	    );

        $this->app->bind(
            'Controlqtime\Core\Contracts\NationalityRepoInterface',
            'Controlqtime\Core\Repositories\NationalityRepo'
        );

        $this->app->bind(
            'Controlqtime\Core\Contracts\ProfessionalLicenseRepoInterface',
            'Controlqtime\Core\Repositories\ProfessionalLicenseRepo'
        );

        $this->app->bind(
            'Controlqtime\Core\Contracts\SpecialityRepoInterface',
            'Controlqtime\Core\Repositories\SpecialityRepo'
        );

		$this->app->bind(
			'Controlqtime\Core\Contracts\StatePieceVehicleRepoInterface',
			'Controlqtime\Core\Repositories\StatePieceVehicleRepo'
		);

        $this->app->bind(
            'Controlqtime\Core\Contracts\StateVehicleRepoInterface',
            'Controlqtime\Core\Repositories\StateVehicleRepo'
        );

        $this->app->bind(
            'Controlqtime\Core\Contracts\StudyRepoInterface',
            'Controlqtime\Core\Repositories\StudyRepo'
        );

        $this->app->bind(
            'Controlqtime\Core\Contracts\SubsidiaryRepoInterface',
            'Controlqtime\Core\Repositories\SubsidiaryRepo'
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
		    'Controlqtime\Core\Contracts\UserRepoInterface',
		    'Controlqtime\Core\Repositories\UserRepo'
	    );

        $this->app->bind(
            'Controlqtime\Core\Contracts\VehicleRepoInterface',
            'Controlqtime\Core\Repositories\VehicleRepo'
        );

        $this->app->bind(
            'Controlqtime\Core\Contracts\WeightRepoInterface',
            'Controlqtime\Core\Repositories\WeightRepo'
        );
    }
}