<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;

class VisitIndexTest extends BrowserKitTestCase
{
    use DatabaseTransactions;

    public function setUp()
    {
        parent::setUp();
        $this->signIn();
    }

    /** @test */                                                                                                                                                                            
    public function url_visit()
    {
        $this->visit('sign-in-visits/visits')
            ->assertResponseOk();
    }

    /** @test */
    public function route_visit()
    {
        $this->visitRoute('visits.index')
            ->assertResponseOk();
    }

    /** @test */
    public function index_visit()
    {
        $this->visit('sign-in-visits/visits')
            ->seeInElement('h1', 'Listado de Visitas')
            ->seeInElement('a', 'Crear Nueva Visita')
            ->seeInElement('th', 'Tipo Visita')
            ->seeInElement('th', 'Rut')
            ->seeInElement('th', 'Empresa')
            ->seeInElement('a', 'Volver');
    }
}
