<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;

class StatePieceVehicleIndexTest extends BrowserKitTestCase
{
    use DatabaseTransactions;

    public function setUp()
    {
        parent::setUp();
        $this->signIn();
    }

    public function test_url_state_piece_vehicle()
    {
        $this->visit('maintainers/state-piece-vehicles')
            ->assertResponseOk();
    }

    public function test_route_state_piece_vehicle()
    {
        $this->visitRoute('state-piece-vehicles.index')
            ->assertResponseOk();
    }

    public function test_index_state_piece_vehicle()
    {
        $this->visit('maintainers/state-piece-vehicles')
            ->seeInElement('h1', 'Listado de Estado Pieza Vehículos')
            ->seeInElement('a', 'Crear Nuevo Estado')
            ->see('Nombre');
    }
}
