<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;

class ForecastDeleteTest extends BrowserKitTestCase
{
    use DatabaseTransactions;

    protected $forecast;

    public function setUp()
    {
        parent::setUp();
        $this->signIn();
        $this->forecast = factory(\Controlqtime\Core\Entities\Forecast::class)->create();
    }

    public function test_delete_forecast()
    {
        $this->delete('maintainers/forecasts/'.$this->forecast->id)
            ->dontSeeInDatabase('forecasts', [
                'id'         => $this->forecast->id,
                'deleted_at' => null,
            ]);
    }
}
