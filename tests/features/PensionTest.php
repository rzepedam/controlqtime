<?php

use Controlqtime\Core\Entities\Pension;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class PensionTest extends TestCase
{
	use DatabaseTransactions;
	
	protected $pension;
	
	function setUp()
	{
		parent::setUp();
		$this->signIn();
		$this->pension = factory(Pension::class)->create();
	}
	
	function test_url_pension()
	{
		$this->visit('maintainers/pensions')
			->assertResponseOk();
	}
	
	function test_route_pension()
	{
		$this->visitRoute('pensions.index')
			->assertResponseOk();
	}
	
	function test_index_pension()
	{
		$this->visit('maintainers/pensions')
			->seeInElement('h1', 'Listado de Fondos de Pensión')
			->seeInElement('a', 'Crear Nuevo Fondo de Pensión')
			->see('Nombre');
	}
	
	function test_create_pension()
	{
		$this->visit('maintainers/pensions/create')
			->seeInElement('h1', 'Crear Nuevo Fondo de Pensión')
			->see('Nombre')
			->seeInElement('button', 'Guardar');
	}
	
	function test_store_pension()
	{
		$this->visit('maintainers/pensions/create')
			->type('test', 'name')
			->press('Guardar')
			->seeInDatabase('pensions', [
				'name'       => 'test',
				'deleted_at' => null
			]);
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
	
	function test_delete_pension()
	{
		$this->delete('maintainers/pensions/' . $this->pension->id)
			->dontSeeInDatabase('pensions', [
				'id'         => $this->pension->id,
				'name'       => $this->pension->name,
				'deleted_at' => null
			]);
	}
	
	function test_restore_pension()
	{
		$this->pension->delete();
		
		$this->visit('maintainers/pensions/create')
			->type($this->pension->name, 'name')
			->press('Guardar')
			->seeInDatabase('pensions', [
				'id'         => $this->pension->id,
				'name'       => $this->pension->name,
				'deleted_at' => null
			]);
		
	}
	
}
