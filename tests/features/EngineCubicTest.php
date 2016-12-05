<?php

use Controlqtime\Core\Entities\EngineCubic;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class EngineCubicTest extends TestCase
{
	use DatabaseTransactions;
	
	protected $engineCubic;
	
	function setUp()
	{
		parent::setUp();
		$this->signIn();
		$this->engineCubic = factory(EngineCubic::class)->create();
	}
	
	function test_url_engine_cubic()
	{
		$this->visit('maintainers/measuring-units/engine-cubics')
			->assertResponseOk();
	}
	
	function test_route_engine_cubic()
	{
		$this->visitRoute('engine-cubics.index')
			->assertResponseOk();
	}
	
	function test_index_engine_cubic()
	{
		$this->visit('maintainers/measuring-units/engine-cubics')
			->see('Listado de Unidades de Medida para Cilindraje Motor')
			->see('Crear Nueva Unidad')
			->see('Nombre')
			->see('Acrónimo')
			->assertResponseOk();
	}
	
	function test_create_engine_cubic()
	{
		$this->visit('maintainers/measuring-units/engine-cubics/create')
			->see('Crear Nueva Unidad de Medida')
			->see('Nombre')
			->see('Acrónimo')
			->see('Guardar')
			->assertResponseOk();
	}
	
	function test_store_engine_cubic()
	{
		$this->visit('maintainers/measuring-units/engine-cubics/create')
			->type('test', 'name')
			->type('test', 'acr')
			->press('Guardar')
			->seeInDatabase('engine_cubics', [
				'name'       => 'test',
				'acr'        => 'test',
				'deleted_at' => null
			]);
	}
	
	function test_edit_engine_cubic()
	{
		$this->visit('maintainers/measuring-units/engine-cubics/' . $this->engineCubic->id . '/edit')
			->seeInField('#name', $this->engineCubic->name)
			->seeInField('#acr', $this->engineCubic->acr)
			->see('Actualizar');
	}
	
	function test_update_engine_cubic()
	{
		$this->visit('maintainers/measuring-units/engine-cubics/' . $this->engineCubic->id . '/edit')
			->type('test', 'name')
			->type('test', 'acr')
			->press('Actualizar')
			->seeInDatabase('engine_cubics', [
				'id'         => $this->engineCubic->id,
				'name'       => 'test',
				'acr'        => 'test',
				'deleted_at' => null
			]);
	}
	
	function test_restore_engine_cubic()
	{
		$this->engineCubic->delete();
		
		$this->visit('maintainers/measuring-units/engine-cubics/create')
			->type($this->engineCubic->name, 'name')
			->type($this->engineCubic->acr, 'acr')
			->press('Guardar')
			->seeInDatabase('engine_cubics', [
				'id'         => $this->engineCubic->id,
				'name'       => $this->engineCubic->name,
				'acr'        => $this->engineCubic->acr,
				'deleted_at' => null
			]);
	}
	
}
