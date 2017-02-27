<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;

class ProfessionIndexTest extends BrowserKitTestCase
{
    use DatabaseTransactions;

    public function setUp()
    {
        parent::setUp();
        $this->signIn();
    }

    public function test_url_profession()
    {
        $this->visit('maintainers/professions')
            ->assertResponseOk();
    }

    public function test_route_profession()
    {
        $this->visitRoute('professions.index')
            ->assertResponseOk();
    }

    public function test_index_profession()
    {
        $this->visit('maintainers/professions')
            ->seeInElement('h1', 'Listado de Profesiones')
            ->seeInElement('a', 'Crear Nueva Profesión')
            ->see('Nombre');
    }
}
