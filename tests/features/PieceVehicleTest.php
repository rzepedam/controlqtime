<?php

use Controlqtime\Core\Entities\PieceVehicle;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class PieceVehicleTest extends TestCase
{
	use DatabaseTransactions;
	
	protected $pieceVehicle;
	
	function setUp()
	{
		parent::setUp();
		$this->signIn();
		$this->pieceVehicle = factory(PieceVehicle::class)->create();
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
	
	function test_edit_piece_vehicle()
	{
		$this->visit('maintainers/piece-vehicles/' . $this->pieceVehicle->id . '/edit')
			->seeInElement('h1', 'Editar Pieza de Vehículo: <span class="text-primary">' . $this->pieceVehicle->id . '</span>')
			->seeInField('#name', $this->pieceVehicle->name)
			->seeInElement('button', 'Actualizar');
	}
	
	function test_update_piece_vehicle()
	{
		$this->visit('maintainers/piece-vehicles/' . $this->pieceVehicle->id . '/edit')
			->type('test', 'name')
			->press('Actualizar')
			->seeInDatabase('piece_vehicles', [
				'id'         => $this->pieceVehicle->id,
				'name'       => 'test',
				'deleted_at' => null
			]);
	}
	
	function test_delete_piece_vehicle()
	{
		$this->delete('maintainers/piece-vehicles/' . $this->pieceVehicle->id)
			->dontSeeInDatabase('piece_vehicles', [
				'id'         => $this->pieceVehicle->id,
				'name'       => $this->pieceVehicle->name,
				'deleted_at' => null
			]);
	}
	
	function test_restore_piece_vehicle()
	{
		$this->pieceVehicle->delete();
		
		$this->visit('maintainers/piece-vehicles/create')
			->type($this->pieceVehicle->name, 'name')
			->press('Guardar')
			->seeInDatabase('piece_vehicles', [
				'id'         => $this->pieceVehicle->id,
				'name'       => $this->pieceVehicle->name,
				'deleted_at' => null
			]);
	}
}
