<?php

use Controlqtime\Core\Entities\Profession;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ProfessionTest extends TestCase
{
	use DatabaseTransactions;
	
	protected $profession;
	
	function setUp()
	{
		parent::setUp();
		$this->signIn();
		$this->profession = factory(Profession::class)->create();
	}
	
	function test_url_profession()
	{
		$this->visit('maintainers/professions')
			->assertResponseOk();
	}
	
	function test_route_profession()
	{
		$this->visitRoute('professions.index')
			->assertResponseOk();
	}
	
	function test_index_profession()
	{
		$this->visit('maintainers/professions')
			->seeInElement('h1', 'Listado de Profesiones')
			->seeInElement('a', 'Crear Nueva Profesión')
			->see('Nombre');
	}
	
	function test_create_profession()
	{
		$this->visit('maintainers/professions/create')
			->seeInElement('h1', 'Crear Nueva Profesión')
			->see('Nombre')
			->seeInElement('button', 'Guardar');
	}
	
	function test_store_profession()
	{
		$this->visit('maintainers/professions/create')
			->type('test', 'name')
			->press('Guardar')
			->seeInDatabase('professions', [
				'name'       => 'test',
				'deleted_at' => null
			]);
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
	
	function test_delete_profession()
	{
		$this->delete('maintainers/professions/' . $this->profession->id)
			->dontSeeInDatabase('professions', [
				'id'         => $this->profession->id,
				'name'       => $this->profession->name,
				'deleted_at' => null
			]);
	}
	
	function test_restore_profession()
	{
		$this->profession->delete();
		
		$this->visit('maintainers/professions/create')
			->type($this->profession->name, 'name')
			->press('Guardar')
			->seeInDatabase('professions', [
				'id'         => $this->profession->id,
				'name'       => $this->profession->name,
				'deleted_at' => null
			]);
	}
	
}
