<?php

use Controlqtime\Core\Entities\Area;
use Controlqtime\Core\Entities\Terminal;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AreaTest extends TestCase
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
	
	function test_url_area()
	{
		$this->visit('maintainers/areas')
			->assertResponseOk();
	}
	
	function test_route_area()
	{
		$this->visitRoute('areas.index')
			->assertResponseOk();
	}
	
	function test_index_area()
	{
		$this->visit('maintainers/areas')
			->see('Listado de Áreas')
			->see('Crear Nueva Área')
			->see('Nombre')
			->see('Terminal')
			->assertResponseOk();
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
				'terminal_id' => $this->terminal->id])
			->assertResponseOk();
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
	
	function test_delete_area()
	{
		$this->delete('maintainers/areas/' . $this->area->id)
			->dontSeeInDatabase('areas', [
				'id'          => $this->area->id,
				'name'        => $this->area->name,
				'terminal_id' => $this->area->terminal_id,
				'deleted_at'  => null
			]);
	}
	
	function test_restore_area()
	{
		$this->area->delete();
		
		$this->visit('maintainers/areas/create')
			->type($this->area->name, 'name')
			->select($this->area->id, 'terminal_id')
			->press('Guardar')
			->seeInDatabase('areas', [
				'id'          => $this->area->id,
				'name'        => $this->area->name,
				'terminal_id' => $this->area->terminal_id,
				'deleted_at'  => null
			]);
	}
}
