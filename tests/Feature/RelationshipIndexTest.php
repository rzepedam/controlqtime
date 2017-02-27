<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;

class RelationshipIndexTest extends BrowserKitTestCase
{
    use DatabaseTransactions;

    public function setUp()
    {
        parent::setUp();
        $this->signIn();
    }

    public function test_url_relationship()
    {
        $this->visit('maintainers/relationships')
            ->assertResponseOk();
    }

    public function test_route_relationship()
    {
        $this->visitRoute('relationships.index')
            ->assertResponseOk();
    }

    public function test_index_relationship()
    {
        $this->visit('maintainers/relationships')
            ->seeInElement('h1', 'Listado de Relaciones Familiares')
            ->seeInElement('a', 'Crear Nueva Relación Familiar')
            ->see('Nombre');
    }
}
