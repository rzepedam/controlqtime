<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;

class VehicleIndexTest extends BrowserKitTestCase
{
    use DatabaseTransactions;

    public function setUp()
    {
        parent::setUp();
        $this->signIn();
    }

    public function test_url_vehicle()
    {
        $this->visit('operations/vehicles')
            ->assertResponseOk();
    }

    public function test_route_vehicle()
    {
        $this->visitRoute('vehicles.index')
            ->assertResponseOk();
    }

    public function test_index_vehicle()
    {
        $this->visit('operations/vehicles')
            ->seeInElement('h1', 'Listado de Vehículos')
            ->seeInElement('th', 'Patente')
            ->seeInElement('th', 'Tipo')
            ->seeInElement('th', 'Modelo');
    }
}
