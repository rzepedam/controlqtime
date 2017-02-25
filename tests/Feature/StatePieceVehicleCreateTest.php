<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;

class StatePieceVehicleCreateTest extends BrowserKitTestCase
{
	use DatabaseTransactions;
	
	function setUp()
	{
		parent::setUp();
		$this->signIn();
	}
	
	function test_create_state_piece_vehicle()
	{
		$this->visit('maintainers/state-piece-vehicles/create')
			->seeInElement('h1', 'Crear Nuevo Estado Pieza Vehículo')
			->see('Nombre')
			->seeInElement('button', 'Guardar');
	}
	
	function test_store_state_piece_vehicle()
	{
		$this->visit('maintainers/state-piece-vehicles/create')
			->type('test', 'name')
			->press('Guardar')
			->seeInDatabase('state_piece_vehicles', [
				'name'       => 'test',
				'deleted_at' => null
			]);
	}
}
