<?php

use Controlqtime\Core\Entities\Relationship;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class EmployeeDeleteContactTest extends TestCase
{
	use DatabaseTransactions;
	
	protected $contact;
	
	protected $relationship;
	
	protected $step1_update;
	
	protected $step2_update;
	
	protected $step3_update;
	
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
			'count_disabilities'            => 0,
			'count_diseases'                => 0,
			'count_exams'                   => 0,
			'count_family_responsabilities' => 0
		];
		
		Session::put('step1_update', $this->step1_update);
		Session::put('step2_update', $this->step2_update);
		
		$this->relationship = factory(Relationship::class)->create();
		$this->contact      = $this->employee->contactsable()->create([
			'contact_relationship_id' => $this->relationship->id,
			'name_contact'            => 'José Miguel Osorio Sepúlveda',
			'email_contact'           => 'joseosorio@gmail.com',
			'address_contact'         => 'Pje. Limahuida 1990',
			'tel_contact'             => '+56983401021',
		]);
	}
	
	/** @test */
	function delete_a_contact_employee()
	{
		Session::put('id_delete_contact', json_encode([$this->contact->id]));
		
		$this->put('human-resources/employees/' . $this->employee->id, $this->step3_update)
			->dontSeeInDatabase('contact_employees', [
				'id'                      => $this->contact->id,
				'contact_relationship_id' => $this->relationship->id,
				'name_contact'            => 'José Miguel Osorio Sepúlveda',
				'email_contact'           => 'joseosorio@gmail.com',
				'address_contact'         => 'Pje. Limahuida 1990',
				'tel_contact'             => '+56983401021'
			]);
	}
	
	/** @test */
	function delete_more_than_one_contacts_employee()
	{
		$contact = $this->employee->contactsable()->create([
			'contact_relationship_id' => $this->relationship->id,
			'name_contact'            => 'Arévalo Martínez González',
			'email_contact'           => 'are.gon@gmail.com',
			'address_contact'         => 'Las Acacias 929',
			'tel_contact'             => '+56979811220',
		]);
		
		Session::put('id_delete_contact', json_encode([$this->contact->id, $contact->id]));
		
		$this->put('human-resources/employees/' . $this->employee->id, $this->step3_update)
			->dontSeeInDatabase('contact_employees', [
				'id'                      => $this->contact->id,
				'contact_relationship_id' => $this->relationship->id,
				'name_contact'            => 'José Miguel Osorio Sepúlveda',
				'email_contact'           => 'joseosorio@gmail.com',
				'address_contact'         => 'Pje. Limahuida 1990',
				'tel_contact'             => '+56983401021'])
			->dontSeeInDatabase('contact_employees', [
				'id'                      => $contact->id,
				'contact_relationship_id' => $this->relationship->id,
				'name_contact'            => 'Arévalo Martínez González',
				'email_contact'           => 'are.gon@gmail.com',
				'address_contact'         => 'Las Acacias 929',
				'tel_contact'             => '+56979811220'
			]);
	}
}
