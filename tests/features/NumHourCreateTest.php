<?php

use Controlqtime\Core\Entities\NumHour;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class NumHourCreateTest extends TestCase
{
	use DatabaseTransactions;
	
	protected $numHour;
	
	function setUp()
	{
		parent::setUp();
		$this->signIn();
		$this->numHour = factory(NumHour::class)->create();
	}
	
	function test_create_num_hour()
	{
		$this->visit('maintainers/num-hours/create')
			->seeInElement('h1', 'Crear Nuevo Nº de Horas')
			->see('Nombre')
			->seeInElement('button', 'Guardar');
	}
	
	function test_store_num_hour()
	{
		$this->visit('maintainers/num-hours/create')
			->type('000', 'name')
			->press('Guardar')
			->seeInDatabase('num_hours', [
				'name'       => '000',
				'deleted_at' => null
			]);
	}
}
