<?php

use Controlqtime\Core\Entities\TypeProfessionalLicense;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class EmployeeEditLicenseTest extends TestCase
{
	use DatabaseTransactions;
	
	protected $typeProfessionalLicense;
	
	protected $step1_update;
	
	protected $step2_update;
	
	protected $step3_update;
	
	protected $license;
	
	function setUp()
	{
		parent::setUp();
		$this->signIn();
		
		$this->typeProfessionalLicense = factory(TypeProfessionalLicense::class)->create();
		
		$this->step1_update = [
			'male_surname'               => 'Candia',
			'female_surname'             => 'Parra',
			'first_name'                 => 'Marcelo',
			'second_name'                => 'Pedro',
			'rut'                        => '10.486.861-4',
			'birthday'                   => '11-06-1989',
			'nationality_id'             => $this->nationality->id,
			'is_male'                    => 'M',
			'marital_status_id'          => $this->maritalStatus->id,
			'address'                    => 'Vicuña Mackenna 2209',
			'commune_id'                 => $this->commune->id,
			'phone1'                     => '+56988102910',
			'email_employee'             => 'marcelocandia@gmail.com',
			'count_contacts'             => 0,
			'count_family_relationships' => 0
		];
		
		$this->step2_update = [
			'count_studies'        => 0,
			'count_certifications' => 0,
			'count_specialities'   => 0
		];
		
		$this->step3_update = [
			'count_disabilities'            => 0,
			'count_diseases'                => 0,
			'count_exams'                   => 0,
			'count_family_responsabilities' => 0
		];
		
		Session::put('step1_update', $this->step1_update);
		Session::put('email_employee', 'marcelocandia@gmail.com');
		Session::put('password', bcrypt('marcelocandia@gmail.com'));
		
		$this->license = $this->employee->professionalLicenses()->create([
			'type_professional_license_id' => $this->typeProfessionalLicense->id,
			'emission_license'             => '08-10-2000',
			'expired_license'              => '08-10-2007',
			'is_donor'                     => true,
			'detail_license'               => 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit.'
		]);
	}
	
	function test_update_license_employee()
	{
		$typeProfessionalLicense = factory(TypeProfessionalLicense::class)->create();
		
		$this->step2_update += [
			'id_professional_license'      => [$this->license->id],
			'type_professional_license_id' => [$typeProfessionalLicense->id],
			'emission_license'             => ['27-04-2014'],
			'expired_license'              => ['15-02-2022'],
			'is_donor0'                    => false,
			'detail_license'               => [''],
			'count_professional_licenses'  => 1
		];
		
		Session::put('step2_update', $this->step2_update);
		
		$this->put('human-resources/employees/' . $this->employee->id, $this->step3_update)
			->seeInDatabase('professional_licenses', [
				'id'                           => $this->license->id,
				'employee_id'                  => $this->employee->id,
				'type_professional_license_id' => $typeProfessionalLicense->id,
				'emission_license'             => '2014-04-27',
				'expired_license'              => '2022-02-15',
				'is_donor'                     => false,
				'detail_license'               => ''
			]);
	}
}
