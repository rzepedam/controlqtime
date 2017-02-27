<?php

use Controlqtime\Core\Entities\ModelVehicle;
use Controlqtime\Core\Entities\Trademark;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ModelVehicleEditTest extends BrowserKitTestCase
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

    public function test_edit_model_vehicle()
    {
        $this->visit('maintainers/model-vehicles/'.$this->modelVehicle->id.'/edit')
            ->seeInElement('h1', 'Editar Modelo de Vehículo: <span class="text-primary">'.$this->modelVehicle->id.'</span>')
            ->seeInField('#name', $this->modelVehicle->name)
            ->seeInElement('#trademark_id', $this->trademark->id)
            ->seeInElement('button', 'Actualizar');
    }

    public function test_update_model_vehicle()
    {
        $trademark = factory(Trademark::class)->create([
            'name' => 'test',
        ]);

        $this->visit('maintainers/model-vehicles/'.$this->modelVehicle->id.'/edit')
            ->type('test', 'name')
            ->select($trademark->id, '#trademark_id')
            ->press('Actualizar')
            ->seeInDatabase('model_vehicles', [
                'id'           => $this->modelVehicle->id,
                'name'         => 'test',
                'trademark_id' => $trademark->id,
                'deleted_at'   => null,
            ]);
    }
}
