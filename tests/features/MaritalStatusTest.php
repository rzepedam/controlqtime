<?php

use Controlqtime\Core\Entities\MaritalStatus;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class MaritalStatusTest extends TestCase
{
	use DatabaseTransactions;
	
	protected $maritalStatus;
	
	function setUp()
	{
		parent::setUp();
		$this->signIn();
		$this->maritalStatus = factory(MaritalStatus::class)->create();
	}
	
	function test_url_marital_status()
	{
		$this->visit('maintainers/marital-statuses')
			->assertResponseOk();
	}
	
	function test_route_marital_status()
	{
		$this->visitRoute('marital-statuses.index')
			->assertResponseOk();
	}
	
	function test_index_marital_status()
	{
		$this->visit('maintainers/marital-statuses')
			->see('Listado de Estados Civiles')
			->seeInElement('a', 'Crear Nuevo Estado Civil')
			->see('Nombre');
	}
	
	function test_create_marital_status()
	{
		$this->visit('maintainers/marital-statuses/create')
			->seeInElement('h1', 'Crear Nuevo Estado Civil')
			->see('Nombre')
			->seeInElement('button', 'Guardar');
	}
	
	function test_store_marital_status()
	{
		$this->visit('maintainers/marital-statuses/create')
			->type('test', 'name')
			->press('Guardar')
			->seeInDatabase('marital_statuses', [
				'name'       => 'test',
				'deleted_at' => null
			]);
	}
	
	function test_edit_marital_status()
	{
		$this->visit('maintainers/marital-statuses/' . $this->maritalStatus->id . '/edit')
			->seeInElement('h1', 'Editar Estado Civil: <span class="text-primary">' . $this->maritalStatus->id . '</span>')
			->seeInField('#name', $this->maritalStatus->name)
			->seeInElement('button', 'Actualizar');
	}
	
	function test_update_marital_status()
	{
		$this->visit('maintainers/marital-statuses/' . $this->maritalStatus->id . '/edit')
			->type('test', 'name')
			->press('Actualizar')
			->seeInDatabase('marital_statuses', [
				'name'       => 'test',
				'deleted_at' => null
			]);
	}
	
	function test_delete_marital_status()
	{
		$this->delete('maintainers/marital-statuses/' . $this->maritalStatus->id)
			->dontSeeInDatabase('marital_statuses', [
				'id'         => $this->maritalStatus->id,
				'name'       => $this->maritalStatus->name,
				'deleted_at' => null
			]);
	}
	
	function test_restore_marital_status()
	{
		$this->maritalStatus->delete();
		
		$this->visit('maintainers/marital-statuses/create')
			->type($this->maritalStatus->name, 'name')
			->press('Guardar')
			->seeInDatabase('marital_statuses', [
				'id'         => $this->maritalStatus->id,
				'name'       => $this->maritalStatus->name,
				'deleted_at' => null
			]);
	}
}
