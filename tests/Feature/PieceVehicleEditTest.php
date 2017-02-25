<?php

use Controlqtime\Core\Entities\PieceVehicle;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class PieceVehicleEditTest extends BrowserKitTestCase
{
	use DatabaseTransactions;
	
	protected $pieceVehicle;
	
	function setUp()
	{
		parent::setUp();
		$this->signIn();
		$this->pieceVehicle = factory(PieceVehicle::class)->create();
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
}
