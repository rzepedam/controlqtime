<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TrademarkCreateTest extends TestCase
{
	use DatabaseTransactions;
	
	function setUp()
	{
		parent::setUp();
		$this->signIn();
	}
	
	function test_create_trademark()
	{
		$this->visit('maintainers/trademarks/create')
			->seeInElement('h1', 'Crear Nueva Marca')
			->see('Nombre')
			->seeInElement('button', 'Guardar');
	}
	
	function test_store_trademark()
	{
		$this->visit('maintainers/trademarks/create')
			->type('test', 'name')
			->press('Guardar')
			->seeInDatabase('trademarks', [
				'name'       => 'test',
				'deleted_at' => null
			]);
	}
	
}
