<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;

class StatePieceVehicleIndexTest extends TestCase
{
	use DatabaseTransactions;
	
	function setUp()
	{
		parent::setUp();
		$this->signIn();
	}
	
	function test_url_state_piece_vehicle()
	{
		$this->visit('maintainers/state-piece-vehicles')
			->assertResponseOk();
	}
	
	function test_route_state_piece_vehicle()
	{
		$this->visitRoute('state-piece-vehicles.index')
			->assertResponseOk();
	}
	
	function test_index_state_piece_vehicle()
	{
		$this->visit('maintainers/state-piece-vehicles')
			->seeInElement('h1', 'Listado de Estado Pieza Vehículos')
			->seeInElement('a', 'Crear Nuevo Estado')
			->see('Nombre');
	}
}
