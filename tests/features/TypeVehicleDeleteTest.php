<?php

use Controlqtime\Core\Entities\Weight;
use Controlqtime\Core\Entities\EngineCubic;
use Controlqtime\Core\Entities\TypeVehicle;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TypeVehicleDeleteTest extends TestCase
{
	use DatabaseTransactions;
	
	protected $engineCubic;
	
	protected $typeVehicle;
	
	protected $weight;
	
	function setUp()
	{
		parent::setUp();
		$this->signIn();
		$this->engineCubic = factory(EngineCubic::class)->create([
			'name' => 'Caballos de fuerza',
			'acr'  => 'hp'
		]);
		
		$this->weight = factory(Weight::class)->create([
			'name' => 'Kilógramo',
			'acr'  => 'kg',
		]);
		
		$this->typeVehicle = factory(TypeVehicle::class)->create([
			'name'            => 'Bus',
			'engine_cubic_id' => $this->engineCubic->id,
			'weight_id'       => $this->weight->id,
		]);
	}
	
	function test_delete_type_vehicle()
	{
		$this->delete('maintainers/type-vehicles/' . $this->typeVehicle->id)
			->dontSeeInDatabase('type_vehicles', [
				'id'              => $this->typeVehicle->id,
				'name'            => $this->typeVehicle->name,
				'weight_id'       => $this->weight->id,
				'engine_cubic_id' => $this->engineCubic->id,
				'deleted_at'      => null
			]);
	}
	
	function test_restore_type_vehicle()
	{
		$this->typeVehicle->delete();
		
		$this->visit('maintainers/type-vehicles/create')
			->type($this->typeVehicle->name, 'name')
			->select($this->typeVehicle->weight->id, 'weight_id')
			->select($this->typeVehicle->engineCubic->id, 'engine_cubic_id')
			->press('Guardar')
			->seeInDatabase('type_vehicles', [
				'id'              => $this->typeVehicle->id,
				'name'            => $this->typeVehicle->name,
				'weight_id'       => $this->typeVehicle->weight->id,
				'engine_cubic_id' => $this->typeVehicle->engineCubic->id,
				'deleted_at'      => null
			]);
	}
	
}
