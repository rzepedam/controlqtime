<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;

class AreaIndexTest extends BrowserKitTestCase
{
	use DatabaseTransactions;
	
	function setUp()
	{
		parent::setUp();
		$this->signIn();
	}
	
	/** @test */
	function url_area()
	{
		$this->visit('maintainers/areas')
			->assertResponseOk();
	}
	
	/** @test */
	function route_area()
	{
		$this->visitRoute('areas.index')
			->assertResponseOk();
	}
	
	/** @test */
	function index_area()
	{
		$this->visit('maintainers/areas')
			->see('Listado de Áreas')
			->see('Crear Nueva Área')
			->see('Nombre')
			->see('Terminal')
			->assertResponseOk();
	}
}
