<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;

class ContractIndexTest extends BrowserKitTestCase
{
    use DatabaseTransactions;

    public function setUp()
    {
        parent::setUp();
        $this->signIn();
    }

    /** @test */
    public function url_contract()
    {
        $this->visit('human-resources/contracts')
            ->assertResponseOk();
    }

    /** @test */
    public function route_contract()
    {
        $this->visitRoute('contracts.index')
            ->assertResponseOk();
    }

    /** @test */
    public function index_contract()
    {
        $this->visit('human-resources/contracts')
            ->seeInElement('h1', 'Listado de Contratos')
            ->seeInElement('a', 'Crear Nuevo Contrato Laboral')
            ->seeInElement('th', 'Trabajador')
            ->seeInElement('th', 'Empresa')
            ->seeInElement('th', 'Inicio')
            ->seeInElement('a', 'Volver');
    }
}
