<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;

class CountryIndexTest extends BrowserKitTestCase
{
	use DatabaseTransactions;
	
	function setUp()
	{
		parent::setUp();
		$this->signIn();
	}
	
	function test_url_country()
	{
		$this->visit('maintainers/countries')
			->assertResponseOk();
	}
	
	function test_route_country()
	{
		$this->visitRoute('countries.index')
			->assertResponseOk();
	}
	
	function test_index_country()
	{
		$this->visit('maintainers/countries')
			->see('Listado de Países')
			->see('Crear Nuevo País')
			->see('Nombre')
			->assertResponseOk();
	}
}
