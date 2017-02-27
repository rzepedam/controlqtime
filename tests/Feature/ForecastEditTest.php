<?php

use Controlqtime\Core\Entities\Forecast;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ForecastEditTest extends BrowserKitTestCase
{
    use DatabaseTransactions;

    protected $forecast;

    public function setUp()
    {
        parent::setUp();
        $this->signIn();
        $this->forecast = factory(Forecast::class)->create();
    }

    public function test_edit_forecast()
    {
        $this->visit('maintainers/forecasts/'.$this->forecast->id.'/edit')
            ->see('Editar Previsión: <span class="text-primary">'.$this->forecast->id.'</span>')
            ->seeInField('#name', $this->forecast->name)
            ->see('Actualizar');
    }

    public function test_update_forecast()
    {
        $this->visit('maintainers/forecasts/'.$this->forecast->id.'/edit')
            ->type('test', 'name')
            ->press('Actualizar')
            ->seeInDatabase('forecasts', [
                'id'         => $this->forecast->id,
                'name'       => 'test',
                'deleted_at' => null,
            ]);
    }
}
