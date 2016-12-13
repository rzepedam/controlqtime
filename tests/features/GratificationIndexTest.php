<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;

class GratificationIndexTest extends TestCase
{
	use DatabaseTransactions;
	
	protected $gratification;
	
	function setUp()
	{
		parent::setUp();
		$this->signIn();
	}
	
	function test_url_gratification()
	{
		$this->visit('maintainers/gratifications')
			->assertResponseOk();
	}
	
	function test_route_gratification()
	{
		$this->visitRoute('gratifications.index')
			->assertResponseOk();
	}
	
	function test_index_gratification()
	{
		$this->visit('maintainers/gratifications')
			->seeInElement('h1', 'Listado de Gratificaciones')
			->see('Crear Nueva Gratificación')
			->see('Nombre')
			->assertResponseOk();
	}
}
