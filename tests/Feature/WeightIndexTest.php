<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;

class WeightIndexTest extends BrowserKitTestCase
{
    use DatabaseTransactions;

    public function setUp()
    {
        parent::setUp();
        $this->signIn();
    }

    public function test_url_weight()
    {
        $this->visit('maintainers/measuring-units/weights')
            ->assertResponseOk();
    }

    public function test_route_weight()
    {
        $this->visitRoute('weights.index')
            ->assertResponseOk();
    }

    public function test_index_weight()
    {
        $this->visit('maintainers/measuring-units/weights')
            ->seeInElement('h1', 'Listado de Unidades de Medida para Peso')
            ->seeInElement('a', 'Crear Nueva Unidad')
            ->seeInElement('th', 'Nombre')
            ->seeInElement('th', 'Acrónimo');
    }
}
