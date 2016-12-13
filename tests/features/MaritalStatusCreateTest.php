<?php

use Controlqtime\Core\Entities\MaritalStatus;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class MaritalStatusCreateTest extends TestCase
{
	use DatabaseTransactions;
	
	protected $maritalStatus;
	
	function setUp()
	{
		parent::setUp();
		$this->signIn();
		$this->maritalStatus = factory(MaritalStatus::class)->create();
	}
	
	function test_create_marital_status()
	{
		$this->visit('maintainers/marital-statuses/create')
			->seeInElement('h1', 'Crear Nuevo Estado Civil')
			->see('Nombre')
			->seeInElement('button', 'Guardar');
	}
	
	function test_store_marital_status()
	{
		$this->visit('maintainers/marital-statuses/create')
			->type('test', 'name')
			->press('Guardar')
			->seeInDatabase('marital_statuses', [
				'name'       => 'test',
				'deleted_at' => null
			]);
	}
}
