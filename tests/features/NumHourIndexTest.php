<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;

class NumHourIndexTest extends TestCase
{
	use DatabaseTransactions;
	
	function setUp()
	{
		parent::setUp();
		$this->signIn();
	}
	
	function test_url_num_hour()
	{
		$this->visit('maintainers/num-hours')
			->assertResponseOk();
	}
	
	function test_route_num_hour()
	{
		$this->visitRoute('num-hours.index')
			->assertResponseOk();
	}
	
	function test_index_num_hour()
	{
		$this->visit('maintainers/num-hours')
			->seeInElement('h1', 'Listado de Nº de Horas')
			->seeInElement('a', 'Crear Nuevo Nº de Horas')
			->see('Nombre');
	}
}
