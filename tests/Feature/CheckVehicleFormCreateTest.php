<?php

use Controlqtime\Core\Entities\Vehicle;
use Controlqtime\Core\Entities\PieceVehicle;
use Controlqtime\Core\Entities\StatePieceVehicle;
use Controlqtime\Core\Entities\MasterFormPieceVehicle;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CheckVehicleFormCreateTest extends BrowserKitTestCase
{
	use DatabaseTransactions;
	
	protected $masterFormPieceVehicle;
	
	protected $vehicle;
	
	protected $statePieceVehicle;
	
	protected $piece1;
	
	protected $piece2;
	
	protected $piece3;
	
	protected $piece4;
	
	protected $piece5;
	
	protected $piece6;
	
	protected $piece7;
	
	protected $piece8;
	
	function setUp()
	{
		parent::setUp();
		$this->signIn();
		$this->vehicle                = factory(Vehicle::class)->states('enable')->create();
		$this->masterFormPieceVehicle = factory(MasterFormPieceVehicle::class)->create(['id' => '1']);
		$this->statePieceVehicle      = factory(StatePieceVehicle::class, 3)->create();
		
		$this->piece1 = factory(PieceVehicle::class)->create(['name' => 'Herramientas']);
		$this->piece2 = factory(PieceVehicle::class)->create(['name' => 'Gata']);
		$this->piece3 = factory(PieceVehicle::class)->create(['name' => 'Batería']);
		$this->piece4 = factory(PieceVehicle::class)->create(['name' => 'Retrovisor']);
		$this->piece5 = factory(PieceVehicle::class)->create(['name' => 'Plumillas']);
		$this->piece6 = factory(PieceVehicle::class)->create(['name' => 'Asientos']);
		$this->piece7 = factory(PieceVehicle::class)->create(['name' => 'Neumáticos']);
		$this->piece8 = factory(PieceVehicle::class)->create(['name' => 'Pintura']);
		
		$this->masterFormPieceVehicle->pieceVehicles()->attach([
			0 => $this->piece1->id,
			1 => $this->piece2->id,
			2 => $this->piece3->id,
			3 => $this->piece4->id,
			4 => $this->piece5->id,
			5 => $this->piece6->id,
			6 => $this->piece7->id,
			7 => $this->piece8->id
		]);
	}
	
	function test_create_check_vehicle_form()
	{
		$this->visit('operations/check-vehicle-forms/create')
			->see('Seleccione Vehículo...')
			->see($this->vehicle->patent)
			->seeInElement('h4', 'Seleccione estado actual de las piezas listadas a continuación:')
			->seeInElement('th', 'Bueno')
			->seeInElement('th', 'Dañado')
			->seeInElement('th', 'Faltante')
			->seeInElement('td', $this->piece1->name)
			->seeInElement('td', $this->piece2->name)
			->seeInElement('td', $this->piece3->name)
			->seeInElement('td', $this->piece4->name)
			->seeInElement('td', $this->piece5->name)
			->seeInElement('td', $this->piece6->name)
			->seeInElement('td', $this->piece7->name)
			->seeInElement('td', $this->piece8->name)
			->seeInElement('a', 'Volver')
			->seeInElement('button', 'Guardar');
	}
	
}
