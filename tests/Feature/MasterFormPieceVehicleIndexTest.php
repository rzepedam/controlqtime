<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;

class MasterFormPieceVehicleIndexTest extends BrowserKitTestCase
{
    use DatabaseTransactions;

    public function setUp()
    {
        parent::setUp();
        $this->signIn();
    }

    public function test_url_master_form_piece_vehicle()
    {
        $this->visit('operations/master-form-piece-vehicles')
            ->assertResponseOk();
    }

    public function test_route_master_form_piece_vehicle()
    {
        $this->visitRoute('master-form-piece-vehicles.index')
            ->assertResponseOk();
    }

    public function test_index_master_form_piece_vehicle()
    {
        $this->visit('operations/master-form-piece-vehicles')
            ->seeInElement('h1', 'Listado de Maestros Formulario Pieza Vehículos')
            ->seeInElement('a', 'Crear Nuevo Maestro Formulario Pieza Vehículos')
            ->seeInElement('th', 'Id')
            ->seeInElement('th', 'Nombre')
            ->seeInElement('a', 'Volver');
    }
}
