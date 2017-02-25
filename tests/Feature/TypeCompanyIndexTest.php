<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;

class TypeCompanyIndexTest extends BrowserKitTestCase
{
	use DatabaseTransactions;
	
	function setUp()
	{
		parent::setUp();
		$this->signIn();
	}
	
	function test_url_type_company()
	{
		$this->visit('maintainers/type-companies')
			->assertResponseOk();
	}
	
	function test_route_type_company()
	{
		$this->visitRoute('type-companies.index')
			->assertResponseOk();
	}
	
	function test_index_type_company()
	{
		$this->visit('maintainers/type-companies')
			->seeInElement('h1', 'Listado de Tipos de Empresa')
			->seeInElement('a', 'Crear Nuevo Tipo de Empresa')
			->see('Nombre');
	}
	
}
