<?php

use Controlqtime\Core\Entities\Trademark;
use Controlqtime\Core\Entities\ModelVehicle;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ModelVehicleTest extends TestCase
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
	
	function test_url_model_vehicle()
	{
		$this->visit('maintainers/model-vehicles')
			->assertResponseOk();
	}
	
	function test_route_model_vehicle()
	{
		$this->visitRoute('model-vehicles.index')
			->assertResponseOk();
	}
	
	function test_index_model_vehicle()
	{
		$this->visit('maintainers/model-vehicles')
			->seeInElement('h1', 'Listado de Modelo de Vehículos')
			->seeInElement('a', 'Crear Nuevo Modelo')
			->see('Modelo')
			->see('Marca');
	}
	
	function test_create_model_vehicle()
	{
		$this->visit('maintainers/model-vehicles/create')
			->seeInElement('h1', 'Crear Nuevo Modelo')
			->see('Modelo')
			->seeInElement('#trademark_id', $this->trademark->id)
			->seeInElement('button', 'Guardar');
	}
	
	function test_store_model_vehicle()
	{
		$this->visit('maintainers/model-vehicles/create')
			->type('test', 'name')
			->select($this->trademark->id, '#trademark_id')
			->press('Guardar')
			->seeInDatabase('model_vehicles', [
				'name'         => 'test',
				'trademark_id' => $this->trademark->id,
				'deleted_at'   => null
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
	
	function test_delete_model_vehicle()
	{
		$this->delete('maintainers/model-vehicles/' . $this->modelVehicle->id)
			->dontSeeInDatabase('model_vehicles', [
				'id'           => $this->modelVehicle->id,
				'name'         => $this->modelVehicle->name,
				'trademark_id' => $this->modelVehicle->trademark_id,
				'deleted_at'   => null
			]);
	}
	
	function test_restore_model_vehicle()
	{
		$this->modelVehicle->delete();
		
		$this->visit('maintainers/model-vehicles/create')
			->type($this->modelVehicle->name, 'name')
			->select($this->trademark->id, '#trademark_id')
			->press('Guardar')
			->seeInDatabase('model_vehicles', [
				'id'           => $this->modelVehicle->id,
				'name'         => 'Caio Foz',
				'trademark_id' => $this->trademark->id,
				'deleted_at'   => null
			]);
	}
}
