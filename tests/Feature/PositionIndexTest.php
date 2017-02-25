<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;

class PositionIndexTest extends BrowserKitTestCase
{
	use DatabaseTransactions;
	
	function setUp()
	{
		parent::setUp();
		$this->signIn();
	}
	
	function test_url_position()
	{
		$this->visit('maintainers/positions')
			->assertResponseOk();
	}
	
	function test_route_position()
	{
		$this->visitRoute('positions.index')
			->assertResponseOk();
	}
	
	function test_index_position()
	{
		$this->visit('maintainers/positions')
			->seeInElement('h1', 'Listado de Cargos')
			->seeInElement('a', 'Crear Nuevo Cargo')
			->see('Nombre');
	}
}
