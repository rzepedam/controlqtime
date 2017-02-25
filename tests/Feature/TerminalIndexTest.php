<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;

class TerminalIndexTest extends BrowserKitTestCase
{
	use DatabaseTransactions;
	
	function setUp()
	{
		parent::setUp();
		$this->signIn();
	}
	
	function test_url_terminal()
	{
		$this->visit('maintainers/terminals')
			->assertResponseOk();
	}
	
	function test_route_terminal()
	{
		$this->visitRoute('terminals.index')
			->assertResponseOk();
	}
	
	function test_index_terminal()
	{
		$this->visit('maintainers/terminals')
			->seeInElement('h1', 'Listado de Terminales')
			->seeInElement('a', 'Crear Nuevo Terminal')
			->see('Nombre')
			->see('Comuna');
	}
}
