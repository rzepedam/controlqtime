<?php

use Controlqtime\Core\Entities\Employee;
use Controlqtime\Core\Entities\Relationship;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class EmployeeDeleteFamilyRelationshipTest extends BrowserKitTestCase
{
	use DatabaseTransactions;
	
	protected $step1_update;
	
	protected $step2_update;
	
	protected $step3_update;
	
	protected $relationship;
	
	protected $familyRelationship;
	
	function setUp()
	{
		parent::setUp();
		$this->signIn();
		
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
			'count_family_relationships' => 0,
			'count_contacts'             => 0
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
		
		Session::put('step1_update', $this->step1_update);
		Session::put('step2_update', $this->step2_update);
		
		$this->relationship       = factory(Relationship::class)->create();
		$this->familyRelationship = $this->employee->familyRelationships()->create([
			'relationship_id'    => $this->relationship->id,
			'employee_family_id' => $this->employee->id
		]);
	}
	
	function test_delete_a_family_relationship()
	{
		Session::put('id_delete_family_relationship', json_encode([$this->familyRelationship->id]));
		
		$this->put('human-resources/employees/' . $this->employee->id, $this->step3_update)
			->dontSeeInDatabase('family_relationships', [
				'id'                 => $this->familyRelationship->id,
				'employee_id'        => $this->employee->id,
				'relationship_id'    => $this->relationship->id,
				'employee_family_id' => $this->employee->id
			]);
	}
	
	function test_delete_than_one_family_relationship()
	{
		$relationship = factory(Relationship::class)->create();
		$employee     = factory(Employee::class)->states('enable')->create();
		
		$familyRelationship = $this->employee->familyRelationships()->create([
			'relationship_id'    => $relationship->id,
			'employee_family_id' => $employee->id
		]);
		
		Session::put('id_delete_family_relationship', json_encode([$this->familyRelationship->id, $familyRelationship->id]));
		
		$this->put('human-resources/employees/' . $this->employee->id, $this->step3_update)
			->dontSeeInDatabase('family_relationships', [
				'id'                 => $this->familyRelationship->id,
				'employee_id'        => $this->employee->id,
				'relationship_id'    => $this->relationship->id,
				'employee_family_id' => $this->employee->id])
			->dontSeeInDatabase('family_relationships', [
				'id'                 => $familyRelationship->id,
				'employee_id'        => $this->employee->id,
				'relationship_id'    => $relationship->id,
				'employee_family_id' => $employee->id
			]);
	}
}
