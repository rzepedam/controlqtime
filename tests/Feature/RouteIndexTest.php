<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;

class RouteIndexTest extends BrowserKitTestCase
{
    use DatabaseTransactions;

    public function setUp()
    {
        parent::setUp();
        $this->signIn();
    }

    public function test_url_route()
    {
        $this->visit('maintainers/routes')
            ->assertResponseOk();
    }

    public function test_route_route()
    {
        $this->visitRoute('routes.index')
            ->assertResponseOk();
    }

    public function test_index_route()
    {
        $this->visit('maintainers/routes')
            ->seeInElement('h1', 'Listado de Recorridos')
            ->seeInElement('a', 'Crear Nuevo Recorrido')
            ->see('Nombre')
            ->see('Terminal');
    }
}
