<?php

use Controlqtime\Core\Entities\Trademark;
use Controlqtime\Core\Entities\ModelVehicle;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ModelVehicleEditTest extends TestCase
{
	use DatabaseTransactions;
	
	protected $modelVehicle;
	
	protected $trademark;
	
	function setUp()
	{
		parent::setUp();
		$this->signIn();
		$this->trademark    = factory(Trademark::class)->create([
			'name' => 'Mercedes Benz'
		]);
		$this->modelVehicle = factory(ModelVehicle::class)->create([
			'name'         => 'Caio Foz',
			'trademark_id' => $this->trademark->id,
		]);
	}
	
	function test_edit_model_vehicle()
	{
		$this->visit('maintainers/model-vehicles/' . $this->modelVehicle->id . '/edit')
			->seeInElement('h1', 'Editar Modelo de Vehículo: <span class="text-primary">' . $this->modelVehicle->id . '</span>')
			->seeInField('#name', $this->modelVehicle->name)
			->seeInElement('#trademark_id', $this->trademark->id)
			->seeInElement('button', 'Actualizar');
	}
	
	function test_update_model_vehicle()
	{
		$id        = $this->modelVehicle->id + 1;
		$trademark = factory(Trademark::class)->create([
			'id'   => $id,
			'name' => 'test',
		]);
		
		$this->visit('maintainers/model-vehicles/' . $this->modelVehicle->id . '/edit')
			->type('test', 'name')
			->select($trademark->id, '#trademark_id')
			->press('Actualizar')
			->seeInDatabase('model_vehicles', [
				'id'           => $this->modelVehicle->id,
				'name'         => 'test',
				'trademark_id' => $trademark->id,
				'deleted_at'   => null
			]);
	}
}
