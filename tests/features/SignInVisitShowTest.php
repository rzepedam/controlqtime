<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;

class SignInVisitShowTest extends TestCase
{
	use DatabaseTransactions;
	
	protected $signInVisit;
	
	function setUp()
	{
		parent::setUp();
		$this->signIn();
		$this->signInVisit = factory(\Controlqtime\Core\Entities\SignInVisit::class)->create();
		$contactEmployee   = factory(\Controlqtime\Core\Entities\ContactEmployee::class)->create([
			'contactsable_id' => $this->signInVisit->id
		]);
	}
	
	/** @test */
	function show_sign_in_visit()
	{
		$this->visit('visits/sign-in-visits/' . $this->signInVisit->id)
			->seeInElement('h1', 'Ver Visita: <span class="text-primary">' . $this->signInVisit->id . '</span>')
			->see('Datos Personales')
			->see($this->signInVisit->fullName)
			->see($this->signInVisit->rut)
			->see($this->signInVisit->birthday_to_spanish_format)
			->see($this->signInVisit->is_male_to_long_text)
			->see($this->signInVisit->phone)
			->see($this->signInVisit->email)
			->see('Información Contacto')
			->see($this->signInVisit->contactsable->relationship->name)
			->see($this->signInVisit->contactsable->name_contact)
			->see($this->signInVisit->contactsable->tel_contact)
			->see($this->signInVisit->contactsable->email_contact)
			->see($this->signInVisit->contactsable->address_contact)
			->seeInElement('a', 'Volver');
	}
}
