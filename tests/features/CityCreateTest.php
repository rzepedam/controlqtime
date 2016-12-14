<?php

use Controlqtime\Core\Entities\City;
use Controlqtime\Core\Entities\Country;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CityCreateTest extends TestCase
{
	use DatabaseTransactions;
	
	protected $city;
	
	protected $country;
	
	function setUp()
	{
		parent::setUp();
		$this->signIn();
		$this->city    = factory(City::class)->create();
	}
	
	function test_create_city()
	{
		$this->visit('maintainers/cities/create')
			->see('Crear Nueva Ciudad')
			->see($this->city->country->name)
			->see('Guardar')
			->assertResponseOk();
	}
	
	function test_store_city()
	{
		$this->visit('maintainers/cities/create')
			->type('test', 'name')
			->select($this->city->country->id, 'country_id')
			->press('Guardar')
			->seeInDatabase('cities', [
				'name'       => 'test',
				'country_id' => $this->city->country->id,
				'deleted_at' => null
			]);
	}
}
