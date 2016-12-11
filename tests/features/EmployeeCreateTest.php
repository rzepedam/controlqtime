<?php

use Controlqtime\Core\Entities\Degree;
use Controlqtime\Core\Entities\TypeExam;
use Controlqtime\Core\Entities\Institution;
use Controlqtime\Core\Entities\TypeDisease;
use Controlqtime\Core\Entities\Relationship;
use Controlqtime\Core\Entities\TypeDisability;
use Controlqtime\Core\Entities\TypeSpeciality;
use Controlqtime\Core\Entities\TypeCertification;
use Controlqtime\Core\Entities\TypeProfessionalLicense;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class EmployeeCreateTest extends TestCase
{
	use DatabaseTransactions;
	
	protected $degree;
	
	protected $institution;
	
	protected $relationship;
	
	protected $typeCertification;
	
	protected $typeDisability;
	
	protected $typeDisease;
	
	protected $typeExam;
	
	protected $typeProfessionalLicense;
	
	protected $typeSpeciality;
	
	function setUp()
	{
		parent::setUp();
		$this->signIn();
		$this->degree                  = factory(Degree::class)->create();
		$this->institution             = factory(Institution::class)->create();
		$this->relationship            = factory(Relationship::class)->create();
		$this->typeCertification       = factory(TypeCertification::class)->create();
		$this->typeDisability          = factory(TypeDisability::class)->create();
		$this->typeDisease             = factory(TypeDisease::class)->create();
		$this->typeExam                = factory(TypeExam::class)->create();
		$this->typeProfessionalLicense = factory(TypeProfessionalLicense::class)->create();
		$this->typeSpeciality          = factory(TypeSpeciality::class)->create();
	}
	
	function test_create_employee()
	{
		$this->visit('human-resources/employees/create')
			->seeInElement('h1', 'Crear Nuevo Trabajador')
			->seeInElement('#nationality_id', $this->nationality->name)
			->seeIsSelected('is_male', 'M')
			->seeInElement('#marital_status_id', $this->maritalStatus->name)
			->seeInElement('#forecast_id', $this->forecast->name)
			->seeInElement('#pension_id', $this->pension->name)
			->seeInElement('#region_id', $this->region->name)
			->seeInElement('#province_id', $this->province->name)
			->seeInElement('#commune_id', $this->commune->name)
			->assertResponseOk();
	}
	
	function test_store_employee()
	{
		$sessionStep1 = [
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
		
		$sessionStep2 = [
			'count_studies'               => 0,
			'count_certifications'        => 0,
			'count_specialities'          => 0,
			'count_professional_licenses' => 0
		];
		
		Session::put('step1', $sessionStep1);
		Session::put('email_employee', 'marcelocandia@gmail.com');
		Session::put('password', bcrypt('marcelocandia@gmail.com'));
		Session::put('step2', $sessionStep2);
		
		$data = [
			'count_disabilities'            => 0,
			'count_diseases'                => 0,
			'count_exams'                   => 0,
			'count_family_responsabilities' => 0
		];
		
		$this->post('human-resources/employees', $data)
			->seeInDatabase('employees', [
				'male_surname'      => 'Candia',
				'female_surname'    => 'Parra',
				'first_name'        => 'Marcelo',
				'second_name'       => 'Pedro',
				'rut'               => '10486861-4',
				'birthday'          => '1989-06-11',
				'nationality_id'    => 1,
				'is_male'           => true,
				'marital_status_id' => 1,
				'forecast_id'       => 1,
				'pension_id'        => 1,
				'email_employee'    => 'marcelocandia@gmail.com',
				'url'               => null,
				'state'             => 'disable',
				'condition'         => 'unavailable',
				'deleted_at'        => null
			]);
		
		$this->seeInDatabase('users', [
			'email' => 'marcelocandia@gmail.com'
		]);
		
		$this->seeInDatabase('addresses', [
			'addressable_type' => 'Controlqtime\Core\Entities\Employee',
			'address'          => 'Vicuña Mackenna 2209',
			'commune_id'       => 1,
			'phone1'           => '+56988102910',
			'phone2'           => ''
		]);
		
		$this->seeInDatabase('detail_address_legal_employees', [
			'depto'    => '',
			'block'    => '',
			'num_home' => ''
		]);
	}
}
