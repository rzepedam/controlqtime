<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;

class TermAndObligatoryIndexTest extends BrowserKitTestCase
{
    use DatabaseTransactions;

    protected $term;

    public function setUp()
    {
        parent::setUp();
        $this->signIn();
    }

    public function test_url_term_and_obligatory()
    {
        $this->visit('maintainers/terms-and-obligatories')
            ->assertResponseOk();
    }

    public function test_route_term_and_obligatory()
    {
        $this->visitRoute('terms-and-obligatories.index')
            ->assertResponseOk();
    }

    public function test_index_term_and_obligatory()
    {
        $this->visit('maintainers/terms-and-obligatories')
            ->seeInElement('h1', 'Listado de Cláusulas y Obligaciones')
            ->seeInElement('a', 'Crear Nueva Cláusula y Obligación')
            ->seeInElement('th', 'Nombre')
            ->seeInElement('th', 'Predeterminar')
            ->seeInElement('a', 'Volver');
    }
}
