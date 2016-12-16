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

class EmployeeCreateFamilyResponsabilityTest extends TestCase
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
			'count_specialities'          => 0,
			'count_professional_licenses' => 0
		];
		
		$this->sessionStep3 = [
			'count_diseases'     => 0,
			'count_disabilities' => 0,
			'count_exams'        => 0
		];
		
		Session::put('step1', $this->sessionStep1);
		Session::put('step2', $this->sessionStep2);
		Session::put('email_employee', 'marcelocandia@gmail.com');
		Session::put('password', bcrypt('marcelocandia@gmail.com'));
	}
	
	function test_store_with_family_responsability_employee()
	{
		$this->sessionStep3 += [
			'id_family_responsability'      => [0],
			'name_responsability'           => ['José Miguel Escobar Sepúlveda'],
			'rut_responsability'            => ['15.257.414-2'],
			'relationship_id'               => [$this->relationship->id],
			'count_family_responsabilities' => 1
		];
		
		$this->post('human-resources/employees', $this->sessionStep3)
			->seeInDatabase('family_responsabilities', [
				'name_responsability' => 'José Miguel Escobar Sepúlveda',
				'rut_responsability'  => '15257414-2',
				'relationship_id'     => $this->relationship->id
			]);
	}
	
	function test_store_with_multiple_family_responsability_employee()
	{
		$relationshipA = factory(Relationship::class)->create();
		$relationshipB = factory(Relationship::class)->create();
		$relationshipC = factory(Relationship::class)->create();
		
		$this->sessionStep3 += [
			'id_family_responsability'      => [0, 0, 0],
			'name_responsability'           => ['José Miguel Escobar Sepúlveda', 'María Soto Quiróz', 'Arturo Cáceres Oliva'],
			'rut_responsability'            => ['15.257.414-2', '20.003.720-0', '13.547.147-k'],
			'relationship_id'               => [$relationshipA->id, $relationshipB->id, $relationshipC->id],
			'count_family_responsabilities' => 3
		];
		
		$this->post('human-resources/employees', $this->sessionStep3)
			->seeInDatabase('family_responsabilities', [
				'name_responsability' => 'José Miguel Escobar Sepúlveda',
				'rut_responsability'  => '15257414-2',
				'relationship_id'     => $relationshipA->id])
			->seeInDatabase('family_responsabilities', [
				'name_responsability' => 'María Soto Quiróz',
				'rut_responsability'  => '20003720-0',
				'relationship_id'     => $relationshipB->id])
			->seeInDatabase('family_responsabilities', [
				'name_responsability' => 'Arturo Cáceres Oliva',
				'rut_responsability'  => '13547147-k',
				'relationship_id'     => $relationshipC->id
			]);
	}
	
}
