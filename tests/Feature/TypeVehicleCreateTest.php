<?php

use Controlqtime\Core\Entities\EngineCubic;
use Controlqtime\Core\Entities\Weight;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TypeVehicleCreateTest extends BrowserKitTestCase
{
    use DatabaseTransactions;

    protected $engineCubic;

    protected $weight;

    public function setUp()
    {
        parent::setUp();
        $this->signIn();
        $this->engineCubic = factory(EngineCubic::class)->create();
        $this->weight = factory(Weight::class)->create();
    }

    public function test_create_type_vehicle()
    {
        $this->visit('maintainers/type-vehicles/create')
            ->seeInElement('h1', 'Crear Nuevo Tipo Vehículo')
            ->see('Nombre')
            ->seeInElement('#engine_cubic_id', $this->engineCubic->acr)
            ->seeInElement('#weight_id', $this->weight->acr)
            ->seeInElement('button', 'Guardar');
    }

    public function test_store_type_vehicle()
    {
        $this->visit('maintainers/type-vehicles/create')
            ->type('test', 'name')
            ->select($this->engineCubic->id, 'engine_cubic_id')
            ->select($this->weight->id, 'weight_id')
            ->press('Guardar')
            ->seeInDatabase('type_vehicles', [
                'name'            => 'test',
                'engine_cubic_id' => $this->engineCubic->id,
                'weight_id'       => $this->weight->id,
                'deleted_at'      => null,
            ]);
    }
}
