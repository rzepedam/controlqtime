<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;

class PieceVehicleDeleteTest extends BrowserKitTestCase
{
    use DatabaseTransactions;

    protected $pieceVehicle;

    public function setUp()
    {
        parent::setUp();
        $this->signIn();
        $this->pieceVehicle = factory(\Controlqtime\Core\Entities\PieceVehicle::class)->create();
    }

    public function testExample()
    {
        $this->delete('maintainers/piece-vehicles/'.$this->pieceVehicle->id)
            ->dontSeeInDatabase('piece_vehicles', [
                'id'         => $this->pieceVehicle->id,
                'deleted_at' => null,
            ]);
    }
}
