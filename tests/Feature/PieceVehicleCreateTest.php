<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;

class PieceVehicleCreateTest extends BrowserKitTestCase
{
	use DatabaseTransactions;
	
	protected $pieceVehicle;
	
	function setUp()
	{
		parent::setUp();
		$this->signIn();
	}
	
	function test_create_piece_vehicle()
	{
		$this->visit('maintainers/piece-vehicles/create')
			->seeInElement('h1', 'Crear Nueva Pieza Vehículo')
			->see('Nombre')
			->seeInElement('button', 'Guardar');
	}
	
	function test_store_piece_vehicle()
	{
		$this->visit('maintainers/piece-vehicles/create')
			->type('test', 'name')
			->press('Guardar')
			->seeInDatabase('piece_vehicles', [
				'name'       => 'test',
				'deleted_at' => null
			]);
	}
}
