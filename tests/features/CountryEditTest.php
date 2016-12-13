<?php

use Controlqtime\Core\Entities\Country;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CountryEditTest extends TestCase
{
	use DatabaseTransactions;
	
	protected $country;
	
	function setUp()
	{
		parent::setUp();
		$this->signIn();
		$this->country = factory(Country::class)->create();
	}
	
	function test_edit_country()
	{
		$this->visit('maintainers/countries/' . $this->country->id . '/edit')
			->see('Editar País: <span class="text-primary">' . $this->country->id . '</span>')
			->seeInField('#name', $this->country->name)
			->see('Actualizar')
			->assertResponseOk();
	}
	
	function test_update_country()
	{
		$this->visit('maintainers/countries/' . $this->country->id . '/edit')
			->type('test', 'name')
			->press('Actualizar')
			->seeInDatabase('countries', [
				'name'       => 'test',
				'deleted_at' => null
			]);
	}
}
