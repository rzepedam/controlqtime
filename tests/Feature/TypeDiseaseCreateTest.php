<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;

class TypeDiseaseCreateTest extends BrowserKitTestCase
{
    use DatabaseTransactions;

    public function setUp()
    {
        parent::setUp();
        $this->signIn();
    }

    public function test_create_type_disease()
    {
        $this->visit('maintainers/type-diseases/create')
            ->seeInElement('h1', 'Crear Nueva Enfermedad')
            ->see('Nombre')
            ->seeInElement('button', 'Guardar');
    }

    public function test_store_type_disease()
    {
        $this->visit('maintainers/type-diseases/create')
            ->type('test', 'name')
            ->press('Guardar')
            ->seeInDatabase('type_diseases', [
                'name'       => 'test',
                'deleted_at' => null,
            ]);
    }
}
