<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;

class TypeVehicleWithTrashedTest extends BrowserKitTestCase
{
    use DatabaseTransactions;

    protected $typeVehicle;

    public function setUp()
    {
        parent::setUp();
        $this->signIn();
        $this->typeVehicle = factory(\Controlqtime\Core\Entities\TypeVehicle::class)->create();
    }

    /** @test */
    public function edit_type_vehicle_when_weight_is_deleted()
    {
        $this->delete('maintainers/measuring-units/weights/'.$this->typeVehicle->weight->id);

        $this->visit('maintainers/type-vehicles/'.$this->typeVehicle->id.'/edit')
            ->seeInField('name', $this->typeVehicle->name)
            ->seeInElement('#weight_id', 'Seleccione Unidad Peso...')
            ->seeInElement('#engine_cubic_id', $this->typeVehicle->engineCubic->id);
    }

    /** @test */
    public function edit_type_vehicle_when_engine_cubic_is_deleted()
    {
        $this->delete('maintainers/measuring-units/engine-cubics/'.$this->typeVehicle->engineCubic->id);

        $this->visit('maintainers/type-vehicles/'.$this->typeVehicle->id.'/edit')
            ->seeInField('name', $this->typeVehicle->name)
            ->seeInElement('#weight_id', $this->typeVehicle->weight->id)
            ->seeInElement('#engine_cubic_id', 'Seleccione Unidad Cilindraje...');
    }

    /** @test */
    public function edit_type_vehicle_when_weight_and_engine_cubic_is_deleted()
    {
        $this->delete('maintainers/measuring-units/weights/'.$this->typeVehicle->weight->id);
        $this->delete('maintainers/measuring-units/engine-cubics/'.$this->typeVehicle->engineCubic->id);

        $this->visit('maintainers/type-vehicles/'.$this->typeVehicle->id.'/edit')
            ->seeInField('name', $this->typeVehicle->name)
            ->seeInElement('#weight_id', 'Seleccione Unidad Peso...')
            ->seeInElement('#engine_cubic_id', 'Seleccione Unidad Cilindraje...');
    }
}
