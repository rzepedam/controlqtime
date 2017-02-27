<?php

use Carbon\Carbon;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class VehicleDeleteTest extends BrowserKitTestCase
{
    use DatabaseTransactions;

    protected $vehicle;

    protected $detailVehicle;

    protected $dateDocumentationVehicle;

    protected $detailBus;

    public function setUp()
    {
        parent::setUp();
        $this->signIn();

        $this->vehicle = factory(\Controlqtime\Core\Entities\Vehicle::class)->states('enable')->create([
            'type_vehicle_id' => 2,
        ]);

        $this->detailVehicle = factory(\Controlqtime\Core\Entities\DetailVehicle::class)->create([
            'vehicle_id'   => $this->vehicle->id,
            'km'           => '100000',
            'engine_cubic' => '2800',
            'weight'       => '5900',
        ]);

        $this->dateDocumentationVehicle = factory(\Controlqtime\Core\Entities\DateDocumentationVehicle::class)->create([
            'vehicle_id' => $this->vehicle->id,
        ]);

        $this->detailBus = factory(\Controlqtime\Core\Entities\DetailBus::class)->create([
            'detail_vehicle_id' => $this->detailVehicle->id,
        ]);
    }

    public function test_delete_url_vehicle()
    {
        $response = $this->call('DELETE', 'operations/vehicles/'.$this->vehicle->id);
        $this->assertEquals(302, $response->getStatusCode());
    }

    public function test_delete_vehicle()
    {
        $this->delete('operations/vehicles/'.$this->vehicle->id)
            ->dontSeeInDatabase('vehicles', [
                'id'         => $this->vehicle->id,
                'deleted_at' => null, ])
            ->seeInDatabase('detail_vehicles', [
                'vehicle_id'   => $this->vehicle->id,
                'fuel_id'      => $this->detailVehicle->fuel->id,
                'color'        => $this->detailVehicle->color,
                'num_chasis'   => $this->detailVehicle->num_chasis,
                'num_motor'    => $this->detailVehicle->num_motor,
                'km'           => '100000',
                'engine_cubic' => '2800',
                'weight'       => '5900',
                'tag'          => $this->detailVehicle->tag,
                'obs'          => $this->detailVehicle->obs, ])
            ->seeInDatabase('date_documentation_vehicles', [
                'vehicle_id'            => $this->vehicle->id,
                'emission_padron'       => Carbon::parse($this->dateDocumentationVehicle->emission_padron)->format('Y-m-d'),
                'expiration_padron'     => Carbon::parse($this->dateDocumentationVehicle->expiration_padron)->format('Y-m-d'),
                'emission_insurance'    => Carbon::parse($this->dateDocumentationVehicle->emission_insurance)->format('Y-m-d'),
                'expiration_insurance'  => Carbon::parse($this->dateDocumentationVehicle->expiration_insurance)->format('Y-m-d'),
                'emission_permission'   => Carbon::parse($this->dateDocumentationVehicle->emission_permission)->format('Y-m-d'),
                'expiration_permission' => Carbon::parse($this->dateDocumentationVehicle->expiration_permission)->format('Y-m-d'), ])
            ->seeInDatabase('detail_buses', [
                'detail_vehicle_id' => $this->detailVehicle->id,
                'carr'              => $this->detailBus->carr,
                'num_plazas'        => $this->detailBus->num_plazas,
            ]);
    }
}
