<?php

use Controlqtime\Core\Entities\Fuel;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class FuelEditTest extends BrowserKitTestCase
{
    use DatabaseTransactions;

    protected $fuel;

    public function setUp()
    {
        parent::setUp();
        $this->signIn();
        $this->fuel = factory(Fuel::class)->create();
    }

    public function test_edit_fuel()
    {
        $this->visit('maintainers/fuels/'.$this->fuel->id.'/edit')
            ->see('Editar Combustible: <span class="text-primary">'.$this->fuel->id.'</span>')
            ->seeInField('#name', $this->fuel->name)
            ->see('Actualizar');
    }

    public function test_update_fuel()
    {
        $this->visit('maintainers/fuels/'.$this->fuel->id.'/edit')
            ->type('test', 'name')
            ->press('Actualizar')
            ->seeInDatabase('fuels', [
                'id'         => $this->fuel->id,
                'name'       => 'test',
                'deleted_at' => null,
            ]);
    }
}
