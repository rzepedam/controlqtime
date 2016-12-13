<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;

class RouteIndexTest extends TestCase
{
	use DatabaseTransactions;
	
	function setUp()
	{
		parent::setUp();
		$this->signIn();
	}
	
	function test_url_route()
	{
		$this->visit('maintainers/routes')
			->assertResponseOk();
	}
	
	function test_route_route()
	{
		$this->visitRoute('routes.index')
			->assertResponseOk();
	}
	
	function test_index_route()
	{
		$this->visit('maintainers/routes')
			->seeInElement('h1', 'Listado de Recorridos')
			->seeInElement('a', 'Crear Nuevo Recorrido')
			->see('Nombre')
			->see('Terminal');
	}
}
