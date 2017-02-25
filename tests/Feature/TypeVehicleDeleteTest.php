<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;

class TypeVehicleDeleteTest extends BrowserKitTestCase
{
	use DatabaseTransactions;
	
	protected $engineCubic;
	
	protected $typeVehicle;
	
	protected $weight;
	
	function setUp()
	{
		parent::setUp();
		$this->signIn();
		$this->engineCubic = factory(\Controlqtime\Core\Entities\EngineCubic::class)->create([
			'name' => 'Caballos de fuerza',
			'acr'  => 'hp'
		]);
		
		$this->weight = factory(\Controlqtime\Core\Entities\Weight::class)->create([
			'name' => 'Kilógramo',
			'acr'  => 'kg',
		]);
		
		$this->typeVehicle = factory(\Controlqtime\Core\Entities\TypeVehicle::class)->create([
			'name'            => 'Bus',
			'engine_cubic_id' => $this->engineCubic->id,
			'weight_id'       => $this->weight->id,
		]);
	}
	
	function test_delete_type_vehicle()
	{
		$this->delete('maintainers/type-vehicles/' . $this->typeVehicle->id)
			->dontSeeInDatabase('type_vehicles', [
				'id'         => $this->typeVehicle->id,
				'deleted_at' => null
			]);
	}
}
