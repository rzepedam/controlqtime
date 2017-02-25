<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;

class EngineCubicIndexTest extends BrowserKitTestCase
{
	use DatabaseTransactions;
	
	function setUp()
	{
		parent::setUp();
		$this->signIn();
	}
	
	/** @test */
	function url_engine_cubic()
	{
		$this->visit('maintainers/measuring-units/engine-cubics')
			->assertResponseOk();
	}
	
	/** @test */
	function route_engine_cubic()
	{
		$this->visitRoute('engine-cubics.index')
			->assertResponseOk();
	}
	
	/** @test */
	function index_engine_cubic()
	{
		$this->visit('maintainers/measuring-units/engine-cubics')
			->see('Listado de Unidades de Medida para Cilindraje Motor')
			->see('Crear Nueva Unidad')
			->see('Nombre')
			->see('Acrónimo')
			->assertResponseOk();
	}
	
}
