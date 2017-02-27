<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;

class MutualityIndexTest extends BrowserKitTestCase
{
    use DatabaseTransactions;

    protected $mutuality;

    public function setUp()
    {
        parent::setUp();
        $this->signIn();
    }

    public function test_url_mutuality()
    {
        $this->visit('maintainers/mutualities')
            ->assertResponseOk();
    }

    public function test_route_mutuality()
    {
        $this->visitRoute('mutualities.index')
            ->assertResponseOk();
    }

    public function test_index_mutuality()
    {
        $this->visit('maintainers/mutualities')
            ->seeInElement('h1', 'Listado de Mutualidades')
            ->seeInElement('a', 'Crear Nueva Mutualidad')
            ->see('Nombre');
    }
}
