<?php

use Controlqtime\Core\Entities\Mutuality;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class MutualityCreateTest extends BrowserKitTestCase
{
    use DatabaseTransactions;

    protected $mutuality;

    public function setUp()
    {
        parent::setUp();
        $this->signIn();
        $this->mutuality = factory(Mutuality::class)->create();
    }

    public function test_create_mutuality()
    {
        $this->visit('maintainers/mutualities/create')
            ->see('Crear Nueva Mutualidad')
            ->see('Nombre')
            ->seeInElement('button', 'Guardar');
    }

    public function test_store_mutuality()
    {
        $this->visit('maintainers/mutualities/create')
            ->type('test', 'name')
            ->press('Guardar')
            ->seeInDatabase('mutualities', [
                'name'       => 'test',
                'deleted_at' => null,
            ]);
    }
}
