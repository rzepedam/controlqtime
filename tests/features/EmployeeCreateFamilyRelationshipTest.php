<?php

use Controlqtime\Core\Entities\Degree;
use Controlqtime\Core\Entities\Employee;
use Controlqtime\Core\Entities\TypeExam;
use Controlqtime\Core\Entities\Institution;
use Controlqtime\Core\Entities\TypeDisease;
use Controlqtime\Core\Entities\Relationship;
use Controlqtime\Core\Entities\TypeDisability;
use Controlqtime\Core\Entities\TypeSpeciality;
use Controlqtime\Core\Entities\TypeCertification;
use Controlqtime\Core\Entities\TypeProfessionalLicense;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class EmployeeCreateFamilyRelationshipTest extends TestCase
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
	
	protected $sessionStep1;
	
	protected $sessionStep2;
	
	protected $sessionStep3;
	
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
		
		$this->sessionStep1 = [
			'male_surname'      => 'Candia',
			'female_surname'    => 'Parra',
			'first_name'        => 'Marcelo',
			'second_name'       => 'Pedro',
			'rut'               => '10.486.861-4',
			'birthday'          => '11-06-1989',
			'nationality_id'    => $this->nationality->id,
			'is_male'           => 'M',
			'marital_status_id' => $this->maritalStatus->id,
			'forecast_id'       => $this->forecast->id,
			'pension_id'        => $this->pension->id,
			'address'           => 'Vicuña Mackenna 2209',
			'commune_id'        => $this->commune->id,
			'phone1'            => '+56988102910',
			'email_employee'    => 'marcelocandia@gmail.com',
			'count_contacts'    => 0
		];
		
		$this->sessionStep2 = [
			'count_studies'               => 0,
			'count_certifications'        => 0,
			'count_specialities'          => 0,
			'count_professional_licenses' => 0
		];
		
		$this->sessionStep3 = [
			'count_disabilities'            => 0,
			'count_diseases'                => 0,
			'count_exams'                   => 0,
			'count_family_responsabilities' => 0
		];
		
		Session::put('step2', $this->sessionStep2);
		Session::put('email_employee', 'marcelocandia@gmail.com');
		Session::put('password', bcrypt('marcelocandia@gmail.com'));
	}
	
	function test_store_with_family_relationship_employee()
	{
		$this->sessionStep1 += [
			'relationship_id'            => [$this->relationship->id],
			'employee_family_id'         => [$this->employee->id],
			'count_family_relationships' => 1
		];
		
		Session::put('step1', $this->sessionStep1);
		
		$this->post('human-resources/employees', $this->sessionStep3)
			->seeInDatabase('family_relationships', [
				'relationship_id'    => $this->relationship->id,
				'employee_family_id' => $this->employee->id,
				'deleted_at'         => null
			]);
	}
	
	function test_store_with_multiple_family_relationship_employee()
	{
		$relationshipB = factory(Relationship::class)->create();
		$relationshipC = factory(Relationship::class)->create();
		$employeeB     = factory(Employee::class)->states('enable')->create();
		$employeeC     = factory(Employee::class)->states('enable')->create();
		
		$this->sessionStep1 += [
			'relationship_id'            => [$this->relationship->id, $relationshipB->id, $relationshipC->id],
			'employee_family_id'         => [$this->employee->id, $employeeB->id, $employeeC->id],
			'count_family_relationships' => 3
		];
		
		Session::put('step1', $this->sessionStep1);
		
		$this->post('human-resources/employees', $this->sessionStep3)
			->seeInDatabase('family_relationships', [
				'relationship_id'    => $this->relationship->id,
				'employee_family_id' => $this->employee->id,
				'deleted_at'         => null])
			->seeInDatabase('family_relationships', [
				'relationship_id'    => $relationshipB->id,
				'employee_family_id' => $employeeB->id,
				'deleted_at'         => null])
			->seeInDatabase('family_relationships', [
				'relationship_id'    => $relationshipC->id,
				'employee_family_id' => $employeeC->id,
				'deleted_at'         => null
			]);
	}
}
