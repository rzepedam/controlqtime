<?php

use Controlqtime\Core\Entities\Position;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class PositionEditTest extends TestCase
{
	use DatabaseTransactions;
	
	protected $position;
	
	function setUp()
	{
		parent::setUp();
		$this->signIn();
		$this->position = factory(Position::class)->create();
	}
	
	function test_edit_position()
	{
		$this->visit('maintainers/positions/' . $this->position->id . '/edit')
			->seeInElement('h1', 'Editar Cargo: <span class="text-primary">' . $this->position->id . '</span>')
			->seeInField('#name', $this->position->name)
			->seeInElement('button', 'Actualizar');
	}
	
	function test_update_position()
	{
		$this->visit('maintainers/positions/' . $this->position->id . '/edit')
			->type('test', 'name')
			->press('Actualizar')
			->seeInDatabase('positions', [
				'id'         => $this->position->id,
				'name'       => 'test',
				'deleted_at' => null
			]);
	}
}
