<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;

class FuelDeleteTest extends BrowserKitTestCase
{
    use DatabaseTransactions;

    protected $fuel;

    public function setUp()
    {
        parent::setUp();
        $this->signIn();
        $this->fuel = factory(\Controlqtime\Core\Entities\Fuel::class)->create();
    }

    public function test_delete_fuel()
    {
        $this->delete('maintainers/fuels/'.$this->fuel->id)
            ->dontSeeInDatabase('fuels', [
                'id'         => $this->fuel->id,
                'deleted_at' => null,
            ]);
    }
}
