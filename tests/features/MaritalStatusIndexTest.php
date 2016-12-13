<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;

class MaritalStatusIndexTest extends TestCase
{
	use DatabaseTransactions;
	
	protected $maritalStatus;
	
	function setUp()
	{
		parent::setUp();
		$this->signIn();
	}
	
	function test_url_marital_status()
	{
		$this->visit('maintainers/marital-statuses')
			->assertResponseOk();
	}
	
	function test_route_marital_status()
	{
		$this->visitRoute('marital-statuses.index')
			->assertResponseOk();
	}
	
	function test_index_marital_status()
	{
		$this->visit('maintainers/marital-statuses')
			->see('Listado de Estados Civiles')
			->seeInElement('a', 'Crear Nuevo Estado Civil')
			->see('Nombre');
	}
}
