<?php

use Controlqtime\Core\Entities\Relationship;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class EmployeeEditContactTest extends TestCase
{
	use DatabaseTransactions;
	
	protected $relationship;
	
	protected $step1_update;
	
	protected $step2_update;
	
	protected $step3_update;
	
	protected $contact;
	
	function setUp()
	{
		parent::setUp();
		$this->signIn();
		
		$this->relationship = factory(Relationship::class)->create();
		
		$this->step1_update = [
			'male_surname'                  => 'Candia',
			'female_surname'                => 'Parra',
			'first_name'                    => 'Marcelo',
			'second_name'                   => 'Pedro',
			'rut'                           => '10.486.861-4',
			'birthday'                      => '11-06-1989',
			'nationality_id'                => $this->nationality->id,
			'is_male'                       => 'M',
			'marital_status_id'             => $this->maritalStatus->id,
			'address'                       => 'Vicuña Mackenna 2209',
			'commune_id'                    => $this->commune->id,
			'phone1'                        => '+56988102910',
			'email_employee'                => 'marcelocandia@gmail.com',
			'count_family_relationships'    => 0,
			'id_delete_family_relationship' => ''
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
		Session::put('id_delete_contact_update', '');
		
		$this->contact = $this->employee->contactEmployees()->create([
			'contact_relationship_id' => $this->relationship->id,
			'name_contact'            => 'José Miguel Osorio Sepúlveda',
			'email_contact'           => 'joseosorio@gmail.com',
			'address_contact'         => 'Pje. Limahuida 1990',
			'tel_contact'             => '+56983401021',
		]);
	}
	
	function test_update_contact_employee()
	{
		$relationship = factory(Relationship::class)->create();
		
		$this->step1_update += [
			'id_contact'              => [$this->contact->id],
			'contact_relationship_id' => [$relationship->id],
			'name_contact'            => ['Iván Osvaldo Flores Mondaca'],
			'email_contact'           => ['ivanosvaldo@gmail.com'],
			'address_contact'         => ['Av. Tres 0554'],
			'tel_contact'             => ['+56976109211'],
			'count_contacts'          => 1
		];
		
		Session::put('step1_update', $this->step1_update);
		
		$this->put('human-resources/employees/' . $this->employee->id, $this->step3_update)
			->seeInDatabase('contact_employees', [
				'id'              => $this->contact->id,
				'employee_id'     => $this->employee->id,
				'name_contact'    => 'Iván Osvaldo Flores Mondaca',
				'email_contact'   => 'ivanosvaldo@gmail.com',
				'address_contact' => 'Av. Tres 0554',
				'tel_contact'     => '+56976109211'
			]);
	}
	
}
