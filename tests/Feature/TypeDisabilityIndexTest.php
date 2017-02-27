<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;

class TypeDisabilityIndexTest extends BrowserKitTestCase
{
    use DatabaseTransactions;

    public function setUp()
    {
        parent::setUp();
        $this->signIn();
    }

    public function test_url_type_disability()
    {
        $this->visit('maintainers/type-disabilities')
            ->assertResponseOk();
    }

    public function test_route_type_disability()
    {
        $this->visitRoute('type-disabilities.index')
            ->assertResponseOk();
    }

    public function test_index_type_disability()
    {
        $this->visit('maintainers/type-disabilities')
            ->seeInElement('h1', 'Listado de Discapacidades')
            ->seeInElement('a', 'Crear Nueva Discapacidad')
            ->see('Nombre');
    }
}
