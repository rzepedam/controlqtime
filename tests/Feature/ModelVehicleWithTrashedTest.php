<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;

class ModelVehicleWithTrashedTest extends BrowserKitTestCase
{
	use DatabaseTransactions;
	
	protected $modelVehicle;
	
	function setUp()
	{
		parent::setUp();
		$this->signIn();
		$this->modelVehicle = factory(\Controlqtime\Core\Entities\ModelVehicle::class)->create();
	}
	
    function test_edit_model_vehicle_when_trademark_is_deleted()
    {
        $this->delete('maintainers/trademarks/' . $this->modelVehicle->trademark->id);
        
        $this->visit('maintainers/model-vehicles/' . $this->modelVehicle->id . '/edit')
	        ->seeInField('name', $this->modelVehicle->name)
	        ->seeInElement('#trademark_id', 'Seleccione Marca...');
    }
}
