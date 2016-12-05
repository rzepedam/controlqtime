<?php

use Controlqtime\Core\Entities\Position;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class PositionTest extends TestCase
{
	use DatabaseTransactions;
	
	protected $position;
	
	function setUp()
	{
		parent::setUp();
		$this->signIn();
		$this->position = factory(Position::class)->create();
	}
	
	function test_url_position()
	{
		$this->visit('maintainers/positions')
			->assertResponseOk();
	}
	
	function test_route_position()
	{
		$this->visitRoute('positions.index')
			->assertResponseOk();
	}
	
	function test_index_position()
	{
		$this->visit('maintainers/positions')
			->seeInElement('h1', 'Listado de Cargos')
			->seeInElement('a', 'Crear Nuevo Cargo')
			->see('Nombre');
	}
	
	function test_create_position()
	{
		$this->visit('maintainers/positions/create')
			->seeInElement('h1', 'Crear Nuevo Cargo')
			->see('Nombre')
			->seeInElement('button', 'Guardar');
	}
	
	function test_store_position()
	{
		$this->visit('maintainers/positions/create')
			->type('test', 'name')
			->press('Guardar')
			->seeInDatabase('positions', [
				'name'       => 'test',
				'deleted_at' => null
			]);
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
	
	function test_delete_position()
	{
		$this->delete('maintainers/positions/' . $this->position->id)
			->dontSeeInDatabase('positions', [
				'id'         => $this->position->id,
				'name'       => $this->position->name,
				'deleted_at' => null
			]);
	}
	
	function test_restore_position()
	{
		$this->position->delete();
		
		$this->visit('maintainers/positions/create')
			->type($this->position->name, 'name')
			->press('Guardar')
			->seeInDatabase('positions', [
				'id'         => $this->position->id,
				'name'       => $this->position->name,
				'deleted_at' => null
			]);
	}
}
