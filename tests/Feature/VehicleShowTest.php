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
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class VehicleShowTest extends BrowserKitTestCase
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
		
		$this->company = factory(Company::class)->states('enable')->create([
			'firm_name' => 'Comercializadora de Productos Marinos y enlatados'
		]);
		
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
			'user_id'          => $this->user->id,
			'type_vehicle_id'  => $this->typeVehicle->id,
			'model_vehicle_id' => $this->modelVehicle->id,
			'company_id'       => $this->company->id,
			'state_vehicle_id' => $this->stateVehicle->id,
			'acquisition_date' => '12-11-2016',
			'inscription_date' => '12-12-2016',
			'year'             => '2012',
			'patent'           => 'LP0908',
			'code'             => '1216876745735',
			'created_at'       => '2016-12-12 17:35:02'
		]);
		
		$this->detailVehicle = factory(DetailVehicle::class)->create([
			'vehicle_id'   => $this->vehicle->id,
			'color'        => 'Verde',
			'fuel_id'      => $this->fuel->id,
			'num_chasis'   => 'i4237623784621',
			'num_motor'    => '872638726487',
			'km'           => '18000',
			'engine_cubic' => '2800',
			'weight'       => '15000',
			'tag'          => '908129473283627845',
			'obs'          => 'Descripción vehículo'
		]);
		
		$this->dateDocumentationVehicle = factory(DateDocumentationVehicle::class)->create([
			'vehicle_id'            => $this->vehicle->id,
			'emission_padron'       => '08-01-2014',
			'expiration_padron'     => '01-09-2017',
			'emission_insurance'    => '10-02-2015',
			'expiration_insurance'  => '10-12-2018',
			'emission_permission'   => '03-01-2010',
			'expiration_permission' => '05-10-2022'
		]);
		
		$this->detailBus = factory(DetailBus::class)->create([
			'detail_vehicle_id' => $this->detailVehicle->id,
			'carr'              => 'Marcopolo',
			'num_plazas'        => '78',
		]);
	}
	
	function test_show_vehicle()
	{
		$this->visit('operations/vehicles/' . $this->vehicle->id)
			->seeInElement('h1', 'Detalle Vehículo: <span class="text-primary">' . $this->vehicle->id . '</span>')
			->seeInElement('a', 'Información Vehículo')
			->seeInElement('td', 'Información Vehículo')
			->seeInElement('td', 'Información Documentación')
			->seeInElement('a', 'Documentos Adjuntos <span class="badge badge-warning up">0</span>')
			->seeInElement('.ribbon-inner', 'Activado')
			->seeInElement('.ribbon-inner', '1216876745735')
			->seeInElement('td', 'Bus')
			->seeInElement('td', 'Mercedes Benz')
			->seeInElement('td', 'Caio Foz')
			->seeInElement('td', 'Marcopolo')
			->seeInElement('td', 'Comercializadora de Productos Marinos y enlatados')
			->seeInElement('td', 'Nuevo')
			->seeInElement('td', 'sábado 12 noviembre 2016')
			->seeInElement('td', 'lunes 12 diciembre 2016')
			->seeInElement('td', '2012')
			->seeInElement('td', 'Verde')
			->seeInElement('td', 'LP0908')
			->seeInElement('td', '93')
			->seeInElement('td', 'i4237623784621')
			->seeInElement('td', '872638726487')
			->seeInElement('td', '18.000')
			->seeInElement('td', '2.800')
			->seeInElement('td', '15.000 kg')
			->seeInElement('td', '908129473283627845')
			->seeInElement('td', '78')
			->seeInElement('td', 'lunes 12 diciembre 2016 17:35:02 hrs - Raúl Elías Meza Mora')
			->seeInElement('td', '08-01-2014')
			->seeInElement('td', '01-09-2017')
			->seeInElement('td', '10-02-2015')
			->seeInElement('td', '10-12-2018')
			->seeInElement('td', '03-01-2010')
			->seeInElement('td', '05-10-2022')
			->seeInElement('a', 'Volver');
	}
}