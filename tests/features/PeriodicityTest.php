<?php

use Controlqtime\Core\Entities\Periodicity;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class PeriodicityTest extends TestCase
{
	use DatabaseTransactions;
	
	protected $periodicity;
	
	function setUp()
	{
		parent::setUp();
		$this->signIn();
		$this->periodicity = factory(Periodicity::class)->create();
	}
	
	function test_url_periodicity()
	{
		$this->visit('maintainers/periodicities')
			->assertResponseOk();
	}
	
	function test_route_periodicity()
	{
		$this->visitRoute('periodicities.index')
			->assertResponseOk();
	}
	
	function test_index_periodicities()
	{
		$this->visit('maintainers/periodicities')
			->seeInElement('h1', 'Listado de Periocidades')
			->seeInElement('a', 'Crear Nueva Periocidad')
			->see('Nombre');
	}
	
	function test_create_periodicity()
	{
		$this->visit('maintainers/periodicities/create')
			->seeInElement('h1', 'Crear Nueva Periocidad')
			->see('Nombre')
			->seeInElement('button', 'Guardar');
	}
	
	function test_store_periodicity()
	{
		$this->visit('maintainers/periodicities/create')
			->type('test', 'name')
			->press('Guardar')
			->seeInDatabase('periodicities', [
				'name'       => 'test',
				'deleted_at' => null
			]);
	}
	
	function test_edit_periodicity()
	{
		$this->visit('maintainers/periodicities/' . $this->periodicity->id . '/edit')
			->seeInElement('h1', 'Editar Periocidad: <span class="text-primary">' . $this->periodicity->id . '</span>')
			->seeInField('#name', $this->periodicity->name)
			->seeInElement('button', 'Actualizar');
	}
	
	function test_update_periodicity()
	{
		$this->visit('maintainers/periodicities/' . $this->periodicity->id . '/edit')
			->type('test', 'name')
			->press('Actualizar')
			->seeInDatabase('periodicities', [
				'id'         => $this->periodicity->id,
				'name'       => 'test',
				'deleted_at' => null
			]);
	}
	
	function test_delete_periodicity()
	{
		$this->delete('maintainers/periodicities/' . $this->periodicity->id)
			->dontSeeInDatabase('periodicities', [
				'id'         => $this->periodicity->id,
				'name'       => $this->periodicity->name,
				'deleted_at' => null
			]);
	}
	
	function test_restore_periodicity()
	{
		$this->periodicity->delete();
		
		$this->visit('maintainers/periodicities/create')
			->type($this->periodicity->name, 'name')
			->press('Guardar')
			->seeInDatabase('periodicities', [
				'id'         => $this->periodicity->id,
				'name'       => $this->periodicity->name,
				'deleted_at' => null
			]);
	}
	
}
