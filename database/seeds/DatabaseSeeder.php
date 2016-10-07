<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
	    // Maintainers base
	    /*$this->call(CountryTableSeeder::class);
	    $this->call(CityTableSeeder::class);
	    $this->call(DegreeTableSeeder::class);
	    $this->call(ForecastTableSeeder::class);
	    $this->call(GenderTableSeeder::class);
	    $this->call(MutualityTableSeeder::class);
	    $this->call(NationalityTableSeeder::class);
	    $this->call(PensionTableSeeder::class);
	    $this->call(PositionTableSeeder::class);
	    $this->call(ProfessionTableSeeder::class);
	    $this->call(RelationshipTableSeeder::class);
	    $this->call(TypeCertificationTableSeeder::class);
	    $this->call(TypeDisabilityTableSeeder::class);
	    $this->call(TypeExamTableSeeder::class);
	    $this->call(TypeInstitutionTableSeeder::class);
	    $this->call(InstitutionTableSeeder::class);
	    $this->call(TypeProfessionalLicenseTableSeeder::class);
	    $this->call(TypeSpecialityTableSeeder::class);
	    $this->call(RegionTableSeeder::class);
	    $this->call(ProvinceTableSeeder::class);*/
	    
	    // Importants tables
		// $this->call(CompanyTableSeeder::class);
        $this->call(LegalRepresentativeTableSeeder::class);
	    $this->call(UserTableSeeder::class);
	    $this->call(EmployeeTableSeeder::class);
	    $this->call(AddressTableSeeder::class);
	    $this->call(AccessControlApiTableSeeder::class);
	    $this->call(MasterFormPieceVehicleTableSeeder::class);
	    
    }
}
