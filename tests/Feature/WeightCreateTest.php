<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;

class WeightCreateTest extends BrowserKitTestCase
{
	use DatabaseTransactions;
	
	function setUp()
	{
		parent::setUp();
		$this->signIn();
	}
	
	/** @test */
	function create_weight()
	{
		$this->visit('maintainers/measuring-units/weights/create')
			->seeInElement('h1', 'Crear Nueva Unidad')
			->see('Nombre')
			->see('Acrónimo')
			->seeInElement('button', 'Guardar');
	}
	
	/** @test */
	function store_weight()
	{
		$this->visit('maintainers/measuring-units/weights/create')
			->type('test', 'name')
			->type('tt', 'acr')
			->press('Guardar')
			->seeInDatabase('weights', [
				'name'       => 'test',
				'acr'        => 'tt',
				'deleted_at' => null
			]);
	}
}
