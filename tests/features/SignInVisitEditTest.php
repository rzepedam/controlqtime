<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;

class SignInVisitEditTest extends TestCase
{
	use DatabaseTransactions;
	
	protected $signInVisit;
	
	function setUp()
	{
		parent::setUp();
		$this->signIn();
		
		$this->signInVisit = factory(\Controlqtime\Core\Entities\SignInVisit::class)->create([
			'is_male' => 'M'
		]);
		
		$contactEmployee = factory(\Controlqtime\Core\Entities\ContactEmployee::class)->create([
			'contactsable_id' => $this->signInVisit->id
		]);
	}
	
	/** @test */
	function edit_sign_in_visit()
	{
		$this->visit('visits/sign-in-visits/' . $this->signInVisit->id . '/edit')
			->seeInElement('h1', 'Editar Visita: <span class="text-primary">' . $this->signInVisit->id . '</span>')
			->seeInElement('h3', 'Datos Personales')
			->seeInField('male_surname', $this->signInVisit->male_surname)
			->seeInField('female_surname', $this->signInVisit->female_surname)
			->seeInField('first_name', $this->signInVisit->first_name)
			->seeInField('second_name', $this->signInVisit->second_name)
			->seeInField('rut', $this->signInVisit->rut)
			->seeInField('birthday', $this->signInVisit->birthday)
			->seeIsSelected('is_male', 'M')
			->dontSeeIsSelected('is_male', 'F')
			->seeInField('phone', $this->signInVisit->phone)
			->seeInField('email', $this->signInVisit->email)
			->seeInElement('h3', 'Información de Contacto')
			->seeInElement('#contact_relationship_id', $this->signInVisit->contactsable->relationship->id)
			->seeInField('name_contact', $this->signInVisit->contactsable->name_contact)
			->seeInField('tel_contact', $this->signInVisit->contactsable->tel_contact)
			->seeInField('email_contact', $this->signInVisit->contactsable->email_contact)
			->seeInField('address_contact', $this->signInVisit->contactsable->address_contact)
			->seeInElement('a', 'Volver')
			->seeInElement('button', 'Actualizar');
	}
	
	/** @test */
	function update_sign_in_visit()
	{
		$relationship = factory(\Controlqtime\Core\Entities\Relationship::class)->create();
		
		$this->visit('visits/sign-in-visits/' . $this->signInVisit->id . '/edit')
			->type('Carvallo', 'male_surname')
			->type('Morales', 'female_surname')
			->type('Claudio', 'first_name')
			->type('Pablo', 'second_name')
			->type('12345678-1', 'rut')
			->type('01-12-2001', 'birthday')
			->select('M', '#is_male')
			->type('+56982145509', 'phone')
			->type('email@test.cl', 'email')
			->select($relationship->id, '#contact_relationship_id')
			->type('Manuel Bulboa Sánchez', 'name_contact')
			->type('+220909100', 'tel_contact')
			->type('manuelbulboa@gmail.com', 'email_contact')
			->type('Av. Matta 10099, Santiago. Chile', 'address_contact')
			->press('Actualizar')
			->seeInDatabase('sign_in_visits', [
				'male_surname'   => 'Carvallo',
				'female_surname' => 'Morales',
				'first_name'     => 'Claudio',
				'second_name'    => 'Pablo',
				'rut'            => '12345678-1',
				'birthday'       => '2001-12-01',
				'is_male'        => 1,
				'phone'          => '+56982145509',
				'email'          => 'email@test.cl'])
			->seeInDatabase('contact_employees', [
				'contactsable_type'       => 'Controlqtime\Core\Entities\SignInVisit',
				'contact_relationship_id' => $relationship->id,
				'name_contact'            => 'Manuel Bulboa Sánchez',
				'tel_contact'             => '+220909100',
				'email_contact'           => 'manuelbulboa@gmail.com',
				'address_contact'         => 'Av. Matta 10099, Santiago. Chile'
			]);
	}
}
