<?php

use Controlqtime\Core\Entities\LaborUnion;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class LaborUnionTest extends TestCase
{
	use DatabaseTransactions;
	
	protected $laborUnion;
	
	function setUp()
	{
		parent::setUp();
		$this->signIn();
		$this->laborUnion = factory(LaborUnion::class)->create();
	}
	
	function test_url_labor_union()
	{
		$this->visit('maintainers/labor-unions')
			->assertResponseOk();
	}
	
	function test_route_labor_union()
	{
		$this->visitRoute('labor-unions.index')
			->assertResponseOk();
	}
	
	function test_index_labor_union()
	{
		$this->visit('maintainers/labor-unions')
			->seeInElement('h1', 'Listado de Sindicatos')
			->seeInElement('a', 'Crear Nuevo Sindicato')
			->see('Nombre')
			->assertResponseOk();
	}
	
	function test_create_labor_union()
	{
		$this->visit('maintainers/labor-unions/create')
			->seeInElement('h1', 'Crear Nuevo Sindicato')
			->see('Nombre')
			->seeInElement('button', 'Guardar');
	}
	
	function test_store_labor_union()
	{
		$this->visit('maintainers/labor-unions/create')
			->type('test', 'name')
			->press('Guardar')
			->seeInDatabase('labor_unions', [
				'name'       => 'test',
				'deleted_at' => null
			]);
	}
	
	function test_edit_labor_union()
	{
		$this->visit('maintainers/labor-unions/' . $this->laborUnion->id . '/edit')
			->seeInElement('h1', 'Editar Sindicato: <span class="text-primary">' . $this->laborUnion->id . '</span>')
			->seeInField('#name', $this->laborUnion->name)
			->seeInElement('button', 'Actualizar');
	}
	
	function test_update_labor_union()
	{
		$this->visit('maintainers/labor-unions/' . $this->laborUnion->id . '/edit')
			->type('test', 'name')
			->press('Actualizar')
			->seeInDatabase('labor_unions', [
				'id'         => $this->laborUnion->id,
				'name'       => 'test',
				'deleted_at' => null
			]);
	}
	
	function test_delete_labor_union()
	{
		$this->delete('maintainers/labor-unions/' . $this->laborUnion->id)
			->dontSeeInDatabase('labor_unions', [
				'id'         => $this->laborUnion->id,
				'name'       => $this->laborUnion->name,
				'deleted_at' => null
			]);
	}
	
	function test_restore_labor_union()
	{
		$this->laborUnion->delete();
		
		$this->visit('maintainers/labor-unions/create')
			->type($this->laborUnion->name, 'name')
			->press('Guardar')
			->seeInDatabase('labor_unions', [
				'id'         => $this->laborUnion->id,
				'name'       => $this->laborUnion->name,
				'deleted_at' => null
			]);
	}
}
