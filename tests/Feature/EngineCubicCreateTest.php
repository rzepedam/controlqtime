<?php

use Controlqtime\Core\Entities\EngineCubic;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class EngineCubicCreateTest extends BrowserKitTestCase
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
	
	/** @test */
	function create_engine_cubic()
	{
		$this->visit('maintainers/measuring-units/engine-cubics/create')
			->see('Crear Nueva Unidad de Medida')
			->see('Nombre')
			->see('Acrónimo')
			->see('Guardar')
			->assertResponseOk();
	}
	
	/** @test */
	function store_engine_cubic()
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
