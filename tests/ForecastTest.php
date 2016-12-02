<?php

use Controlqtime\Core\Entities\Forecast;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ForecastTest extends TestCase
{
	use DatabaseTransactions;
	
	protected $forecast;
	
	function setUp()
	{
		parent::setUp();
		$this->signIn();
		$this->forecast = factory(Forecast::class)->create();
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
	
	function test_edit_forecast()
	{
		$this->visit('maintainers/forecasts/' . $this->forecast->id . '/edit')
			->see('Editar Previsión: <span class="text-primary">' . $this->forecast->id . '</span>')
			->seeInField('#name', $this->forecast->name)
			->see('Actualizar');
	}
	
	function test_update_forecast()
	{
		$this->visit('maintainers/forecasts/' . $this->forecast->id . '/edit')
			->type('test', 'name')
			->press('Actualizar')
			->seeInDatabase('forecasts', [
				'id'         => $this->forecast->id,
				'name'       => 'test',
				'deleted_at' => null
			]);
	}
	
	function test_delete_forecast()
	{
		$this->delete('maintainers/forecasts/' . $this->forecast->id)
			->dontSeeInDatabase('forecasts', [
				'id'         => $this->forecast->id,
				'name'       => $this->forecast->name,
				'deleted_at' => null
			]);
	}
	
	function test_restore_forecast()
	{
		$this->forecast->delete();
		
		$this->visit('maintainers/forecasts/create')
			->type($this->forecast->name, 'name')
			->press('Guardar')
			->seeInDatabase('forecasts', [
				'id'         => $this->forecast->id,
				'name'       => $this->forecast->name,
				'deleted_at' => null
			]);
		
	}
	
}
