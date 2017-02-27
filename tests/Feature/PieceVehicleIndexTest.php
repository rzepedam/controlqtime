<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;

class PieceVehicleIndexTest extends BrowserKitTestCase
{
    use DatabaseTransactions;

    public function setUp()
    {
        parent::setUp();
        $this->signIn();
    }

    public function test_url_piece_vehicle()
    {
        $this->visit('maintainers/piece-vehicles')
            ->assertResponseOk();
    }

    public function test_route_piece_vehicle()
    {
        $this->visitRoute('piece-vehicles.index')
            ->assertResponseOk();
    }

    public function test_index_piece_vehicle()
    {
        $this->visit('maintainers/piece-vehicles')
            ->seeInElement('h1', 'Listado Piezas de Vehículos')
            ->seeInElement('a', 'Crear Nueva Pieza Vehículo')
            ->see('Nombre');
    }
}
