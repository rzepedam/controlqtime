<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;

class CityIndexTest extends BrowserKitTestCase
{
	use DatabaseTransactions;
	
	function setUp()
	{
		parent::setUp();
		$this->signIn();
	}
	
	function test_url_city()
	{
		$this->visit('maintainers/cities')
			->assertResponseOk();
	}
	
	function test_route_city()
	{
		$this->visitRoute('cities.index')
			->assertResponseOk();
	}
	
	function test_index_city()
	{
		$this->visit('maintainers/cities')
			->see('Listado de Ciudades')
			->see('Nombre')
			->see('País')
			->assertResponseOk();
	}
}
