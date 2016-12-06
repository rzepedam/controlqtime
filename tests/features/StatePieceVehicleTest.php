<?php

use Controlqtime\Core\Entities\StatePieceVehicle;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class StatePieceVehicleTest extends TestCase
{
	use DatabaseTransactions;
	
	protected $statePieceVehicle;
	
	function setUp()
	{
		parent::setUp();
		$this->signIn();
		$this->statePieceVehicle = factory(StatePieceVehicle::class)->create();
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
	
	function test_edit_state_piece_vehicle()
	{
		$this->visit('maintainers/state-piece-vehicles/' . $this->statePieceVehicle->id . '/edit')
			->seeInElement('h1', 'Editar Estado Pieza Vehículo: <span class="text-primary">' . $this->statePieceVehicle->id . '</span>')
			->seeInField('#name', $this->statePieceVehicle->name)
			->seeInElement('button', 'Actualizar');
	}
	
	function test_update_state_piece_vehicle()
	{
		$this->visit('maintainers/state-piece-vehicles/' . $this->statePieceVehicle->id . '/edit')
			->type('test', 'name')
			->press('Actualizar')
			->seeInDatabase('state_piece_vehicles', [
				'id'         => $this->statePieceVehicle->id,
				'name'       => 'test',
				'deleted_at' => null
			]);
	}
	
	function test_delete_state_piece_vehicle()
	{
		$this->delete('maintainers/state-piece-vehicles/' . $this->statePieceVehicle->id)
			->dontSeeInDatabase('state_piece_vehicles', [
				'id'         => $this->statePieceVehicle->id,
				'name'       => $this->statePieceVehicle->name,
				'deleted_at' => null
			]);
	}
	
	function test_restore_state_piece_vehicle()
	{
		$this->statePieceVehicle->delete();
		
		$this->visit('maintainers/state-piece-vehicles/create')
			->type($this->statePieceVehicle->name, 'name')
			->press('Guardar')
			->seeInDatabase('state_piece_vehicles', [
				'id'         => $this->statePieceVehicle->id,
				'name'       => $this->statePieceVehicle->name,
				'deleted_at' => null
			]);
	}
}
