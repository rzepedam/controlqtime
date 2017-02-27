<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;

class TypeContractIndexTest extends BrowserKitTestCase
{
    use DatabaseTransactions;

    public function setUp()
    {
        parent::setUp();
        $this->signIn();
    }

    public function test_url_type_contract()
    {
        $this->visit('maintainers/type-contracts')
            ->assertResponseOk();
    }

    public function test_route_type_contract()
    {
        $this->visitRoute('type-contracts.index')
            ->assertResponseOk();
    }

    public function test_index_type_contract()
    {
        $this->visit('maintainers/type-contracts')
            ->seeInElement('h1', 'Listado de Tipos de Contrato')
            ->seeInElement('a', 'Crear Nuevo Tipo Contrato')
            ->see('Nombre')
            ->see('Duración');
    }
}
