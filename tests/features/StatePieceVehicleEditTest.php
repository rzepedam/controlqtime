<?php

use Controlqtime\Core\Entities\StatePieceVehicle;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class StatePieceVehicleEditTest extends TestCase
{
	use DatabaseTransactions;
	
	protected $statePieceVehicle;
	
	function setUp()
	{
		parent::setUp();
		$this->signIn();
		$this->statePieceVehicle = factory(StatePieceVehicle::class)->create();
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
}
