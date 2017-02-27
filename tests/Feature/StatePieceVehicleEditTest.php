<?php

use Controlqtime\Core\Entities\StatePieceVehicle;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class StatePieceVehicleEditTest extends BrowserKitTestCase
{
    use DatabaseTransactions;

    protected $statePieceVehicle;

    public function setUp()
    {
        parent::setUp();
        $this->signIn();
        $this->statePieceVehicle = factory(StatePieceVehicle::class)->create();
    }

    public function test_edit_state_piece_vehicle()
    {
        $this->visit('maintainers/state-piece-vehicles/'.$this->statePieceVehicle->id.'/edit')
            ->seeInElement('h1', 'Editar Estado Pieza Vehículo: <span class="text-primary">'.$this->statePieceVehicle->id.'</span>')
            ->seeInField('#name', $this->statePieceVehicle->name)
            ->seeInElement('button', 'Actualizar');
    }

    public function test_update_state_piece_vehicle()
    {
        $this->visit('maintainers/state-piece-vehicles/'.$this->statePieceVehicle->id.'/edit')
            ->type('test', 'name')
            ->press('Actualizar')
            ->seeInDatabase('state_piece_vehicles', [
                'id'         => $this->statePieceVehicle->id,
                'name'       => 'test',
                'deleted_at' => null,
            ]);
    }
}
