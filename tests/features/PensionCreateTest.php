<?php

use Controlqtime\Core\Entities\Pension;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class PensionCreateTest extends TestCase
{
	use DatabaseTransactions;
	
	protected $pension;
	
	function setUp()
	{
		parent::setUp();
		$this->signIn();
		$this->pension = factory(Pension::class)->create();
	}
	
	function test_create_pension()
	{
		$this->visit('maintainers/pensions/create')
			->seeInElement('h1', 'Crear Nuevo Fondo de Pensión')
			->see('Nombre')
			->seeInElement('button', 'Guardar');
	}
	
	function test_store_pension()
	{
		$this->visit('maintainers/pensions/create')
			->type('test', 'name')
			->press('Guardar')
			->seeInDatabase('pensions', [
				'name'       => 'test',
				'deleted_at' => null
			]);
	}
}
