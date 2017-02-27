<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;

class CompanyIndexTest extends BrowserKitTestCase
{
    use DatabaseTransactions;

    public function setUp()
    {
        parent::setUp();
        $this->signIn();
    }

    /** @test */
    public function url_company()
    {
        $this->visit('administration/companies')
            ->assertResponseOk();
    }

    /** @test */
    public function route_company()
    {
        $this->visitRoute('companies.index')
            ->assertResponseOk();
    }

    /** @test */
    public function index_company()
    {
        $this->visit('administration/companies')
            ->seeInElement('h1', 'Listado de Empresas')
            ->seeInElement('a', 'Crear Nueva Empresa')
            ->seeInElement('th', 'Nombre')
            ->seeInElement('th', 'Email');
    }
}
