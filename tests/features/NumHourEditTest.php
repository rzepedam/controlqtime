<?php

use Controlqtime\Core\Entities\NumHour;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class NumHourEditTest extends TestCase
{
	use DatabaseTransactions;
	
	protected $numHour;
	
	function setUp()
	{
		parent::setUp();
		$this->signIn();
		$this->numHour = factory(NumHour::class)->create();
	}
	
	function test_edit_num_hour()
	{
		$this->visit('maintainers/num-hours/' . $this->numHour->id . '/edit')
			->seeInElement('h1', 'Editar Nº Hora: <span class="text-primary">' . $this->numHour->id . '</span>')
			->seeInField('#name', $this->numHour->name)
			->seeInElement('button', 'Actualizar');
	}
	
	function test_update_num_hour()
	{
		$this->visit('maintainers/num-hours/' . $this->numHour->id . '/edit')
			->type('001', 'name')
			->press('Actualizar')
			->seeInDatabase('num_hours', [
				'id'         => $this->numHour->id,
				'name'       => '001',
				'deleted_at' => null
			]);
	}
}
