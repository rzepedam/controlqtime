<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;

class ModelVehicleIndexTest extends BrowserKitTestCase
{
    use DatabaseTransactions;

    public function setUp()
    {
        parent::setUp();
        $this->signIn();
    }

    public function test_url_model_vehicle()
    {
        $this->visit('maintainers/model-vehicles')
            ->assertResponseOk();
    }

    public function test_route_model_vehicle()
    {
        $this->visitRoute('model-vehicles.index')
            ->assertResponseOk();
    }

    public function test_index_model_vehicle()
    {
        $this->visit('maintainers/model-vehicles')
            ->seeInElement('h1', 'Listado de Modelo de Vehículos')
            ->seeInElement('a', 'Crear Nuevo Modelo')
            ->see('Modelo')
            ->see('Marca');
    }
}
