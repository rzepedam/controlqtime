<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;

class TypeInstitutionIndexTest extends BrowserKitTestCase
{
    use DatabaseTransactions;

    public function setUp()
    {
        parent::setUp();
        $this->signIn();
    }

    public function test_url_type_institution()
    {
        $this->visit('maintainers/type-institutions')
            ->assertResponseOk();
    }

    public function test_route_type_institution()
    {
        $this->visitRoute('type-institutions.index')
            ->assertResponseOk();
    }

    public function test_index_type_institution()
    {
        $this->visit('maintainers/type-institutions')
            ->seeInElement('h1', 'Listado de Tipos de Institución')
            ->seeInElement('a', 'Crear Nuevo Tipo de Institución')
            ->see('Nombre');
    }
}
