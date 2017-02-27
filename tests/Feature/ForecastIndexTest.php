<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;

class ForecastIndexTest extends BrowserKitTestCase
{
    use DatabaseTransactions;

    public function setUp()
    {
        parent::setUp();
        $this->signIn();
    }

    public function test_url_forecast()
    {
        $this->visit('maintainers/forecasts')
            ->assertResponseOk();
    }

    public function test_route_forecast()
    {
        $this->visitRoute('forecasts.index')
            ->assertResponseOk();
    }

    public function test_index_forecast()
    {
        $this->visit('maintainers/forecasts')
            ->see('Listado de Previsiones')
            ->see('Crear Nueva Previsión')
            ->see('Nombre')
            ->assertResponseOk();
    }
}
