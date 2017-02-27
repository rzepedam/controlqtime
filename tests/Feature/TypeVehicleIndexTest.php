<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;

class TypeVehicleIndexTest extends BrowserKitTestCase
{
    use DatabaseTransactions;

    public function setUp()
    {
        parent::setUp();
        $this->signIn();
    }

    public function test_url_type_vehicle()
    {
        $this->visit('maintainers/type-vehicles')
            ->assertResponseOk();
    }

    public function test_route_type_vehicle()
    {
        $this->visitRoute('type-vehicles.index')
            ->assertResponseOk();
    }

    public function test_index_type_vehicle()
    {
        $this->visit('maintainers/type-vehicles')
            ->seeInElement('h1', 'Listado de Tipos de Vehículos')
            ->seeInElement('a', 'Crear Nuevo Tipo de Vehículo')
            ->see('Nombre');
    }
}
