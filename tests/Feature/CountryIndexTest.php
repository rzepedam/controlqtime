<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;

class CountryIndexTest extends BrowserKitTestCase
{
    use DatabaseTransactions;

    public function setUp()
    {
        parent::setUp();
        $this->signIn();
    }

    public function test_url_country()
    {
        $this->visit('maintainers/countries')
            ->assertResponseOk();
    }

    public function test_route_country()
    {
        $this->visitRoute('countries.index')
            ->assertResponseOk();
    }

    public function test_index_country()
    {
        $this->visit('maintainers/countries')
            ->see('Listado de Países')
            ->see('Crear Nuevo País')
            ->see('Nombre')
            ->assertResponseOk();
    }
}
