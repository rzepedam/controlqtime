<?php

use Controlqtime\Core\Entities\Terminal;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class RouteCreateTest extends BrowserKitTestCase
{
    use DatabaseTransactions;

    protected $terminal;

    public function setUp()
    {
        parent::setUp();
        $this->signIn();
        $this->terminal = factory(Terminal::class)->create();
    }

    public function test_create_route()
    {
        $this->visit('maintainers/routes/create')
            ->seeInElement('h1', 'Crear Nuevo Recorrido')
            ->see('Nombre')
            ->seeInElement('#terminal_id', $this->terminal->name)
            ->seeInElement('button', 'Guardar');
    }

    public function test_store_route()
    {
        $this->visit('maintainers/routes/create')
            ->type('test', 'name')
            ->select($this->terminal->id, 'terminal_id')
            ->press('Guardar')
            ->seeInDatabase('routes', [
                'name'        => 'test',
                'terminal_id' => $this->terminal->id,
                'deleted_at'  => null,
            ]);
    }
}
