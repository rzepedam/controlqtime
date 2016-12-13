<?php

use Controlqtime\Core\Entities\Fuel;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class FuelCreateTest extends TestCase
{
	use DatabaseTransactions;
	
	protected $fuel;
	
	function setUp()
	{
		parent::setUp();
		$this->signIn();
		$this->fuel = factory(Fuel::class)->create();
	}
	
	function test_create_fuel()
	{
		$this->visit('maintainers/fuels/create')
			->see('Crear Nuevo Combustible')
			->see('Nombre')
			->see('Guardar')
			->assertResponseOk();
	}
	
	function test_store_fuel()
	{
		$this->visit('maintainers/fuels/create')
			->type('test', 'name')
			->press('Guardar')
			->seeInDatabase('fuels', [
				'name'       => 'test',
				'deleted_at' => null
			]);
	}
}
