<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;

class VehicleIndexTest extends BrowserKitTestCase
{
	use DatabaseTransactions;
	
	function setUp()
	{
		parent::setUp();
		$this->signIn();
	}
	
	function test_url_vehicle()
	{
		$this->visit('operations/vehicles')
			->assertResponseOk();
	}
	
	function test_route_vehicle()
	{
		$this->visitRoute('vehicles.index')
			->assertResponseOk();
	}
	
	function test_index_vehicle()
	{
		$this->visit('operations/vehicles')
			->seeInElement('h1', 'Listado de Vehículos')
			->seeInElement('th', 'Patente')
			->seeInElement('th', 'Tipo')
			->seeInElement('th', 'Modelo');
	}
}
