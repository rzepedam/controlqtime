<?php

use Controlqtime\Core\Entities\Area;
use Controlqtime\Core\Entities\Terminal;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AreaEditTest extends TestCase
{
	use DatabaseTransactions;
	
	protected $area;
	
	protected $terminal;
	
	function setUp()
	{
		parent::setUp();
		$this->signIn();
		$this->area     = factory(Area::class)->create();
		$this->terminal = factory(Terminal::class)->create();
	}
	
	function test_edit_area()
	{
		$this->visit('maintainers/areas/' . $this->area->id . '/edit')
			->see('Editar Área: <span class="text-primary">' . $this->area->id . '</span>')
			->seeInField('#name', $this->area->name)
			->seeInElement('#terminal_id', $this->area->terminal_id)
			->see('Actualizar')
			->assertResponseOk();
	}
	
	function test_update_area()
	{
		$id       = $this->area->id + 1;
		$terminal = factory(Terminal::class)->create([
			'id'   => $id,
			'name' => 'Terminal Norte'
		]);
		
		$this->visit('maintainers/areas/' . $this->area->id . '/edit')
			->type('test', 'name')
			->select($terminal->id, 'terminal_id')
			->press('Actualizar')
			->seeInDatabase('areas', [
				'id'          => $this->area->id,
				'name'        => 'test',
				'terminal_id' => $terminal->id,
				'deleted_at'  => null
			]);
	}
}
