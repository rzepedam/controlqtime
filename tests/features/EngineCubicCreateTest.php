<?php

use Controlqtime\Core\Entities\EngineCubic;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class EngineCubicCreateTest extends TestCase
{
	use DatabaseTransactions;
	
	protected $engineCubic;
	
	function setUp()
	{
		parent::setUp();
		$this->signIn();
		$this->engineCubic = factory(EngineCubic::class)->create([
			'name' => 'Caballos de fuerza',
			'acr'  => 'hp'
		]);
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
}
