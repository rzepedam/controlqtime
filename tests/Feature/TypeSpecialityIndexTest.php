<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;

class TypeSpecialityIndexTest extends BrowserKitTestCase
{
    use DatabaseTransactions;

    public function setUp()
    {
        parent::setUp();
        $this->signIn();
    }

    public function test_url_type_speciality()
    {
        $this->visit('maintainers/type-specialities')
            ->assertResponseOk();
    }

    public function test_route_type_speciality()
    {
        $this->visitRoute('type-specialities.index')
            ->assertResponseOk();
    }

    public function test_index_type_speciality()
    {
        $this->visit('maintainers/type-specialities')
            ->seeInElement('h1', 'Listado de Especialidades')
            ->seeInElement('a', 'Crear Nueva Especialidad')
            ->see('Nombre');
    }
}
