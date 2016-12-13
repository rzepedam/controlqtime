<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;

class ProfessionIndexTest extends TestCase
{
	use DatabaseTransactions;
	
	function setUp()
	{
		parent::setUp();
		$this->signIn();
	}
	
	function test_url_profession()
	{
		$this->visit('maintainers/professions')
			->assertResponseOk();
	}
	
	function test_route_profession()
	{
		$this->visitRoute('professions.index')
			->assertResponseOk();
	}
	
	function test_index_profession()
	{
		$this->visit('maintainers/professions')
			->seeInElement('h1', 'Listado de Profesiones')
			->seeInElement('a', 'Crear Nueva Profesión')
			->see('Nombre');
	}
}
