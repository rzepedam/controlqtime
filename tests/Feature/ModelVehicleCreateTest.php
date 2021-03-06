<?php

use Controlqtime\Core\Entities\ModelVehicle;
use Controlqtime\Core\Entities\Trademark;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ModelVehicleCreateTest extends BrowserKitTestCase
{
    use DatabaseTransactions;

    protected $modelVehicle;

    protected $trademark;

    public function setUp()
    {
        parent::setUp();
        $this->signIn();
        $this->trademark = factory(Trademark::class)->create([
            'name' => 'Mercedes Benz',
        ]);
        $this->modelVehicle = factory(ModelVehicle::class)->create([
            'name'         => 'Caio Foz',
            'trademark_id' => $this->trademark->id,
        ]);
    }

    public function test_create_model_vehicle()
    {
        $this->visit('maintainers/model-vehicles/create')
            ->seeInElement('h1', 'Crear Nuevo Modelo')
            ->see('Modelo')
            ->seeInElement('#trademark_id', $this->trademark->id)
            ->seeInElement('button', 'Guardar');
    }

    public function test_store_model_vehicle()
    {
        $this->visit('maintainers/model-vehicles/create')
            ->type('test', 'name')
            ->select($this->trademark->id, '#trademark_id')
            ->press('Guardar')
            ->seeInDatabase('model_vehicles', [
                'name'         => 'test',
                'trademark_id' => $this->trademark->id,
                'deleted_at'   => null,
            ]);
    }
}
