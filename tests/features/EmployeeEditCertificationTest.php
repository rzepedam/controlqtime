<?php

use Controlqtime\Core\Entities\Institution;
use Controlqtime\Core\Entities\TypeCertification;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class EmployeeEditCertificationTest extends TestCase
{
	use DatabaseTransactions;
	
	protected $institution;
	
	protected $typeCertification;
	
	protected $step1_update;
	
	protected $step2_update;
	
	protected $step3_update;
	
	protected $certification;
	
	function setUp()
	{
		parent::setUp();
		$this->signIn();
		$this->institution       = factory(Institution::class)->create();
		$this->typeCertification = factory(TypeCertification::class)->create();
		
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
			'forecast_id'                => $this->forecast->id,
			'pension_id'                 => $this->pension->id,
			'address'                    => 'Vicuña Mackenna 2209',
			'commune_id'                 => $this->commune->id,
			'phone1'                     => '+56988102910',
			'email_employee'             => 'marcelocandia@gmail.com',
			'count_contacts'             => 0,
			'count_family_relationships' => 0
		];
		
		$this->step2_update = [
			'count_studies'               => 0,
			'count_specialities'          => 0,
			'count_professional_licenses' => 0
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
		
		$this->certification = $this->employee->certifications()->create([
			'type_certification_id'        => $this->typeCertification->id,
			'institution_certification_id' => $this->institution->id,
			'emission_certification'       => '22-10-1996',
			'expired_certification'        => '28-03-2010'
		]);
	}
	
	function test_update_certification_employee()
	{
		$typeCertification = factory(TypeCertification::class)->create();
		$institution       = factory(Institution::class)->create();
		
		$this->step2_update += [
			'id_certification'             => [$this->certification->id],
			'type_certification_id'        => [$typeCertification->id],
			'institution_certification_id' => [$institution->id],
			'emission_certification'       => ['12-08-2010'],
			'expired_certification'        => ['28-07-2020'],
			'count_certifications'         => 1
		];
		
		Session::put('step2_update', $this->step2_update);
		
		$this->put('human-resources/employees/' . $this->employee->id, $this->step3_update)
			->seeInDatabase('certifications', [
				'id'                           => $this->certification->id,
				'employee_id'                  => $this->employee->id,
				'type_certification_id'        => $typeCertification->id,
				'institution_certification_id' => $institution->id,
				'emission_certification'       => '2010-08-12',
				'expired_certification'        => '2020-07-28'
			]);
	}
}
