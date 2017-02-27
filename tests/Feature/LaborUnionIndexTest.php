<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;

class LaborUnionIndexTest extends BrowserKitTestCase
{
    use DatabaseTransactions;

    protected $laborUnion;

    public function setUp()
    {
        parent::setUp();
        $this->signIn();
    }

    public function test_url_labor_union()
    {
        $this->visit('maintainers/labor-unions')
            ->assertResponseOk();
    }

    public function test_route_labor_union()
    {
        $this->visitRoute('labor-unions.index')
            ->assertResponseOk();
    }

    public function test_index_labor_union()
    {
        $this->visit('maintainers/labor-unions')
            ->seeInElement('h1', 'Listado de Sindicatos')
            ->seeInElement('a', 'Crear Nuevo Sindicato')
            ->see('Nombre')
            ->assertResponseOk();
    }
}
