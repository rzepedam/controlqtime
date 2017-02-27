<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;

class ProfessionCreateTest extends BrowserKitTestCase
{
    use DatabaseTransactions;

    protected $profession;

    public function setUp()
    {
        parent::setUp();
        $this->signIn();
    }

    public function test_create_profession()
    {
        $this->visit('maintainers/professions/create')
            ->seeInElement('h1', 'Crear Nueva Profesión')
            ->see('Nombre')
            ->seeInElement('button', 'Guardar');
    }

    public function test_store_profession()
    {
        $this->visit('maintainers/professions/create')
            ->type('test', 'name')
            ->press('Guardar')
            ->seeInDatabase('professions', [
                'name'       => 'test',
                'deleted_at' => null,
            ]);
    }
}
