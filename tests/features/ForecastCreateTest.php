<?php

use Controlqtime\Core\Entities\Forecast;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ForecastCreateTest extends TestCase
{
	use DatabaseTransactions;
	
	protected $forecast;
	
	function setUp()
	{
		parent::setUp();
		$this->signIn();
		$this->forecast = factory(Forecast::class)->create();
	}
	
	function test_create_forecast()
	{
		$this->visit('maintainers/forecasts/create')
			->see('Crear Nueva Previsión')
			->see('Nombre')
			->see('Guardar')
			->assertResponseOk();
	}
	
	function test_store_forecast()
	{
		$this->visit('maintainers/forecasts/create')
			->type('test', 'name')
			->press('Guardar')
			->seeInDatabase('forecasts', [
				'name'       => 'test',
				'deleted_at' => null
			]);
	}
}
