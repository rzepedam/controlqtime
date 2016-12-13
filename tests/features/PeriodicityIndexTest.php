<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;

class PeriodicityIndexTest extends TestCase
{
	use DatabaseTransactions;
	
	function setUp()
	{
		parent::setUp();
		$this->signIn();
	}
	
	function test_url_periodicity()
	{
		$this->visit('maintainers/periodicities')
			->assertResponseOk();
	}
	
	function test_route_periodicity()
	{
		$this->visitRoute('periodicities.index')
			->assertResponseOk();
	}
	
	function test_index_periodicities()
	{
		$this->visit('maintainers/periodicities')
			->seeInElement('h1', 'Listado de Periocidades')
			->seeInElement('a', 'Crear Nueva Periocidad')
			->see('Nombre');
	}
}
