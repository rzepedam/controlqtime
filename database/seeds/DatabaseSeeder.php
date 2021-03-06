<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
	public function run()
	{
		// Others
		$this->call(DeviceTableSeeder::class);
		$this->call(PeriodEveryEightHourTableSeeder::class);

		// Maintainers tables
		$this->call(CountryTableSeeder::class);
		$this->call(CityTableSeeder::class);
		$this->call(DegreeTableSeeder::class);
		$this->call(ForecastTableSeeder::class);
		$this->call(MutualityTableSeeder::class);
		$this->call(NationalityTableSeeder::class);
		$this->call(PensionTableSeeder::class);
		$this->call(PositionTableSeeder::class);
		$this->call(ProfessionTableSeeder::class);
		$this->call(RelationshipTableSeeder::class);
		$this->call(TypeCertificationTableSeeder::class);
		$this->call(TypeDisabilityTableSeeder::class);
		$this->call(TypeDiseaseTableSeeder::class);
		$this->call(TypeExamTableSeeder::class);
		$this->call(TypeInstitutionTableSeeder::class);
		$this->call(InstitutionTableSeeder::class);
		$this->call(TypeProfessionalLicenseTableSeeder::class);
		$this->call(TypeSpecialityTableSeeder::class);
		$this->call(RegionTableSeeder::class);
		$this->call(ProvinceTableSeeder::class);
		$this->call(CommuneTableSeeder::class);
		$this->call(WeightTableSeeder::class);
		$this->call(EngineCubicTableSeeder::class);
		$this->call(TypeVehicleTableSeeder::class);
		$this->call(TrademarkTableSeeder::class);
		$this->call(ModelVehicleTableSeeder::class);
		$this->call(TerminalTableSeeder::class);
		$this->call(AreaTableSeeder::class);
		$this->call(FuelTableSeeder::class);
		$this->call(TypeCompanyTableSeeder::class);
		$this->call(StateVehicleTableSeeder::class);
		$this->call(DayTripTableSeeder::class);
		$this->call(TypeContractTableSeeder::class);
		$this->call(MaritalStatusTableSeeder::class);
		$this->call(LaborUnionTableSeeder::class);
		$this->call(PieceVehicleTableSeeder::class);
		$this->call(StatePieceVehicleTableSeeder::class);
		$this->call(TermAndObligatoryTableSeeder::class);
		$this->call(TypeVisitTableSeeder::class);
		// $this->call(VisitTableSeeder::class);

		// Importants tables
		$this->call(CompanyTableSeeder::class);
		$this->call(EmployeeTableSeeder::class);
		$this->call(ContractTableSeeder::class);
		$this->call(ImageTableSeeder::class);
		$this->call(LegalRepresentativeTableSeeder::class);
		$this->call(UserTableSeeder::class);
		$this->call(AddressTableSeeder::class);
		$this->call(DetailAddressCompanyTableSeeder::class);
		$this->call(DetailAddressLegalEmployeeTableSeeder::class);
		$this->call(AccessControlApiTableSeeder::class);

		if ( config('app.env') === 'local' )
		{
			$this->call(DailyAssistanceApiTableSeeder::class);
		}
		$this->call(MasterFormPieceVehicleTableSeeder::class);
	}
}
