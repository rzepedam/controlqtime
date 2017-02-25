<?php

use Controlqtime\Core\Entities\Profession;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ProfessionEditTest extends BrowserKitTestCase
{
	use DatabaseTransactions;
	
	protected $profession;
	
	function setUp()
	{
		parent::setUp();
		$this->signIn();
		$this->profession = factory(Profession::class)->create();
	}
	
	function test_edit_profession()
	{
		$this->visit('maintainers/professions/' . $this->profession->id . '/edit')
			->seeInElement('h1', 'Editar Profesión: <span class="text-primary">' . $this->profession->id . '</span>')
			->seeInField('#name', $this->profession->name)
			->seeInElement('button', 'Actualizar');
	}
	
	function test_update_profession()
	{
		$this->visit('maintainers/professions/' . $this->profession->id . '/edit')
			->type('test', 'name')
			->press('Actualizar')
			->seeInDatabase('professions', [
				'id'         => $this->profession->id,
				'name'       => 'test',
				'deleted_at' => null
			]);
	}
}
