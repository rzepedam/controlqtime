<?php

use Controlqtime\Core\Entities\Fuel;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class FuelCreateTest extends BrowserKitTestCase
{
    use DatabaseTransactions;

    protected $fuel;

    public function setUp()
    {
        parent::setUp();
        $this->signIn();
        $this->fuel = factory(Fuel::class)->create();
    }

    public function test_create_fuel()
    {
        $this->visit('maintainers/fuels/create')
            ->see('Crear Nuevo Combustible')
            ->see('Nombre')
            ->see('Guardar')
            ->assertResponseOk();
    }

    public function test_store_fuel()
    {
        $this->visit('maintainers/fuels/create')
            ->type('test', 'name')
            ->press('Guardar')
            ->seeInDatabase('fuels', [
                'name'       => 'test',
                'deleted_at' => null,
            ]);
    }
}
