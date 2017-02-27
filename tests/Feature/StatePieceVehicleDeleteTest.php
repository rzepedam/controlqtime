<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;

class StatePieceVehicleDeleteTest extends BrowserKitTestCase
{
    use DatabaseTransactions;

    protected $statePieceVehicle;

    public function setUp()
    {
        parent::setUp();
        $this->signIn();
        $this->statePieceVehicle = factory(\Controlqtime\Core\Entities\StatePieceVehicle::class)->create();
    }

    public function test_delete_state_piece_vehicle()
    {
        $this->delete('maintainers/state-piece-vehicles/'.$this->statePieceVehicle->id)
            ->dontSeeInDatabase('state_piece_vehicles', [
                'id'         => $this->statePieceVehicle->id,
                'deleted_at' => null,
            ]);
    }
}
