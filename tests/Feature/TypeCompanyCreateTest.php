<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;

class TypeCompanyCreateTest extends BrowserKitTestCase
{
    use DatabaseTransactions;

    public function setUp()
    {
        parent::setUp();
        $this->signIn();
    }

    public function test_create_type_company()
    {
        $this->visit('maintainers/type-companies/create')
            ->seeInElement('h1', 'Crear Nuevo Tipo de Empresa')
            ->see('Nombre')
            ->seeInElement('button', 'Guardar');
    }

    public function test_store_type_company()
    {
        $this->visit('maintainers/type-companies/create')
            ->type('test', 'name')
            ->press('Guardar')
            ->seeInDatabase('type_companies', [
                'name'       => 'test',
                'deleted_at' => null,
            ]);
    }
}
