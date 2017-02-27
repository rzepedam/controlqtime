<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;

class InstitutionIndexTest extends BrowserKitTestCase
{
    use DatabaseTransactions;

    protected $institution;

    protected $typeInstitution;

    public function setUp()
    {
        parent::setUp();
        $this->signIn();
    }

    public function test_url_institution()
    {
        $this->visit('maintainers/institutions')
            ->assertResponseOk();
    }

    public function test_route_institution()
    {
        $this->visitRoute('institutions.index')
            ->assertResponseOk();
    }

    public function test_index_institution()
    {
        $this->visit('maintainers/institutions')
            ->seeInElement('h1', 'Listado de Instituciones')
            ->see('Crear Nueva Institución')
            ->see('Nombre')
            ->see('Tipo Institución');
    }
}
