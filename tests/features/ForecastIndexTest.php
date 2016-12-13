<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;

class ForecastIndexTest extends TestCase
{
	use DatabaseTransactions;
	
	function setUp()
	{
		parent::setUp();
		$this->signIn();
	}
	
	function test_url_forecast()
	{
		$this->visit('maintainers/forecasts')
			->assertResponseOk();
	}
	
	function test_route_forecast()
	{
		$this->visitRoute('forecasts.index')
			->assertResponseOk();
	}
	
	function test_index_forecast()
	{
		$this->visit('maintainers/forecasts')
			->see('Listado de Previsiones')
			->see('Crear Nueva Previsión')
			->see('Nombre')
			->assertResponseOk();
	}
}
