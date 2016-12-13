<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;

class PositionCreateTest extends TestCase
{
	use DatabaseTransactions;
	
	function setUp()
	{
		parent::setUp();
		$this->signIn();
	}
	
	function test_create_position()
	{
		$this->visit('maintainers/positions/create')
			->seeInElement('h1', 'Crear Nuevo Cargo')
			->see('Nombre')
			->seeInElement('button', 'Guardar');
	}
	
	function test_store_position()
	{
		$this->visit('maintainers/positions/create')
			->type('test', 'name')
			->press('Guardar')
			->seeInDatabase('positions', [
				'name'       => 'test',
				'deleted_at' => null
			]);
	}
}
