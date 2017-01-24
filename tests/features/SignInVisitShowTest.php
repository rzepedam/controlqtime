<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
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
	}
	
	/** @test */
    function show_sign_in_visit()
    {
		$this->visit('visits/sign-in-visits/' . $this->signInVisit->id)
			->seeInElement('h1', 'Ver Visita: <span class="text-primary">' . $this->signInVisit->id . '</span>')
			->see($this->signInVisit->fullName)
			->see($this->signInVisit->rut)
			->see($this->signInVisit->birthday_to_spanish_format)
			->see($this->signInVisit->is_male_to_long_text)
			->see($this->signInVisit->phone)
			->see($this->signInVisit->email);
    }
}
