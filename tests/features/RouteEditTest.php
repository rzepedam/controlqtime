<?php

use Controlqtime\Core\Entities\Route;
use Controlqtime\Core\Entities\Terminal;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class RouteEditTest extends TestCase
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
		$terminal = factory(Terminal::class)->create([
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
}
