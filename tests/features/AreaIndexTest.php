<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;

class AreaIndexTest extends TestCase
{
	use DatabaseTransactions;
	
	function setUp()
	{
		parent::setUp();
		$this->signIn();
	}
	
	function test_url_area()
	{
		$this->visit('maintainers/areas')
			->assertResponseOk();
	}
	
	function test_route_area()
	{
		$this->visitRoute('areas.index')
			->assertResponseOk();
	}
	
	function test_index_area()
	{
		$this->visit('maintainers/areas')
			->see('Listado de Áreas')
			->see('Crear Nueva Área')
			->see('Nombre')
			->see('Terminal')
			->assertResponseOk();
	}
}
