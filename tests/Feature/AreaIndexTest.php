<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;

class AreaIndexTest extends BrowserKitTestCase
{
    use DatabaseTransactions;

    public function setUp()
    {
        parent::setUp();
        $this->signIn();
    }

    /** @test */
    public function url_area()
    {
        $this->visit('maintainers/areas')
            ->assertResponseOk();
    }

    /** @test */
    public function route_area()
    {
        $this->visitRoute('areas.index')
            ->assertResponseOk();
    }

    /** @test */
    public function index_area()
    {
        $this->visit('maintainers/areas')
            ->see('Listado de Áreas')
            ->see('Crear Nueva Área')
            ->see('Nombre')
            ->see('Terminal')
            ->assertResponseOk();
    }
}
