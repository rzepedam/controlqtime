<?php

use Controlqtime\Core\Entities\PieceVehicle;
use Controlqtime\Core\Entities\MasterFormPieceVehicle;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class MasterFormPieceVehicleEditTest extends BrowserKitTestCase
{
	use DatabaseTransactions;
	
	protected $piece;
	
	protected $masterFormPieceVehicle;
	
	function setUp()
	{
		parent::setUp();
		$this->signIn();
		$this->masterFormPieceVehicle = factory(MasterFormPieceVehicle::class)->create();
		$this->piece                  = factory(PieceVehicle::class, 10)->create();
	}
	
	function test_edit_master_form_piece_vehicle()
	{
		$this->attachPieceVehicleToMasterForm();
		
		$this->visit('operations/master-form-piece-vehicles/' . $this->masterFormPieceVehicle->id . '/edit')
			->seeInElement('h1', 'Editar Maestro de Formulario Pieza Vehículos: <span class="text-primary">' . $this->masterFormPieceVehicle->id . '</span>')
			->seeInField('#name', $this->masterFormPieceVehicle->name)
			->seeIsChecked('#piece0')
			->dontSeeIsChecked('#piece1')
			->dontSeeIsChecked('#piece2')
			->seeIsChecked('#piece3')
			->dontSeeIsChecked('#piece4')
			->dontSeeIsChecked('#piece5')
			->seeIsChecked('#piece6')
			->dontSeeIsChecked('#piece7')
			->dontSeeIsChecked('#piece8')
			->seeIsChecked('#piece9')
			->seeInElement('a', 'Volver')
			->seeInElement('button', 'Actualizar');
	}
	
	private function attachPieceVehicleToMasterForm()
	{
		$pieces = [];
		foreach ( $this->piece as $key => $value )
		{
			if ( $key % 3 == 0 )
				array_push($pieces, $value->id);
		}
		
		$this->masterFormPieceVehicle->pieceVehicles()->attach($pieces);
	}
	
	function test_update_master_form_piece_vehicle()
	{
		$this->attachPieceVehicleToMasterForm();
		
		$this->visit('operations/master-form-piece-vehicles/' . $this->masterFormPieceVehicle->id . '/edit')
			->submitForm('Actualizar', [
				'name'        => 'New Master Form',
				'piece_id[7]' => $this->piece[7]->id])
			->seeInDatabase('master_form_piece_vehicles', [
				'id'   => $this->masterFormPieceVehicle->id,
				'name' => 'New Master Form'])
			->seeInDatabase('master_form_piece_vehicle_piece_vehicle', [
				'master_form_piece_vehicle_id' => $this->masterFormPieceVehicle->id,
				'piece_vehicle_id'             => $this->piece[3]->id])
			->seeInDatabase('master_form_piece_vehicle_piece_vehicle', [
				'master_form_piece_vehicle_id' => $this->masterFormPieceVehicle->id,
				'piece_vehicle_id'             => $this->piece[6]->id])
			->seeInDatabase('master_form_piece_vehicle_piece_vehicle', [
				'master_form_piece_vehicle_id' => $this->masterFormPieceVehicle->id,
				'piece_vehicle_id'             => $this->piece[7]->id])
			->seeInDatabase('master_form_piece_vehicle_piece_vehicle', [
				'master_form_piece_vehicle_id' => $this->masterFormPieceVehicle->id,
				'piece_vehicle_id'             => $this->piece[9]->id
			]);
	}
}
