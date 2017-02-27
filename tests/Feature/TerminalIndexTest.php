<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;

class TerminalIndexTest extends BrowserKitTestCase
{
    use DatabaseTransactions;

    public function setUp()
    {
        parent::setUp();
        $this->signIn();
    }

    public function test_url_terminal()
    {
        $this->visit('maintainers/terminals')
            ->assertResponseOk();
    }

    public function test_route_terminal()
    {
        $this->visitRoute('terminals.index')
            ->assertResponseOk();
    }

    public function test_index_terminal()
    {
        $this->visit('maintainers/terminals')
            ->seeInElement('h1', 'Listado de Terminales')
            ->seeInElement('a', 'Crear Nuevo Terminal')
            ->see('Nombre')
            ->see('Comuna');
    }
}
