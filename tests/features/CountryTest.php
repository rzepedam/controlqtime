<?php

use Controlqtime\Core\Entities\Country;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CountryTest extends TestCase
{
	use DatabaseTransactions;
	
	protected $country;
	
	function setUp()
	{
		parent::setUp();
		$this->signIn();
		$this->country = factory(Country::class)->create();
	}
	
	function test_url_country()
	{
		$this->visit('maintainers/countries')
			->assertResponseOk();
	}
	
	function test_route_country()
	{
		$this->visitRoute('countries.index')
			->assertResponseOk();
	}
	
	function test_index_country()
	{
		$this->visit('maintainers/countries')
			->see('Listado de Países')
			->see('Crear Nuevo País')
			->see('Nombre')
			->assertResponseOk();
	}
	
	function test_create_country()
	{
		$this->visit('maintainers/countries/create')
			->see('Crear Nuevo País')
			->see('Nombre')
			->see('Guardar')
			->assertResponseOk();
	}
	
	function test_store_country()
	{
		$this->visit('maintainers/countries/create')
			->type('test', 'name')
			->press('Guardar')
			->seeInDatabase('countries', [
				'name'       => 'test',
				'deleted_at' => null
			]);
	}
	
	function test_edit_country()
	{
		$this->visit('maintainers/countries/' . $this->country->id . '/edit')
			->see('Editar País: <span class="text-primary">' . $this->country->id . '</span>')
			->seeInField('#name', $this->country->name)
			->see('Actualizar')
			->assertResponseOk();
	}
	
	function test_update_country()
	{
		$this->visit('maintainers/countries/' . $this->country->id . '/edit')
			->type('test', 'name')
			->press('Actualizar')
			->seeInDatabase('countries', [
				'name'       => 'test',
				'deleted_at' => null
			]);
	}
	
	function test_delete_country()
	{
		$this->delete('maintainers/countries/' . $this->country->id)
			->dontSeeInDatabase('countries', [
				'id'         => $this->country->id,
				'name'       => $this->country->name,
				'deleted_at' => null
			]);
	}
	
	function test_restore_country()
	{
		$this->country->delete();
		
		$this->visit('maintainers/countries/create')
			->type($this->country->name, 'name')
			->press('Guardar')
			->seeInDatabase('countries', [
				'id'         => $this->country->id,
				'name'       => $this->country->name,
				'deleted_at' => null
			]);
	}
}
