<?php

use Controlqtime\Core\Entities\Gratification;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class GratificationEditTest extends TestCase
{
	use DatabaseTransactions;
	
	protected $gratification;
	
	function setUp()
	{
		parent::setUp();
		$this->signIn();
		$this->gratification = factory(Gratification::class)->create();
	}
	
	function test_edit_gratification()
	{
		$this->visit('maintainers/gratifications/' . $this->gratification->id . '/edit')
			->seeInElement('h1', 'Editar Gratificación: <span class="text-primary">' . $this->gratification->id . '</span>')
			->seeInField('#name', $this->gratification->name)
			->see('Actualizar');
	}
	
	function test_update_gratification()
	{
		$this->visit('maintainers/gratifications/' . $this->gratification->id . '/edit')
			->type('test', 'name')
			->press('Actualizar')
			->seeInDatabase('gratifications', [
				'id'         => $this->gratification->id,
				'name'       => 'test',
				'deleted_at' => null
			]);
	}
}
