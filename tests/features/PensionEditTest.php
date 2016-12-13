<?php

use Controlqtime\Core\Entities\Pension;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class PensionEditTest extends TestCase
{
	use DatabaseTransactions;
	
	protected $pension;
	
	function setUp()
	{
		parent::setUp();
		$this->signIn();
		$this->pension = factory(Pension::class)->create();
	}
	
	function test_edit_pension()
	{
		$this->visit('maintainers/pensions/' . $this->pension->id . '/edit')
			->seeInElement('h1', 'Editar Fondo de Pensión: <span class="text-primary">' . $this->pension->id . '</span>')
			->seeInField('#name', $this->pension->name)
			->seeInElement('button', 'Actualizar');
	}
	
	function test_update_pension()
	{
		$this->visit('maintainers/pensions/' . $this->pension->id . '/edit')
			->type('test', 'name')
			->press('Actualizar')
			->seeInDatabase('pensions', [
				'id'         => $this->pension->id,
				'name'       => 'test',
				'deleted_at' => null
			]);
	}
}
