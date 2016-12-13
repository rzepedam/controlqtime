<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;

class PieceVehicleIndexTest extends TestCase
{
	use DatabaseTransactions;
	
	function setUp()
	{
		parent::setUp();
		$this->signIn();
	}
	
	function test_url_piece_vehicle()
	{
		$this->visit('maintainers/piece-vehicles')
			->assertResponseOk();
	}
	
	function test_route_piece_vehicle()
	{
		$this->visitRoute('piece-vehicles.index')
			->assertResponseOk();
	}
	
	function test_index_piece_vehicle()
	{
		$this->visit('maintainers/piece-vehicles')
			->seeInElement('h1', 'Listado Piezas de Vehículos')
			->seeInElement('a', 'Crear Nueva Pieza Vehículo')
			->see('Nombre');
	}
}
