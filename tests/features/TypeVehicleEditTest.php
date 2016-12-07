<?php

use Controlqtime\Core\Entities\Weight;
use Controlqtime\Core\Entities\EngineCubic;
use Controlqtime\Core\Entities\TypeVehicle;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TypeVehicleEditTest extends TestCase
{
	use DatabaseTransactions;
	
	protected $engineCubic;
	
	protected $typeVehicle;
	
	protected $weight;
	
	function setUp()
	{
		parent::setUp();
		$this->signIn();
		$this->engineCubic = factory(EngineCubic::class)->create();
		$this->weight      = factory(Weight::class)->create();
		$this->typeVehicle = factory(TypeVehicle::class)->create();
	}
	
	function test_edit_type_vehicle()
	{
		$this->visit('maintainers/type-vehicles/' . $this->typeVehicle->id . '/edit')
			->seeInElement('h1', 'Editar Tipo de Vehículo: <span class="text-primary">' . $this->typeVehicle->id . '</span>')
			->seeInField('#name', $this->typeVehicle->name)
			->seeInElement('#weight_id', $this->typeVehicle->weight->acr)
			->seeInElement('#engine_cubic_id', $this->typeVehicle->engineCubic->acr)
			->seeInElement('button', 'Actualizar');
	}
	
	function test_update_type_vehicle()
	{
		$idWeight      = $this->weight->id + 1;
		$idEngineCubic = $this->engineCubic->id + 1;
		
		$weight = factory(Weight::class)->create([
			'id'   => $idWeight,
			'name' => 'Tonelada',
			'acr'  => 'ton'
		]);
		
		$engineCubic = factory(EngineCubic::class)->create([
			'id'   => $idEngineCubic,
			'name' => 'Caballos de Fuerza',
			'acr'  => 'hp'
		]);
		
		$this->visit('maintainers/type-vehicles/' . $this->typeVehicle->id . '/edit')
			->type('test', 'name')
			->select($weight->id, 'weight_id')
			->select($engineCubic->id, 'engine_cubic_id')
			->press('Actualizar')
			->seeInDatabase('type_vehicles', [
				'id'              => $this->typeVehicle->id,
				'weight_id'       => $weight->id,
				'engine_cubic_id' => $engineCubic->id,
				'name'            => 'test',
				'deleted_at'      => null
			]);
    }
}
