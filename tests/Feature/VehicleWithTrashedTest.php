<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;

class VehicleWithTrashedTest extends BrowserKitTestCase
{
    use DatabaseTransactions;

    protected $detailBus;

    protected $typeVehicleCar;

    protected $typeVehicleBus;

    protected $vehicleCar;

    protected $vehicleBus;

    protected $detailVehicleCar;

    protected $detailVehicleBus;

    protected $dateDocumentationVehicleCar;

    protected $dateDocumentationVehicleBus;

    public function setUp()
    {
        parent::setUp();
        $this->signIn();

        $this->typeVehicleCar = factory(\Controlqtime\Core\Entities\TypeVehicle::class)->create([
            'id' => 1,
        ]);

        $this->typeVehicleBus = factory(\Controlqtime\Core\Entities\TypeVehicle::class)->create([
            'id' => 2,
        ]);

        $this->vehicleCar = factory(\Controlqtime\Core\Entities\Vehicle::class)->states('enable')->create([
            'type_vehicle_id' => $this->typeVehicleCar->id,
        ]);

        $this->vehicleBus = factory(\Controlqtime\Core\Entities\Vehicle::class)->states('enable')->create([
            'type_vehicle_id' => $this->typeVehicleBus->id,
        ]);

        $this->detailVehicleCar = factory(\Controlqtime\Core\Entities\DetailVehicle::class)->create([
            'vehicle_id' => $this->vehicleCar->id,
        ]);

        $this->detailVehicleBus = factory(\Controlqtime\Core\Entities\DetailVehicle::class)->create([
            'vehicle_id' => $this->vehicleBus->id,
        ]);

        $this->dateDocumentationVehicleCar = factory(\Controlqtime\Core\Entities\DateDocumentationVehicle::class)->create([
            'vehicle_id' => $this->vehicleCar->id,
        ]);

        $this->dateDocumentationVehicleBus = factory(\Controlqtime\Core\Entities\DateDocumentationVehicle::class)->create([
            'vehicle_id' => $this->vehicleBus->id,
        ]);

        $this->detailBus = factory(\Controlqtime\Core\Entities\DetailBus::class)->create([
            'detail_vehicle_id' => $this->detailVehicleBus->id,
        ]);
    }

    public function test_edit_vehicle_car_when_trademark_is_deleted()
    {
        $this->delete('maintainers/trademarks/'.$this->vehicleCar->modelVehicle->trademark->id);

        $this->visit('operations/vehicles/'.$this->vehicleCar->id.'/edit')
            ->seeInElement('#trademark_id', 'Seleccione Marca...');
    }

    public function test_edit_vehicle_bus_when_trademark_is_deleted()
    {
        $this->delete('maintainers/trademarks/'.$this->vehicleBus->modelVehicle->trademark->id);

        $this->visit('operations/vehicles/'.$this->vehicleBus->id.'/edit')
            ->seeInElement('#trademark_id', 'Seleccione Marca...');
    }

    public function test_edit_vehicle_car_when_model_vehicle_is_deleted()
    {
        $this->delete('maintainers/model-vehicles/'.$this->vehicleCar->modelVehicle->id);

        $this->visit('operations/vehicles/'.$this->vehicleCar->id.'/edit')
            ->seeInElement('#model_vehicle_id', 'Seleccione Modelo...');
    }

    public function test_edit_vehicle_bus_when_model_vehicle_is_deleted()
    {
        $this->delete('maintainers/model-vehicles/'.$this->vehicleBus->modelVehicle->id);

        $this->visit('operations/vehicles/'.$this->vehicleBus->id.'/edit')
            ->seeInElement('#model_vehicle_id', 'Seleccione Modelo...');
    }

    public function test_edit_vehicle_car_when_company_is_deleted()
    {
        $this->delete('administration/companies/'.$this->vehicleCar->company->id);

        $this->visit('operations/vehicles/'.$this->vehicleCar->id.'/edit')
            ->seeInElement('#company_id', 'Seleccione Empresa...');
    }

    public function test_edit_vehicle_bus_when_company_is_deleted()
    {
        $this->delete('administration/companies/'.$this->vehicleBus->company->id);

        $this->visit('operations/vehicles/'.$this->vehicleBus->id.'/edit')
            ->seeInElement('#company_id', 'Seleccione Empresa...');
    }

    public function test_edit_vehicle_car_when_fuel_is_deleted()
    {
        $this->delete('maintainers/fuels/'.$this->vehicleCar->detailVehicle->fuel->id);

        $this->visit('operations/vehicles/'.$this->vehicleCar->id.'/edit')
            ->seeInElement('#fuel_id', 'Seleccione Combustible');
    }

    public function test_edit_vehicle_bus_when_fuel_is_deleted()
    {
        $this->delete('maintainers/fuels/'.$this->vehicleBus->detailVehicle->fuel->id);

        $this->visit('operations/vehicles/'.$this->vehicleBus->id.'/edit')
            ->seeInElement('#fuel_id', 'Seleccione Combustible');
    }
}
