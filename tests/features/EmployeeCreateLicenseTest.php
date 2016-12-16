<?php

use Controlqtime\Core\Entities\TypeProfessionalLicense;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class EmployeeCreateLicenseTest extends TestCase
{
	use DatabaseTransactions;
	
	protected $typeProfessionalLicense;
	
	protected $sessionStep1;
	
	protected $sessionStep2;
	
	protected $sessionStep3;
	
	function setUp()
	{
		parent::setUp();
		$this->signIn();
		$this->typeProfessionalLicense = factory(TypeProfessionalLicense::class)->create();
		
		$this->sessionStep1 = [
			'male_surname'               => 'Candia',
			'female_surname'             => 'Parra',
			'first_name'                 => 'Marcelo',
			'second_name'                => 'Pedro',
			'rut'                        => '10.486.861-4',
			'birthday'                   => '11-06-1989',
			'nationality_id'             => $this->nationality->id,
			'is_male'                    => 'M',
			'marital_status_id'          => $this->maritalStatus->id,
			'forecast_id'                => $this->forecast->id,
			'pension_id'                 => $this->pension->id,
			'address'                    => 'Vicuña Mackenna 2209',
			'commune_id'                 => $this->commune->id,
			'phone1'                     => '+56988102910',
			'email_employee'             => 'marcelocandia@gmail.com',
			'count_contacts'             => 0,
			'count_family_relationships' => 0
		];
		
		$this->sessionStep2 = [
			'count_studies'        => 0,
			'count_certifications' => 0,
			'count_specialities'   => 0,
		];
		
		$this->sessionStep3 = [
			'count_disabilities'            => 0,
			'count_diseases'                => 0,
			'count_exams'                   => 0,
			'count_family_responsabilities' => 0
		];
		
		Session::put('step1', $this->sessionStep1);
		Session::put('email_employee', 'marcelocandia@gmail.com');
		Session::put('password', bcrypt('marcelocandia@gmail.com'));
	}
	
	function test_store_with_professional_license_employee()
	{
		$this->sessionStep2 += [
			'id_professional_license'      => [0],
			'type_professional_license_id' => [$this->typeProfessionalLicense->id],
			'emission_license'             => ['12-08-2014'],
			'expired_license'              => ['17-08-2019'],
			'is_donor0'                    => true,
			'detail_license'               => ['Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean m'],
			'count_professional_licenses'  => 1
		];
		
		Session::put('step2', $this->sessionStep2);
		
		$this->post('human-resources/employees', $this->sessionStep3)
			->seeInDatabase('professional_licenses', [
				'type_professional_license_id' => $this->typeProfessionalLicense->id,
				'emission_license'             => '2014-08-12',
				'expired_license'              => '2019-08-17',
				'is_donor'                     => true,
				'detail_license'               => 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean m',
				'deleted_at'                   => null
			]);
	}
	
	function test_store_with_multiple_professional_license_employee()
	{
		$typeLicensesA = factory(TypeProfessionalLicense::class)->create();
		$typeLicensesB = factory(TypeProfessionalLicense::class)->create();
		$typeLicensesC = factory(TypeProfessionalLicense::class)->create();
		
		$this->sessionStep2 += [
			'id_professional_license'      => [0, 0, 0],
			'type_professional_license_id' => [$typeLicensesA->id, $typeLicensesB->id, $typeLicensesC->id],
			'emission_license'             => ['12-08-2014', '11-05-2010', '27-11-2015'],
			'expired_license'              => ['17-08-2019', '09-03-2018', '10-10-2016'],
			'is_donor0'                    => true, false, false,
			'is_donor1'                    => false,
			'is_donor2'                    => false,
			'detail_license'               => ['Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean m', 'Aenean m', 'Aenean commodo ligula eget dolor.'],
			'count_professional_licenses'  => 3
		];
		
		Session::put('step2', $this->sessionStep2);
		
		$this->post('human-resources/employees', $this->sessionStep3)
			->seeInDatabase('professional_licenses', [
				'type_professional_license_id' => $typeLicensesA->id,
				'emission_license'             => '2014-08-12',
				'expired_license'              => '2019-08-17',
				'is_donor'                     => true,
				'detail_license'               => 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean m',
				'deleted_at'                   => null])
			->seeInDatabase('professional_licenses', [
				'type_professional_license_id' => $typeLicensesB->id,
				'emission_license'             => '2010-05-11',
				'expired_license'              => '2018-03-09',
				'is_donor'                     => false,
				'detail_license'               => 'Aenean m',
				'deleted_at'                   => null])
			->seeInDatabase('professional_licenses', [
				'type_professional_license_id' => $typeLicensesC->id,
				'emission_license'             => '2015-11-27',
				'expired_license'              => '2016-10-10',
				'is_donor'                     => false,
				'detail_license'               => 'Aenean commodo ligula eget dolor.',
				'deleted_at'                   => null
			]);
	}
}
