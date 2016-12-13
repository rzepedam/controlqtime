<?php

use Controlqtime\Core\Entities\Fuel;
use Controlqtime\Core\Entities\Weight;
use Controlqtime\Core\Entities\Company;
use Controlqtime\Core\Entities\Vehicle;
use Controlqtime\Core\Entities\DetailBus;
use Controlqtime\Core\Entities\Trademark;
use Controlqtime\Core\Entities\EngineCubic;
use Controlqtime\Core\Entities\TypeVehicle;
use Controlqtime\Core\Entities\ModelVehicle;
use Controlqtime\Core\Entities\StateVehicle;
use Controlqtime\Core\Entities\DetailVehicle;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Controlqtime\Core\Entities\DateDocumentationVehicle;

class VehicleCreateTest extends TestCase
{
	use DatabaseTransactions;
	
	protected $company;
	
	protected $vehicle;
	
	protected $detailVehicle;
	
	protected $detailBus;
	
	protected $engineCubic;
	
	protected $weight;
	
	protected $typeVehicle;
	
	protected $trademark;
	
	protected $modelVehicle;
	
	protected $stateVehicle;
	
	protected $fuel;
	
	protected $dateDocumentationVehicle;
	
	function setUp()
	{
		parent::setUp();
		$this->signIn();
		
		$this->company = factory(Company::class)->states('enable')->create();
		
		$this->engineCubic = factory(EngineCubic::class)->create([
			'name' => 'Caballos de fuerza',
			'acr'  => 'hp'
		]);
		
		$this->weight = factory(Weight::class)->create([
			'name' => 'Kilógramo',
			'acr'  => 'kg',
		]);
		
		$this->typeVehicle = factory(TypeVehicle::class)->create([
			'id'              => 2,
			'name'            => 'Bus',
			'engine_cubic_id' => $this->engineCubic->id,
			'weight_id'       => $this->weight->id,
		]);
		
		$this->trademark = factory(Trademark::class)->create([
			'name' => 'Mercedes Benz'
		]);
		
		$this->modelVehicle = factory(ModelVehicle::class)->create([
			'name'         => 'Caio Foz',
			'trademark_id' => $this->trademark->id
		]);
		
		$this->stateVehicle = factory(StateVehicle::class)->create([
			'name' => 'Nuevo'
		]);
		
		$this->fuel = factory(Fuel::class)->create([
			'name' => '93'
		]);
		
		$this->vehicle = factory(Vehicle::class)->states('enable')->create([
			'type_vehicle_id'  => $this->typeVehicle->id,
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
			'obs'          => 'Descripción vehículo'
		]);
		
		$this->dateDocumentationVehicle = factory(DateDocumentationVehicle::class)->create([
			'vehicle_id'            => $this->vehicle->id,
			'emission_padron'       => '08-01-2014',
			'expiration_padron'     => '01-17-2017',
			'emission_insurance'    => '10-17-2015',
			'expiration_insurance'  => '10-17-2018',
			'emission_permission'   => '03-29-2010',
			'expiration_permission' => '05-29-2022'
		]);
		
		$this->detailBus = factory(DetailBus::class)->create([
			'detail_vehicle_id' => $this->detailVehicle->id,
			'carr'              => 'Marcopolo',
			'num_plazas'        => '78',
		]);
	}
	
	function test_create_vehicle()
	{
		$this->visit('operations/vehicles/create')
			->seeInElement('h1', 'Crear Nuevo Vehículo')
			->seeInElement('#type_vehicle_id', 'Bus')
			->seeInElement('#trademark_id', 'Mercedes Benz')
			->seeInElement('#model_vehicle_id', 'Caio Foz')
			->seeInElement('#company_id', $this->company->firm_name)
			->seeInElement('#state_vehicle_id', 'Nuevo')
			->seeInElement('#year', '2016')
			->seeInElement('#fuel_id', '93')
			->seeInElement('button', 'Guardar');
	}
	
	function test_store_vehicle()
	{
		$this->visit('operations/vehicles/create')
			->select($this->typeVehicle->id, '#type_vehicle_id')
			->select($this->trademark->id, '#trademark_id')
			->select($this->modelVehicle->id, '#model_vehicle_id')
			->type('Marcopolo', 'carr')
			->select($this->company->id, '#company_id')
			->select($this->stateVehicle->id, '#state_vehicle_id')
			->type('01-01-2010', 'acquisition_date')
			->type('10-01-2010', 'inscription_date')
			->type('Blanco Invierno', 'color')
			->select('2014', '#year')
			->select($this->fuel->id, '#fuel_id')
			->type('PL1090', 'patent')
			->type('9729382467578', 'num_chasis')
			->type('12321327483', 'num_motor')
			->type('16000', 'km')
			->type('2600', 'engine_cubic')
			->type('4500', 'weight')
			->type('129', 'num_plazas')
			->type('2749823657845', 'tag')
			->type('6754374575678', 'code')
			->type('Nuevo Vehículo ingresado', 'obs')
			->type('09-09-2013', 'emission_padron')
			->type('29-12-2002', 'expiration_padron')
			->type('03-11-2016', 'emission_insurance')
			->type('05-11-2026', 'expiration_insurance')
			->type('11-07-2014', 'emission_permission')
			->type('11-07-2018', 'expiration_permission')
			->press('Guardar')
			->seeInDatabase('vehicles', [
				'user_id'          => $this->user->id,
				'type_vehicle_id'  => $this->typeVehicle->id,
				'model_vehicle_id' => $this->modelVehicle->id,
				'company_id'       => $this->company->id,
				'state_vehicle_id' => $this->stateVehicle->id,
				'acquisition_date' => '2010-01-01',
				'inscription_date' => '2010-01-10',
				'year'             => '2014',
				'patent'           => 'PL1090',
				'code'             => '6754374575678',
				'deleted_at'       => null])
			->seeInDatabase('detail_vehicles', [
				'color'        => 'Blanco invierno',
				'fuel_id'      => $this->fuel->id,
				'num_chasis'   => '9729382467578',
				'num_motor'    => '12321327483',
				'km'           => '16000',
				'engine_cubic' => '2600',
				'weight'       => '4500',
				'tag'          => '2749823657845',
				'obs'          => 'Nuevo Vehículo ingresado',
				'deleted_at'   => null])
			->seeInDatabase('detail_buses', [
				'carr'       => 'Marcopolo',
				'num_plazas' => '129'])
			->seeInDatabase('date_documentation_vehicles', [
				'emission_padron'       => '2013-09-09',
				'expiration_padron'     => '2002-12-29',
				'emission_insurance'    => '2016-11-03',
				'expiration_insurance'  => '2026-11-05',
				'emission_permission'   => '2014-07-11',
				'expiration_permission' => '2018-07-11'
			]);
	}
}