<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;

class TypeInstitutionCreateTest extends BrowserKitTestCase
{
    use DatabaseTransactions;

    public function setUp()
    {
        parent::setUp();
        $this->signIn();
    }

    public function test_create_type_institution()
    {
        $this->visit('maintainers/type-institutions/create')
            ->seeInElement('h1', 'Crear Nuevo Tipo de Institución')
            ->see('Nombre')
            ->seeInElement('button', 'Guardar');
    }

    public function test_store_type_institution()
    {
        $this->visit('maintainers/type-institutions/create')
            ->type('test', 'name')
            ->press('Guardar')
            ->seeInDatabase('type_institutions', [
                'name'       => 'test',
                'deleted_at' => null,
            ]);
    }
}
