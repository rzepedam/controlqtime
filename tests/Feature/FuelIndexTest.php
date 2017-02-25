<?php

use Controlqtime\Core\Entities\Fuel;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class FuelIndexTest extends BrowserKitTestCase
{
	use DatabaseTransactions;
	
	protected $fuel;
	
	function setUp()
	{
		parent::setUp();
		$this->signIn();
		$this->fuel = factory(Fuel::class)->create();
	}
	
	function test_url_fuel()
	{
		$this->visit('maintainers/fuels')
			->assertResponseOk();
	}
	
	function test_route_fuel()
	{
		$this->visitRoute('fuels.index')
			->assertResponseOk();
	}
	
	function test_index_fuel()
	{
		$this->visit('maintainers/fuels')
			->see('Listado de Combustibles')
			->see('Crear Nuevo Combustible')
			->see('Nombre')
			->assertResponseOk();
	}
}
