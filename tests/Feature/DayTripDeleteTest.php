<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;

class DayTripDeleteTest extends BrowserKitTestCase
{
    use DatabaseTransactions;

    protected $dayTrip;

    public function setUp()
    {
        parent::setUp();
        $this->signIn();
        $this->dayTrip = factory(\Controlqtime\Core\Entities\DayTrip::class)->create();
    }

    public function test_delete_day_trip()
    {
        $this->delete('maintainers/day-trips/'.$this->dayTrip->id)
            ->dontSeeInDatabase('day_trips', [
                'id'         => $this->dayTrip->id,
                'deleted_at' => null,
            ]);
    }
}
