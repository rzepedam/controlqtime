<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;

class EngineCubicIndexTest extends TestCase
{
	use DatabaseTransactions;
	
	function setUp()
	{
		parent::setUp();
		$this->signIn();
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
	
}
