<?php

use Controlqtime\Core\Entities\Institution;
use Controlqtime\Core\Entities\TypeSpeciality;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class EmployeeCreateSpecialityTest extends TestCase
{
	use DatabaseTransactions;
	
	protected $institution;
	
	protected $typeSpeciality;
	
	protected $sessionStep1;
	
	protected $sessionStep2;
	
	protected $sessionStep3;
	
	function setUp()
	{
		parent::setUp();
		$this->signIn();
		$this->institution    = factory(Institution::class)->create();
		$this->typeSpeciality = factory(TypeSpeciality::class)->create();
		
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
			'count_studies'               => 0,
			'count_certifications'        => 0,
			'count_professional_licenses' => 0
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
	
	function test_store_with_speciality_employee()
	{
		$this->sessionStep2 += [
			'id_speciality'             => [0],
			'type_speciality_id'        => [$this->typeSpeciality->id],
			'institution_speciality_id' => [$this->institution->id],
			'emission_speciality'       => ['18-11-2009'],
			'expired_speciality'        => ['25-04-2017'],
			'count_specialities'        => 1
		];
		
		Session::put('step2', $this->sessionStep2);
		
		$this->post('human-resources/employees', $this->sessionStep3)
			->seeInDatabase('specialities', [
				'type_speciality_id'        => $this->typeSpeciality->id,
				'institution_speciality_id' => $this->institution->id,
				'emission_speciality'       => '2009-11-18',
				'expired_speciality'        => '2017-04-25'
			]);
	}
	
	function test_store_with_multiple_speciality_employee()
	{
		$typeSpecialityA = factory(TypeSpeciality::class)->create();
		$typeSpecialityB = factory(TypeSpeciality::class)->create();
		$typeSpecialityC = factory(TypeSpeciality::class)->create();
		
		$institutionA = factory(Institution::class)->create();
		$institutionB = factory(Institution::class)->create();
		$institutionC = factory(Institution::class)->create();
		
		$this->sessionStep2 += [
			'id_speciality'             => [0, 0, 0],
			'type_speciality_id'        => [$typeSpecialityA->id, $typeSpecialityB->id, $typeSpecialityC->id],
			'institution_speciality_id' => [$institutionA->id, $institutionB->id, $institutionC->id],
			'emission_speciality'       => ['18-11-2009', '21-09-1998', '11-08-2016'],
			'expired_speciality'        => ['25-04-2017', '12-01-2002', '17-09-2022'],
			'count_specialities'        => 3
		];
		
		Session::put('step2', $this->sessionStep2);
		
		$this->post('human-resources/employees', $this->sessionStep3)
			->seeInDatabase('specialities', [
				'type_speciality_id'        => $typeSpecialityA->id,
				'institution_speciality_id' => $institutionA->id,
				'emission_speciality'       => '2009-11-18',
				'expired_speciality'        => '2017-04-25'])
			->seeInDatabase('specialities', [
				'type_speciality_id'        => $typeSpecialityB->id,
				'institution_speciality_id' => $institutionB->id,
				'emission_speciality'       => '1998-09-21',
				'expired_speciality'        => '2002-01-12'])
			->seeInDatabase('specialities', [
				'type_speciality_id'        => $typeSpecialityC->id,
				'institution_speciality_id' => $institutionC->id,
				'emission_speciality'       => '2016-08-11',
				'expired_speciality'        => '2022-09-17'
			]);
	}
}
