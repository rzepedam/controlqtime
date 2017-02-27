<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;

class PositionCreateTest extends BrowserKitTestCase
{
    use DatabaseTransactions;

    public function setUp()
    {
        parent::setUp();
        $this->signIn();
    }

    public function test_create_position()
    {
        $this->visit('maintainers/positions/create')
            ->seeInElement('h1', 'Crear Nuevo Cargo')
            ->see('Nombre')
            ->seeInElement('button', 'Guardar');
    }

    public function test_store_position()
    {
        $this->visit('maintainers/positions/create')
            ->type('test', 'name')
            ->press('Guardar')
            ->seeInDatabase('positions', [
                'name'       => 'test',
                'deleted_at' => null,
            ]);
    }
}
