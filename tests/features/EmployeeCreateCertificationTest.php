<?php

use Controlqtime\Core\Entities\Institution;
use Controlqtime\Core\Entities\TypeCertification;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class EmployeeCreateCertificationTest extends TestCase
{
	use DatabaseTransactions;
	
	protected $institution;
	
	protected $typeCertification;
	
	protected $sessionStep1;
	
	protected $sessionStep2;
	
	protected $sessionStep3;
	
	function setUp()
	{
		parent::setUp();
		$this->signIn();
		$this->institution       = factory(Institution::class)->create();
		$this->typeCertification = factory(TypeCertification::class)->create();
		
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
			'address'                    => 'Vicuña Mackenna 2209',
			'commune_id'                 => $this->commune->id,
			'phone1'                     => '+56988102910',
			'email_employee'             => 'marcelocandia@gmail.com',
			'count_contacts'             => 0,
			'count_family_relationships' => 0
		];
		
		$this->sessionStep2 = [
			'count_studies'               => 0,
			'count_specialities'          => 0,
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
	
	function test_store_with_certification_employee()
	{
		$this->sessionStep2 += [
			'id_certification'             => [0],
			'type_certification_id'        => [$this->typeCertification->id],
			'institution_certification_id' => [$this->institution->id],
			'emission_certification'       => ['13-02-2005'],
			'expired_certification'        => ['13-02-2015'],
			'count_certifications'         => 1
		];
		
		Session::put('step2', $this->sessionStep2);
		
		$this->post('human-resources/employees', $this->sessionStep3)
			->seeInDatabase('certifications', [
				'type_certification_id'        => $this->typeCertification->id,
				'institution_certification_id' => $this->institution->id,
				'emission_certification'       => '2005-02-13',
				'expired_certification'        => '2015-02-13'
			]);
	}
	
	function test_store_with_multiple_certification_employee()
	{
		$typeCertificationA = factory(TypeCertification::class)->create();
		$typeCertificationB = factory(TypeCertification::class)->create();
		$typeCertificationC = factory(TypeCertification::class)->create();
		
		$institutionA = factory(Institution::class)->create();
		$institutionB = factory(Institution::class)->create();
		$institutionC = factory(Institution::class)->create();
		
		$this->sessionStep2 += [
			'id_certification'             => [0, 0, 0],
			'type_certification_id'        => [$typeCertificationA->id, $typeCertificationB->id, $typeCertificationC->id],
			'institution_certification_id' => [$institutionA->id, $institutionB->id, $institutionC->id],
			'emission_certification'       => ['13-02-2005', '24-01-2010', '09-06-2013'],
			'expired_certification'        => ['13-02-2015', '24-01-2015', '08-02-2015'],
			'count_certifications'         => 3
		];
		
		Session::put('step2', $this->sessionStep2);
		
		$this->post('human-resources/employees', $this->sessionStep3)
			->seeInDatabase('certifications', [
				'type_certification_id'        => $typeCertificationA->id,
				'institution_certification_id' => $institutionA->id,
				'emission_certification'       => '2005-02-13',
				'expired_certification'        => '2015-02-13'])
			->seeInDatabase('certifications', [
				'type_certification_id'        => $typeCertificationB->id,
				'institution_certification_id' => $institutionB->id,
				'emission_certification'       => '2010-01-24',
				'expired_certification'        => '2015-01-24'])
			->seeInDatabase('certifications', [
				'type_certification_id'        => $typeCertificationC->id,
				'institution_certification_id' => $institutionC->id,
				'emission_certification'       => '2013-06-09',
				'expired_certification'        => '2015-02-08'
			]);
	}
}
