<?php

use Controlqtime\Core\Entities\Gratification;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class GratificationTest extends TestCase
{
	use DatabaseTransactions;
	
	protected $gratification;
	
	function setUp()
	{
		parent::setUp();
		$this->signIn();
		$this->gratification = factory(Gratification::class)->create();
	}
	
	function test_url_gratification()
	{
		$this->visit('maintainers/gratifications')
			->assertResponseOk();
	}
	
	function test_route_gratification()
	{
		$this->visitRoute('gratifications.index')
			->assertResponseOk();
	}
	
	function test_index_gratification()
	{
		$this->visit('maintainers/gratifications')
			->seeInElement('h1', 'Listado de Gratificaciones')
			->see('Crear Nueva Gratificación')
			->see('Nombre')
			->assertResponseOk();
	}
	
	function test_create_gratification()
	{
		$this->visit('maintainers/gratifications/create')
			->seeInElement('h1', 'Crear Nueva Gratificación')
			->see('Nombre')
			->see('Guardar')
			->assertResponseOk();
	}
	
	function test_store_gratification()
	{
		$this->visit('maintainers/gratifications/create')
			->type('test', 'name')
			->press('Guardar')
			->seeInDatabase('gratifications', [
				'name'       => 'test',
				'deleted_at' => null
			]);
	}
	
	function test_edit_gratification()
	{
		$this->visit('maintainers/gratifications/' . $this->gratification->id . '/edit')
			->seeInElement('h1', 'Editar Gratificación: <span class="text-primary">' . $this->gratification->id . '</span>')
			->seeInField('#name', $this->gratification->name)
			->see('Actualizar');
	}
	
	function test_update_gratification()
	{
		$this->visit('maintainers/gratifications/' . $this->gratification->id . '/edit')
			->type('test', 'name')
			->press('Actualizar')
			->seeInDatabase('gratifications', [
				'id'         => $this->gratification->id,
				'name'       => 'test',
				'deleted_at' => null
			]);
	}
	
	function test_delete_gratification()
	{
		$this->delete('maintainers/gratifications/' . $this->gratification->id)
			->dontSeeInDatabase('gratifications', [
				'id'         => $this->gratification->id,
				'name'       => $this->gratification->name,
				'deleted_at' => null
			]);
	}
	
	function test_restore_gratification()
	{
		$this->gratification->delete();
		
		$this->visit('maintainers/gratifications/create')
			->type($this->gratification->name, 'name')
			->press('Guardar')
			->seeInDatabase('gratifications', [
				'id'         => $this->gratification->id,
				'name'       => $this->gratification->name,
				'deleted_at' => null
			]);
	}
	
}
