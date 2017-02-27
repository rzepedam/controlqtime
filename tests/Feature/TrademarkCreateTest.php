<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;

class TrademarkCreateTest extends BrowserKitTestCase
{
    use DatabaseTransactions;

    public function setUp()
    {
        parent::setUp();
        $this->signIn();
    }

    public function test_create_trademark()
    {
        $this->visit('maintainers/trademarks/create')
            ->seeInElement('h1', 'Crear Nueva Marca')
            ->see('Nombre')
            ->seeInElement('button', 'Guardar');
    }

    public function test_store_trademark()
    {
        $this->visit('maintainers/trademarks/create')
            ->type('test', 'name')
            ->press('Guardar')
            ->seeInDatabase('trademarks', [
                'name'       => 'test',
                'deleted_at' => null,
            ]);
    }
}
