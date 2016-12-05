<?php

use Carbon\Carbon;
use Controlqtime\Core\Entities\NumHour;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class NumHourTest extends TestCase
{
	use DatabaseTransactions;
	
	protected $numHour;
	
	function setUp()
	{
		parent::setUp();
		$this->signIn();
		$this->numHour = factory(NumHour::class)->create();
	}
	
	function test_url_num_hour()
	{
		$this->visit('maintainers/num-hours')
			->assertResponseOk();
	}
	
	function test_route_num_hour()
	{
		$this->visitRoute('num-hours.index')
			->assertResponseOk();
	}
	
	function test_index_num_hour()
	{
		$this->visit('maintainers/num-hours')
			->seeInElement('h1', 'Listado de Nº de Horas')
			->seeInElement('a', 'Crear Nuevo Nº de Horas')
			->see('Nombre');
	}
	
	function test_create_num_hour()
	{
		$this->visit('maintainers/num-hours/create')
			->seeInElement('h1', 'Crear Nuevo Nº de Horas')
			->see('Nombre')
			->seeInElement('button', 'Guardar');
	}
	
	function test_store_num_hour()
	{
		$this->visit('maintainers/num-hours/create')
			->type('000', 'name')
			->press('Guardar')
			->seeInDatabase('num_hours', [
				'name'       => '000',
				'deleted_at' => null
			]);
	}
	
	function test_edit_num_hour()
	{
		$this->visit('maintainers/num-hours/' . $this->numHour->id . '/edit')
			->seeInElement('h1', 'Editar Nº Hora: <span class="text-primary">' . $this->numHour->id . '</span>')
			->seeInField('#name', $this->numHour->name)
			->seeInElement('button', 'Actualizar');
	}
	
	function test_update_num_hour()
	{
		$this->visit('maintainers/num-hours/' . $this->numHour->id . '/edit')
			->type('001', 'name')
			->press('Actualizar')
			->seeInDatabase('num_hours', [
				'id'         => $this->numHour->id,
				'name'       => '001',
				'deleted_at' => null
			]);
	}
	
	function test_delete_num_hour()
	{
		$this->delete('maintainers/num-hours/' . $this->numHour->id)
			->dontSeeInDatabase('num_hours', [
				'id'         => $this->numHour->id,
				'name'       => $this->numHour->name,
				'deleted_at' => null
			]);
	}
	
	function test_restore_num_hour()
	{
		$this->numHour->delete();
		
		$this->visit('maintainers/num-hours/create')
			->type($this->numHour->name, 'name')
			->press('Guardar')
			->seeInDatabase('num_hours', [
				'id'         => $this->numHour->id,
				'name'       => $this->numHour->name,
				'deleted_at' => null
			]);
	}
	
}
