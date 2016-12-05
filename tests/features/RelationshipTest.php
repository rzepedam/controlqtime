<?php

use Controlqtime\Core\Entities\Relationship;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class RelationshipTest extends TestCase
{
	use DatabaseTransactions;
	
	protected $relationship;
	
	function setUp()
	{
		parent::setUp();
		$this->signIn();
		$this->relationship = factory(Relationship::class)->create();
	}
	
	function test_url_relationship()
	{
		$this->visit('maintainers/relationships')
			->assertResponseOk();
	}
	
	function test_route_relationship()
	{
		$this->visitRoute('relationships.index')
			->assertResponseOk();
	}
	
	function test_index_relationship()
	{
		$this->visit('maintainers/relationships')
			->seeInElement('h1', 'Listado de Relaciones Familiares')
			->seeInElement('a', 'Crear Nueva Relación Familiar')
			->see('Nombre');
	}
	
	function test_create_relationship()
	{
		$this->visit('maintainers/relationships/create')
			->seeInElement('h1', 'Crear Nueva Relación Familiar')
			->see('Nombre')
			->seeInElement('button', 'Guardar');
	}
	
	function test_store_relationship()
	{
		$this->visit('maintainers/relationships/create')
			->type('test', 'name')
			->press('Guardar')
			->seeInDatabase('relationships', [
				'name'       => 'test',
				'deleted_at' => null
			]);
	}
	
	function test_edit_relationship()
	{
		$this->visit('maintainers/relationships/' . $this->relationship->id . '/edit')
			->seeInElement('h1', 'Editar Relación Familiar: <span class="text-primary">' . $this->relationship->id . '</span>')
			->seeInField('#name', $this->relationship->name)
			->seeInElement('button', 'Actualizar');
	}
	
	function test_update_relationship()
	{
		$this->visit('maintainers/relationships/' . $this->relationship->id . '/edit')
			->type('test', 'name')
			->press('Actualizar')
			->seeInDatabase('relationships', [
				'id'         => $this->relationship->id,
				'name'       => 'test',
				'deleted_at' => null
			]);
	}
	
	function test_delete_relationship()
	{
		$this->delete('maintainers/relationships/' . $this->relationship->id)
			->dontSeeInDatabase('relationships', [
				'id'         => $this->relationship->id,
				'name'       => $this->relationship->name,
				'deleted_at' => null
			]);
	}
	
	function test_restore_relationship()
	{
		$this->relationship->delete();
		
		$this->visit('maintainers/relationships/create')
			->type($this->relationship->name, 'name')
			->press('Guardar')
			->seeInDatabase('relationships', [
				'id'         => $this->relationship->id,
				'name'       => $this->relationship->name,
				'deleted_at' => null
			]);
	}
	
}
