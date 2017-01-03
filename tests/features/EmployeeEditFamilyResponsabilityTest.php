<?php

use Controlqtime\Core\Entities\Relationship;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class EmployeeEditFamilyResponsabilityTest extends TestCase
{
	use DatabaseTransactions;
	
	protected $step1_update;
	
	protected $step2_update;
	
	protected $step3_update;
	
	protected $relationship;
	
	protected $familyResponsability;
	
	function setUp()
	{
		parent::setUp();
		$this->signIn();
		
		$this->relationship = factory(Relationship::class)->create();
		
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
			'count_studies'               => 0,
			'count_certifications'        => 0,
			'count_specialities'          => 0,
			'count_professional_licenses' => 0
		];
		
		$this->step3_update = [
			'count_disabilities' => 0,
			'count_diseases'     => 0,
			'count_exams'        => 0
		];
		
		Session::put('step1_update', $this->step1_update);
		Session::put('step2_update', $this->step2_update);
		Session::put('email_employee', 'marcelocandia@gmail.com');
		Session::put('password', bcrypt('marcelocandia@gmail.com'));
		
		$this->familyResponsability = $this->employee->familyResponsabilities()->create([
			'name_responsability'      => 'Andrés Camargo Salas',
			'rut_responsability'       => '15.257.414-2',
			'relationship_id'          => $this->relationship->id,
		]);
	}
	
	function test_update_family_responsability_employee()
	{
		$relationship = factory(Relationship::class)->create();
		
		$this->step3_update += [
			'id_family_responsability'      => [$this->familyResponsability->id],
			'name_responsability'           => ['Enrique Olivares Mena'],
			'rut_responsability'            => ['20.003.720-0'],
			'relationship_id'               => [$relationship->id],
			'count_family_responsabilities' => 1
		];
		
		$this->put('human-resources/employees/' . $this->employee->id, $this->step3_update)
			->seeInDatabase('family_responsabilities', [
				'id'                  => $this->familyResponsability->id,
				'employee_id'         => $this->employee->id,
				'name_responsability' => 'Enrique Olivares Mena',
				'rut_responsability'  => '20003720-0',
				'relationship_id'     => $relationship->id
			]);
	}
}
