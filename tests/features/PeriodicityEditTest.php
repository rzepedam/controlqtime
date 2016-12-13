<?php

use Controlqtime\Core\Entities\Periodicity;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class PeriodicityEditTest extends TestCase
{
	use DatabaseTransactions;
	
	protected $periodicity;
	
	function setUp()
	{
		parent::setUp();
		$this->signIn();
		$this->periodicity = factory(Periodicity::class)->create();
	}
	
	function test_edit_periodicity()
	{
		$this->visit('maintainers/periodicities/' . $this->periodicity->id . '/edit')
			->seeInElement('h1', 'Editar Periocidad: <span class="text-primary">' . $this->periodicity->id . '</span>')
			->seeInField('#name', $this->periodicity->name)
			->seeInElement('button', 'Actualizar');
	}
	
	function test_update_periodicity()
	{
		$this->visit('maintainers/periodicities/' . $this->periodicity->id . '/edit')
			->type('test', 'name')
			->press('Actualizar')
			->seeInDatabase('periodicities', [
				'id'         => $this->periodicity->id,
				'name'       => 'test',
				'deleted_at' => null
			]);
	}
}
