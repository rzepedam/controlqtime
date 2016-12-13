<?php

use Controlqtime\Core\Entities\Country;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CountryCreateTest extends TestCase
{
	use DatabaseTransactions;
	
	protected $country;
	
	function setUp()
	{
		parent::setUp();
		$this->signIn();
		$this->country = factory(Country::class)->create();
	}
	
	function test_create_country()
	{
		$this->visit('maintainers/countries/create')
			->see('Crear Nuevo País')
			->see('Nombre')
			->see('Guardar')
			->assertResponseOk();
	}
	
	function test_store_country()
	{
		$this->visit('maintainers/countries/create')
			->type('test', 'name')
			->press('Guardar')
			->seeInDatabase('countries', [
				'name'       => 'test',
				'deleted_at' => null
			]);
	}
}
