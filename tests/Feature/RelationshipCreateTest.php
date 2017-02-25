<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;

class RelationshipCreateTest extends BrowserKitTestCase
{
	use DatabaseTransactions;
	
	function setUp()
	{
		parent::setUp();
		$this->signIn();
	}
	
	function test_create_relationship()
	{
		$this->visit('maintainers/relationships/create')
			->seeInElement('h1', 'Crear Nueva Relación Familiar')
			->see('Nombre')
			->seeInElement('button', 'Guardar');
	}
	
	function test_store_relationship()
	{
		$this->visit('maintainers/relationships/create')
			->type('test', 'name')
			->press('Guardar')
			->seeInDatabase('relationships', [
				'name'       => 'test',
				'deleted_at' => null
			]);
	}
}
