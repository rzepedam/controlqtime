<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;

class ModelVehicleDeleteTest extends TestCase
{
	use DatabaseTransactions;
	
	protected $modelVehicle;
	
	function setUp()
	{
		parent::setUp();
		$this->signIn();
		$this->modelVehicle = factory(\Controlqtime\Core\Entities\ModelVehicle::class)->create();
	}
	
	function test_delete_model_vehicle()
	{
		$this->delete('maintainers/model-vehicles/' . $this->modelVehicle->id)
			->dontSeeInDatabase('model_vehicles', [
				'id'         => $this->modelVehicle->id,
				'deleted_at' => null
			]);
	}
}
