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

class EmployeeEditFamilyRelationshipTest extends TestCase
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
	
	protected $step1_update;
	
	protected $step2_update;
	
	protected $step3_update;
	
	protected $familyRelationship;
	
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
		
		$this->step1_update = [
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
		
		$this->step2_update = [
			'count_studies'               => 0,
			'count_certifications'        => 0,
			'count_specialities'          => 0,
			'count_professional_licenses' => 0
		];
		
		$this->step3_update = [
			'count_disabilities'            => 0,
			'count_diseases'                => 0,
			'count_exams'                   => 0,
			'count_family_responsabilities' => 0
		];
		
		Session::put('step2', $this->step2_update);
		Session::put('email_employee', 'marcelocandia@gmail.com');
		Session::put('password', bcrypt('marcelocandia@gmail.com'));
		
		$this->familyRelationship = $this->employee->familyRelationships()->create([
			'id_family_relationship' => 0,
			'relationship_id'        => $this->relationship->id,
			'employee_family_id'     => $this->employee->id
		]);
	}
	
	function test_update_family_relationship_employee()
	{
		$relationship = factory(Relationship::class)->create();
		$employee     = factory(\Controlqtime\Core\Entities\Employee::class)->states('enable')->create();
		
		$this->step1_update += [
			'id_family_relationship'     => [$this->familyRelationship->id],
			'relationship_id'            => [$relationship->id],
			'employee_family_id'         => [$employee->id],
			'count_family_relationships' => 1
		];
		
		Session::put('step1_update', $this->step1_update);
		
		$this->put('human-resources/employees/' . $this->employee->id, $this->step3_update)
			->seeInDatabase('family_relationships', [
				'id'                 => $this->familyRelationship->id,
				'employee_id'        => $this->employee->id,
				'relationship_id'    => $relationship->id,
				'employee_family_id' => $employee->id,
				'deleted_at'         => null
			]);
	}
}
