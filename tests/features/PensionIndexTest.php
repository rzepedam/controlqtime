<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;

class PensionIndexTest extends TestCase
{
	use DatabaseTransactions;
	
	function setUp()
	{
		parent::setUp();
		$this->signIn();
	}
	
	function test_url_pension()
	{
		$this->visit('maintainers/pensions')
			->assertResponseOk();
	}
	
	function test_route_pension()
	{
		$this->visitRoute('pensions.index')
			->assertResponseOk();
	}
	
	function test_index_pension()
	{
		$this->visit('maintainers/pensions')
			->seeInElement('h1', 'Listado de Fondos de Pensión')
			->seeInElement('a', 'Crear Nuevo Fondo de Pensión')
			->see('Nombre');
	}
}
