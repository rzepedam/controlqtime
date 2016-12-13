<?php

use Controlqtime\Core\Entities\Area;
use Controlqtime\Core\Entities\Terminal;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AreaCreateTest extends TestCase
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
	
	function test_create_area()
	{
		$this->visit('maintainers/areas/create')
			->seeInElement('h1', 'Crear Nueva Área')
			->see('Nombre')
			->seeInElement('#terminal_id', $this->terminal->name)
			->seeInElement('button', 'Guardar');
	}
	
	function test_store_area()
	{
		$this->visit('maintainers/areas/create')
			->type('test', 'name')
			->select($this->terminal->id, 'terminal_id')
			->press('Guardar')
			->seeInDatabase('areas', [
				'name'        => 'test',
				'terminal_id' => $this->terminal->id
			]);
	}
}
