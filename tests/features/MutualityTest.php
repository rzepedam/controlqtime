<?php

use Controlqtime\Core\Entities\Mutuality;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class MutualityTest extends TestCase
{
	use DatabaseTransactions;
	
	protected $mutuality;
	
	function setUp()
	{
		parent::setUp();
		$this->signIn();
		$this->mutuality = factory(Mutuality::class)->create();
	}
	
	function test_url_mutuality()
	{
		$this->visit('maintainers/mutualities')
			->assertResponseOk();
	}
	
	function test_route_mutuality()
	{
		$this->visitRoute('mutualities.index')
			->assertResponseOk();
	}
	
	function test_index_mutuality()
	{
		$this->visit('maintainers/mutualities')
			->seeInElement('h1', 'Listado de Mutualidades')
			->seeInElement('a', 'Crear Nueva Mutualidad')
			->see('Nombre');
	}
	
	function test_create_mutuality()
	{
		$this->visit('maintainers/mutualities/create')
			->see('Crear Nueva Mutualidad')
			->see('Nombre')
			->seeInElement('button', 'Guardar');
	}
	
	function test_store_mutuality()
	{
		$this->visit('maintainers/mutualities/create')
			->type('test', 'name')
			->press('Guardar')
			->seeInDatabase('mutualities', [
				'name'       => 'test',
				'deleted_at' => null
			]);
	}
	
	function test_edit_mutuality()
	{
		$this->visit('maintainers/mutualities/' . $this->mutuality->id . '/edit')
			->seeInElement('h1', 'Editar Mutualidad: <span class="text-primary">' . $this->mutuality->id . '</span>')
			->seeInField('name', $this->mutuality->name)
			->seeInElement('button', 'Actualizar');
	}
	
	function test_update_mutuality()
	{
		$this->visit('maintainers/mutualities/' . $this->mutuality->id . '/edit')
			->type('test', 'name')
			->press('Actualizar')
			->seeInDatabase('mutualities', [
				'id'         => $this->mutuality->id,
				'name'       => 'test',
				'deleted_at' => null
			]);
	}
	
	function test_delete_mutuality()
	{
		$this->delete('maintainers/mutualities/' . $this->mutuality->id)
			->dontSeeInDatabase('mutualities', [
				'id'         => $this->mutuality->id,
				'name'       => $this->mutuality->name,
				'deleted_at' => null
			]);
	}
	
	function test_restore_mutuality()
	{
		$this->mutuality->delete();
		
		$this->visit('maintainers/mutualities/create')
			->type($this->mutuality->name, 'name')
			->press('Guardar')
			->seeInDatabase('mutualities', [
				'id'         => $this->mutuality->id,
				'name'       => $this->mutuality->name,
				'deleted_at' => null
			]);
	}
}
