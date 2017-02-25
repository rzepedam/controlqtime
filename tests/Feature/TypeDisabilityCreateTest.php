<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;

class TypeDisabilityCreateTest extends BrowserKitTestCase
{
	use DatabaseTransactions;
	
	function setUp()
	{
		parent::setUp();
		$this->signIn();
	}
	
	function test_create_type_disability()
	{
		$this->visit('maintainers/type-disabilities/create')
			->seeInElement('h1', 'Crear Nueva Discapacidad')
			->see('Nombre')
			->seeInElement('button', 'Guardar');
	}
	
	function test_store_type_disability()
	{
		$this->visit('maintainers/type-disabilities/create')
			->type('test', 'name')
			->press('Guardar')
			->seeInDatabase('type_disabilities', [
				'name'       => 'test',
				'deleted_at' => null
			]);
	}
	
}
