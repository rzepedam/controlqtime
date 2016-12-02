<?php

use Controlqtime\Core\Entities\Fuel;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class FuelTest extends TestCase
{
	use DatabaseTransactions;
	
	protected $fuel;
	
	function setUp()
	{
		parent::setUp();
		$this->signIn();
		$this->fuel = factory(Fuel::class)->create();
	}
	
	function test_url_fuel()
	{
		$this->visit('maintainers/fuels')
			->assertResponseOk();
	}
	
	function test_route_fuel()
	{
		$this->visitRoute('fuels.index')
			->assertResponseOk();
	}
	
	function test_index_fuel()
	{
		$this->visit('maintainers/fuels')
			->see('Listado de Combustibles')
			->see('Crear Nuevo Combustible')
			->see('Nombre')
			->assertResponseOk();
	}
	
	function test_create_fuel()
	{
		$this->visit('maintainers/fuels/create')
			->see('Crear Nuevo Combustible')
			->see('Nombre')
			->see('Guardar')
			->assertResponseOk();
	}
	
	function test_store_fuel()
	{
		$this->visit('maintainers/fuels/create')
			->type('test', 'name')
			->press('Guardar')
			->seeInDatabase('fuels', [
				'name'       => 'test',
				'deleted_at' => null
			]);
	}
	
	function test_edit_fuel()
	{
		$this->visit('maintainers/fuels/' . $this->fuel->id . '/edit')
			->see('Editar Combustible: <span class="text-primary">' . $this->fuel->id . '</span>')
			->seeInField('#name', $this->fuel->name)
			->see('Actualizar');
	}
	
	function test_update_fuel()
	{
		$this->visit('maintainers/fuels/' . $this->fuel->id . '/edit')
			->type('test', 'name')
			->press('Actualizar')
			->seeInDatabase('fuels', [
				'id'         => $this->fuel->id,
				'name'       => 'test',
				'deleted_at' => null
			]);
	}
	
	function test_delete_fuel()
	{
		$this->delete('maintainers/fuels/' . $this->fuel->id)
			->dontSeeInDatabase('fuels', [
				'id'         => $this->fuel->id,
				'name'       => $this->fuel->name,
				'deleted_at' => null
			]);
	}
	
	function test_restore_fuel()
	{
		$this->fuel->delete();
		
		$this->visit('maintainers/fuels/create')
			->type($this->fuel->name, 'name')
			->press('Guardar')
			->seeInDatabase('fuels', [
				'id'         => $this->fuel->id,
				'name'       => $this->fuel->name,
				'deleted_at' => null
			]);
	}
}
