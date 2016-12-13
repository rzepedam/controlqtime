<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;

class ModelVehicleIndexTest extends TestCase
{
	use DatabaseTransactions;
	
	function setUp()
	{
		parent::setUp();
		$this->signIn();
	}
	
	function test_url_model_vehicle()
	{
		$this->visit('maintainers/model-vehicles')
			->assertResponseOk();
	}
	
	function test_route_model_vehicle()
	{
		$this->visitRoute('model-vehicles.index')
			->assertResponseOk();
	}
	
	function test_index_model_vehicle()
	{
		$this->visit('maintainers/model-vehicles')
			->seeInElement('h1', 'Listado de Modelo de Vehículos')
			->seeInElement('a', 'Crear Nuevo Modelo')
			->see('Modelo')
			->see('Marca');
	}
}
