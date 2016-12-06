<?php

use Controlqtime\Core\Entities\Route;
use Controlqtime\Core\Entities\Terminal;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class RouteTest extends TestCase
{
	use DatabaseTransactions;
	
	protected $terminal;
	
	protected $route;
	
	function setUp()
	{
		parent::setUp();
		$this->signIn();
		$this->terminal = factory(Terminal::class)->create();
		$this->route    = factory(Route::class)->create();
	}
	
	function test_url_route()
	{
		$this->visit('maintainers/routes')
			->assertResponseOk();
	}
	
	function test_route_route()
	{
		$this->visitRoute('routes.index')
			->assertResponseOk();
	}
	
	function test_index_route()
	{
		$this->visit('maintainers/routes')
			->seeInElement('h1', 'Listado de Recorridos')
			->seeInElement('a', 'Crear Nuevo Recorrido')
			->see('Nombre')
			->see('Terminal');
	}
	
	function test_create_route()
	{
		$this->visit('maintainers/routes/create')
			->seeInElement('h1', 'Crear Nuevo Recorrido')
			->see('Nombre')
			->seeInElement('#terminal_id', $this->terminal->name)
			->seeInElement('button', 'Guardar');
	}
	
	function test_store_route()
	{
		$this->visit('maintainers/routes/create')
			->type('test', 'name')
			->select($this->terminal->id, 'terminal_id')
			->press('Guardar')
			->seeInDatabase('routes', [
				'name'        => 'test',
				'terminal_id' => $this->terminal->id,
				'deleted_at'  => null
			]);
	}
	
	function test_edit_route()
	{
		$this->visit('maintainers/routes/' . $this->route->id . '/edit')
			->seeInElement('h1', 'Editar Recorrido: <span class="text-primary">' . $this->route->id . '</span>')
			->seeInField('#name', $this->route->name)
			->seeInElement('#terminal_id', $this->route->terminal->name)
			->seeInElement('button', 'Actualizar');
	}
	
	function test_update_route()
	{
		$id       = $this->terminal->id + 1;
		$terminal = factory(Terminal::class)->create([
			'id'   => $id,
			'name' => 'Terminal Norte'
		]);
		
		$this->visit('maintainers/routes/' . $this->route->id . '/edit')
			->type('F00', 'name')
			->select($terminal->id, 'terminal_id')
			->press('Actualizar')
			->seeInDatabase('routes', [
				'id'          => $this->route->id,
				'name'        => 'F00',
				'terminal_id' => $terminal->id,
				'deleted_at'  => null
			]);
	}
	
	function test_delete_route()
	{
		$this->delete('maintainers/routes/' . $this->route->id)
			->dontSeeInDatabase('routes', [
				'id'          => $this->route->id,
				'name'        => $this->route->name,
				'terminal_id' => $this->route->terminal_id,
				'deleted_at'  => null
			]);
	}
	
	function test_restore_route()
	{
		$this->route->delete();
		
		$this->visit('maintainers/routes/create')
			->type($this->route->name, 'name')
			->select($this->route->terminal->id, 'terminal_id')
			->press('Guardar')
			->seeInDatabase('routes', [
				'id'          => $this->route->id,
				'name'        => $this->route->name,
				'terminal_id' => $this->route->terminal_id,
				'deleted_at'  => null
			]);
	}
}
