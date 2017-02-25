<?php

use Controlqtime\Core\Entities\PieceVehicle;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class MasterFormPieceVehicleCreateTest extends BrowserKitTestCase
{
	use DatabaseTransactions;
	
	protected $piece;
	
	function setUp()
	{
		parent::setUp();
		$this->signIn();
		$this->piece = factory(PieceVehicle::class, 20)->create();
	}
	
	function test_create_master_form_piece_vehicle()
	{
		$piece1 = factory(PieceVehicle::class)->create(['name' => 'Herramientas']);
		$piece2 = factory(PieceVehicle::class)->create(['name' => 'Gata']);
		$piece3 = factory(PieceVehicle::class)->create(['name' => 'Batería']);
		$piece4 = factory(PieceVehicle::class)->create(['name' => 'Retrovisor']);
		$piece5 = factory(PieceVehicle::class)->create(['name' => 'Plumillas']);
		
		$this->visit('operations/master-form-piece-vehicles/create')
			->seeInElement('h1', 'Crear Nuevo Maestro de Formulario Pieza Vehículos')
			->see('Nombre')
			->seeInElement('h4', 'Seleccione piezas que desea incorporar')
			->dontSeeIsChecked('#piece0')
			->see('Herramientas')
			->dontSeeIsChecked('#piece1')
			->see('Gata')
			->dontSeeIsChecked('#piece2')
			->see('Batería')
			->dontSeeIsChecked('#piece3')
			->see('Retrovisor')
			->dontSeeIsChecked('#piece4')
			->see('Plumillas')
			->seeInElement('a', 'Volver')
			->seeInElement('button', 'Guardar');
	}
	
	function test_store_master_form_piece_vehicle()
	{
		$this->visit('operations/master-form-piece-vehicles/create')
			->submitForm('Guardar', [
				'name'         => 'Test Master Form',
				'piece_id[0]'  => $this->piece[0]->id,
				'piece_id[2]'  => $this->piece[2]->id,
				'piece_id[5]'  => $this->piece[5]->id,
				'piece_id[7]'  => $this->piece[7]->id,
				'piece_id[12]' => $this->piece[12]->id,
				'piece_id[15]' => $this->piece[15]->id,
				'piece_id[17]' => $this->piece[17]->id,
				'piece_id[18]' => $this->piece[18]->id])
			->seeInDatabase('master_form_piece_vehicles', [
				'name' => 'Test Master Form'])
			->seeInDatabase('master_form_piece_vehicle_piece_vehicle', [
				'piece_vehicle_id' => $this->piece[0]->id,
				'piece_vehicle_id' => $this->piece[2]->id,
				'piece_vehicle_id' => $this->piece[5]->id,
				'piece_vehicle_id' => $this->piece[7]->id,
				'piece_vehicle_id' => $this->piece[12]->id,
				'piece_vehicle_id' => $this->piece[15]->id,
				'piece_vehicle_id' => $this->piece[17]->id,
				'piece_vehicle_id' => $this->piece[18]->id
			]);
	}
}
