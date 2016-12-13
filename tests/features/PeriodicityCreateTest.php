<?php

use Controlqtime\Core\Entities\Periodicity;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class PeriodicityCreateTest extends TestCase
{
	use DatabaseTransactions;
	
	protected $periodicity;
	
	function setUp()
	{
		parent::setUp();
		$this->signIn();
		$this->periodicity = factory(Periodicity::class)->create();
	}
	
	function test_create_periodicity()
	{
		$this->visit('maintainers/periodicities/create')
			->seeInElement('h1', 'Crear Nueva Periocidad')
			->see('Nombre')
			->seeInElement('button', 'Guardar');
	}
	
	function test_store_periodicity()
	{
		$this->visit('maintainers/periodicities/create')
			->type('test', 'name')
			->press('Guardar')
			->seeInDatabase('periodicities', [
				'name'       => 'test',
				'deleted_at' => null
			]);
	}
}
