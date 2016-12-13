<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;

class LaborUnionIndexTest extends TestCase
{
	use DatabaseTransactions;
	
	protected $laborUnion;
	
	function setUp()
	{
		parent::setUp();
		$this->signIn();
	}
	
	function test_url_labor_union()
	{
		$this->visit('maintainers/labor-unions')
			->assertResponseOk();
	}
	
	function test_route_labor_union()
	{
		$this->visitRoute('labor-unions.index')
			->assertResponseOk();
	}
	
	function test_index_labor_union()
	{
		$this->visit('maintainers/labor-unions')
			->seeInElement('h1', 'Listado de Sindicatos')
			->seeInElement('a', 'Crear Nuevo Sindicato')
			->see('Nombre')
			->assertResponseOk();
	}
}
