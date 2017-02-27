<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;

class TypeDiseaseIndexTest extends BrowserKitTestCase
{
    use DatabaseTransactions;

    public function setUp()
    {
        parent::setUp();
        $this->signIn();
    }

    public function test_url_type_disease()
    {
        $this->visit('maintainers/type-diseases')
            ->assertResponseOk();
    }

    public function test_route_type_disease()
    {
        $this->visitRoute('type-diseases.index')
            ->assertResponseOk();
    }

    public function test_index_type_disease()
    {
        $this->visit('maintainers/type-diseases')
            ->seeInElement('h1', 'Listado de Enfermedades')
            ->seeInElement('a', 'Crear Nueva Enfermedad')
            ->see('Nombre');
    }
}
