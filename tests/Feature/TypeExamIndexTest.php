<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;

class TypeExamIndexTest extends BrowserKitTestCase
{
    use DatabaseTransactions;

    public function setUp()
    {
        parent::setUp();
        $this->signIn();
    }

    public function test_url_type_exam()
    {
        $this->visit('maintainers/type-exams')
            ->assertResponseOk();
    }

    public function test_route_type_exam()
    {
        $this->visitRoute('type-exams.index')
            ->assertResponseOk();
    }

    public function test_index_type_exam()
    {
        $this->visit('maintainers/type-exams')
            ->seeInElement('h1', 'Listado de Exámenes Preocupacionales')
            ->seeInElement('a', 'Crear Nuevo Examen Preocupacional')
            ->see('Nombre');
    }
}
