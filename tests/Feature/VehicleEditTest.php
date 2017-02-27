<?php

use Controlqtime\Core\Entities\Company;
use Controlqtime\Core\Entities\DateDocumentationVehicle;
use Controlqtime\Core\Entities\DetailBus;
use Controlqtime\Core\Entities\DetailVehicle;
use Controlqtime\Core\Entities\EngineCubic;
use Controlqtime\Core\Entities\Fuel;
use Controlqtime\Core\Entities\ModelVehicle;
use Controlqtime\Core\Entities\StateVehicle;
use Controlqtime\Core\Entities\Trademark;
use Controlqtime\Core\Entities\TypeVehicle;
use Controlqtime\Core\Entities\Vehicle;
use Controlqtime\Core\Entities\Weight;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class VehicleEditTest extends BrowserKitTestCase
{
    use DatabaseTransactions;

    protected $company;

    protected $vehicle;

    protected $detailVehicle;

    protected $detailBus;

    protected $engineCubic;

    protected $weight;

    protected $typeVehicleBus;

    protected $trademark;

    protected $modelVehicle;

    protected $stateVehicle;

    protected $fuel;

    protected $dateDocumentationVehicle;

    protected $typeVehicleAuto;

    protected $typeVehicleMoto;

    public function setUp()
    {
        parent::setUp();
        $this->signIn();

        $this->company = factory(Company::class)->states('enable')->create();

        $this->engineCubic = factory(EngineCubic::class)->create([
            'name' => 'Caballos de fuerza',
            'acr'  => 'hp',
        ]);

        $this->weight = factory(Weight::class)->create([
            'name' => 'Kilógramo',
            'acr'  => 'kg',
        ]);

        $this->typeVehicleBus = factory(TypeVehicle::class)->create([
            'id'              => 2,
            'name'            => 'Bus',
            'engine_cubic_id' => $this->engineCubic->id,
            'weight_id'       => $this->weight->id,
        ]);

        $this->typeVehicleAuto = factory(TypeVehicle::class)->create([
            'id'              => 1,
            'name'            => 'Auto',
            'engine_cubic_id' => $this->engineCubic->id,
            'weight_id'       => $this->weight->id,
        ]);

        $this->typeVehicleMoto = factory(TypeVehicle::class)->create([
            'id'              => 3,
            'name'            => 'Moto',
            'engine_cubic_id' => $this->engineCubic->id,
            'weight_id'       => $this->weight->id,
        ]);

        $this->trademark = factory(Trademark::class)->create([
            'name' => 'Mercedes Benz',
        ]);

        $this->modelVehicle = factory(ModelVehicle::class)->create([
            'name'         => 'Caio Foz',
            'trademark_id' => $this->trademark->id,
        ]);

        $this->stateVehicle = factory(StateVehicle::class)->create([
            'name' => 'Nuevo',
        ]);

        $this->fuel = factory(Fuel::class)->create([
            'name' => '93',
        ]);

        $this->vehicle = factory(Vehicle::class)->states('enable')->create([
            'type_vehicle_id'  => $this->typeVehicleBus->id,
            'model_vehicle_id' => $this->modelVehicle->id,
            'company_id'       => $this->company->id,
            'state_vehicle_id' => $this->stateVehicle->id,
            'acquisition_date' => '12-12-2016',
            'inscription_date' => '12-12-2016',
            'year'             => '2012',
            'patent'           => 'LP0908',
            'code'             => '1216876745735',
        ]);

        $this->detailVehicle = factory(DetailVehicle::class)->create([
            'vehicle_id'   => $this->vehicle->id,
            'color'        => 'Verde',
            'fuel_id'      => $this->fuel->id,
            'num_chasis'   => 'i4237623784621',
            'num_motor'    => '87263872648729',
            'km'           => '18000',
            'engine_cubic' => '2800',
            'weight'       => '15000',
            'tag'          => '908129473283627845',
            'obs'          => 'Descripción vehículo',
        ]);

        $this->dateDocumentationVehicle = factory(DateDocumentationVehicle::class)->create([
            'vehicle_id'            => $this->vehicle->id,
            'emission_padron'       => '08-01-2014',
            'expiration_padron'     => '01-17-2017',
            'emission_insurance'    => '10-17-2015',
            'expiration_insurance'  => '10-17-2018',
            'emission_permission'   => '03-29-2010',
            'expiration_permission' => '05-29-2022',
        ]);

        $this->detailBus = factory(DetailBus::class)->create([
            'detail_vehicle_id' => $this->detailVehicle->id,
            'carr'              => 'Marcopolo',
            'num_plazas'        => '78',
        ]);
    }

    public function test_edit_bus_vehicle()
    {
        $this->visit('operations/vehicles/'.$this->vehicle->id.'/edit')
            ->seeInElement('h1', 'Editar Vehículo: <span class="text-primary">'.$this->vehicle->id.'</span>')
            ->seeInElement('#type_vehicle_id', $this->vehicle->typeVehicle->name)
            ->seeInElement('#trademark_id', $this->vehicle->modelVehicle->trademark->name)
            ->seeInElement('#model_vehicle_id', $this->vehicle->modelVehicle->name)
            ->seeInField('#carr', $this->vehicle->detailVehicle->detailBus->carr)
            ->seeInElement('#company_id', $this->vehicle->company->firm_name)
            ->seeInElement('#state_vehicle_id', $this->vehicle->stateVehicle->name)
            ->seeInField('#acquisition_date', $this->vehicle->acquisition_date)
            ->seeInField('#inscription_date', $this->vehicle->inscription_date)
            ->seeInField('#color', $this->vehicle->detailVehicle->color)
            ->seeInElement('#year', $this->vehicle->year)
            ->seeInElement('#fuel_id', $this->vehicle->detailVehicle->fuel->name)
            ->seeInField('#patent', $this->vehicle->patent)
            ->seeInField('#num_chasis', $this->vehicle->detailVehicle->num_chasis)
            ->seeInField('#num_motor', $this->vehicle->detailVehicle->num_motor)
            ->seeInField('#km', $this->vehicle->detailVehicle->km)
            ->seeInField('#engine_cubic', $this->vehicle->detailVehicle->engine_cubic)
            ->seeInField('#weight', $this->vehicle->detailVehicle->weight)
            ->seeInField('#num_plazas', $this->vehicle->detailVehicle->detailBus->num_plazas)
            ->seeInField('#tag', $this->vehicle->detailVehicle->tag)
            ->seeInField('#code', $this->vehicle->code)
            ->seeInField('#obs', $this->vehicle->detailVehicle->obs)
            ->seeInField('#emission_padron', $this->vehicle->dateDocumentationVehicle->emission_padron)
            ->seeInField('#expiration_padron', $this->vehicle->dateDocumentationVehicle->expiration_padron)
            ->seeInField('#emission_insurance', $this->vehicle->dateDocumentationVehicle->emission_insurance)
            ->seeInField('#expiration_insurance', $this->vehicle->dateDocumentationVehicle->expiration_insurance)
            ->seeInField('#emission_permission', $this->vehicle->dateDocumentationVehicle->emission_permission)
            ->seeInField('#expiration_permission', $this->vehicle->dateDocumentationVehicle->expiration_permission)
            ->seeInElement('button', 'Actualizar')
            ->seeInElement('button', 'Eliminar');
    }

    public function test_edit_auto_vehicle()
    {
        $vehicleAuto = factory(Vehicle::class)->states('enable')->create([
            'type_vehicle_id'  => $this->typeVehicleAuto->id,
            'model_vehicle_id' => $this->modelVehicle->id,
            'company_id'       => $this->company->id,
            'state_vehicle_id' => $this->stateVehicle->id,
            'acquisition_date' => '12-12-2016',
            'inscription_date' => '12-12-2016',
            'year'             => '2012',
            'patent'           => 'AZ1090',
            'code'             => '1216876745735',
        ]);

        $detailVehicleAuto = factory(DetailVehicle::class)->create([
            'vehicle_id'   => $vehicleAuto->id,
            'color'        => 'Verde',
            'fuel_id'      => $this->fuel->id,
            'num_chasis'   => 'i4237623784621',
            'num_motor'    => '87263872648729',
            'km'           => '18000',
            'engine_cubic' => '2800',
            'weight'       => '15000',
            'tag'          => '908129473283627845',
            'obs'          => 'Descripción vehículo',
        ]);

        $dateDocumentationVehicleAuto = factory(DateDocumentationVehicle::class)->create([
            'vehicle_id'            => $vehicleAuto->id,
            'emission_padron'       => '08-01-2014',
            'expiration_padron'     => '01-17-2017',
            'emission_insurance'    => '10-17-2015',
            'expiration_insurance'  => '10-17-2018',
            'emission_permission'   => '03-29-2010',
            'expiration_permission' => '05-29-2022',
        ]);

        $this->visit('operations/vehicles/'.$vehicleAuto->id.'/edit')
            ->assertResponseOk();
    }

    public function test_edit_moto_vehicle()
    {
        $vehicleMoto = factory(Vehicle::class)->states('enable')->create([
            'type_vehicle_id'  => $this->typeVehicleMoto->id,
            'model_vehicle_id' => $this->modelVehicle->id,
            'company_id'       => $this->company->id,
            'state_vehicle_id' => $this->stateVehicle->id,
            'acquisition_date' => '12-12-2016',
            'inscription_date' => '12-12-2016',
            'year'             => '2012',
            'patent'           => 'PO1090',
            'code'             => '1216876745735',
        ]);

        $detailVehicleMoto = factory(DetailVehicle::class)->create([
            'vehicle_id'   => $vehicleMoto->id,
            'color'        => 'Verde',
            'fuel_id'      => $this->fuel->id,
            'num_chasis'   => 'i4237623784621',
            'num_motor'    => '87263872648729',
            'km'           => '18000',
            'engine_cubic' => '2800',
            'weight'       => '15000',
            'tag'          => '908129473283627845',
            'obs'          => 'Descripción vehículo',
        ]);

        $dateDocumentationVehicleMoto = factory(DateDocumentationVehicle::class)->create([
            'vehicle_id'            => $vehicleMoto->id,
            'emission_padron'       => '08-01-2014',
            'expiration_padron'     => '01-17-2017',
            'emission_insurance'    => '10-17-2015',
            'expiration_insurance'  => '10-17-2018',
            'emission_permission'   => '03-29-2010',
            'expiration_permission' => '05-29-2022',
        ]);

        $this->visit('operations/vehicles/'.$vehicleMoto->id.'/edit')
            ->assertResponseOk();
    }

    public function test_update_vehicle()
    {
        $modelVehicle = factory(ModelVehicle::class)->create([
            'name'         => 'Marcopolo Viale BRS',
            'trademark_id' => $this->trademark->id,
        ]);

        $company = factory(Company::class)->states('enable')->create();

        $stateVehicle = factory(StateVehicle::class)->create([
            'name' => 'Usado',
        ]);

        $fuel = factory(Fuel::class)->create([
            'name' => 'Diesel',
        ]);

        $this->visit('operations/vehicles/'.$this->vehicle->id.'/edit')
            ->select($modelVehicle->id, '#model_vehicle_id')
            ->type('Mercedes', 'carr')
            ->select($company->id, '#company_id')
            ->select($stateVehicle->id, '#state_vehicle_id')
            ->type('19-05-2015', 'acquisition_date')
            ->type('22-06-2015', 'inscription_date')
            ->type('Calipso anaranjado', 'color')
            ->select('2008', '#year')
            ->select($fuel->id, '#fuel_id')
            ->type('aa1904', 'patent')
            ->type('190832193878', 'num_chasis')
            ->type('738643278642', 'num_motor')
            ->type('12000', 'km')
            ->type('2400', 'engine_cubic')
            ->type('18000', 'weight')
            ->type('97', 'num_plazas')
            ->type('0918927473676372342784626', 'tag')
            ->type('13213447294678264237', 'code')
            ->type('Lorem ipsum dolor sit amet', 'obs')
            ->type('17-08-2013', 'emission_padron')
            ->type('31-07-2018', 'expiration_padron')
            ->type('27-02-2000', 'emission_insurance')
            ->type('02-04-2020', 'expiration_insurance')
            ->type('16-06-2016', 'emission_permission')
            ->type('01-01-2017', 'expiration_permission')
            ->press('Actualizar')
            ->seeInDatabase('vehicles', [
                'id'               => $this->vehicle->id,
                'user_id'          => $this->user->id,
                'type_vehicle_id'  => $this->vehicle->typeVehicle->id,
                'model_vehicle_id' => $modelVehicle->id,
                'company_id'       => $company->id,
                'state_vehicle_id' => $stateVehicle->id,
                'acquisition_date' => '2015-05-19',
                'inscription_date' => '2015-06-22',
                'year'             => '2008',
                'patent'           => 'AA1904',
                'code'             => '13213447294678264237', ])
            ->seeInDatabase('detail_vehicles', [
                'vehicle_id'   => $this->vehicle->id,
                'color'        => 'Calipso anaranjado',
                'fuel_id'      => $fuel->id,
                'num_chasis'   => '190832193878',
                'num_motor'    => '738643278642',
                'km'           => '12000',
                'engine_cubic' => '2400',
                'weight'       => '18000',
                'tag'          => '0918927473676372342784626',
                'obs'          => 'Lorem ipsum dolor sit amet', ])
            ->seeInDatabase('detail_buses', [
                'carr'       => 'Mercedes',
                'num_plazas' => '97', ])
            ->seeInDatabase('date_documentation_vehicles', [
                'emission_padron'       => '2013-08-17',
                'expiration_padron'     => '2018-07-31',
                'emission_insurance'    => '2000-02-27',
                'expiration_insurance'  => '2020-04-02',
                'emission_permission'   => '2016-06-16',
                'expiration_permission' => '2017-01-01',
            ]);
    }
}
