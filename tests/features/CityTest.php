<?php

use Controlqtime\Core\Entities\City;
use Controlqtime\Core\Entities\Country;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CityTest extends TestCase
{
	use DatabaseTransactions;
	
	protected $city;
	
	protected $country;
	
	function setUp()
	{
		parent::setUp();
		$this->signIn();
		$this->country = factory(Country::class)->create();
		$this->city    = factory(City::class)->create();
	}
	
	function test_url_city()
	{
		$this->visit('maintainers/cities')
			->assertResponseOk();
	}
	
	function test_route_city()
	{
		$this->visitRoute('cities.index')
			->assertResponseOk();
	}
	
	function test_index_city()
	{
		$this->visit('maintainers/cities')
			->see('Listado de Ciudades')
			->see('Nombre')
			->see('País')
			->assertResponseOk();
	}
	
	function test_create_city()
	{
		$this->visit('maintainers/cities/create')
			->see('Crear Nueva Ciudad')
			->see($this->country->name)
			->see('Guardar')
			->assertResponseOk();
	}
	
	function test_store_city()
	{
		$this->visit('maintainers/cities/create')
			->type('test', 'name')
			->select($this->country->id, 'country_id')
			->press('Guardar')
			->seeInDatabase('cities', [
				'name'       => 'test',
				'country_id' => $this->country->id,
				'deleted_at' => null
			]);
	}
	
	function test_edit_city()
	{
		$this->visit('maintainers/cities/' . $this->city->id . '/edit')
			->see('Editar Ciudad: <span class="text-primary">' . $this->city->id . '</span>')
			->seeInField('#name', $this->city->name)
			->seeInElement('#country_id', $this->city->country_id)
			->see('Actualizar');
	}
	
	function test_update_city()
	{
		$id      = $this->city->id + 1;
		$country = Country::create([
			'id'   => $id,
			'name' => 'Argentina'
		]);
		
		$this->visit('maintainers/cities/' . $this->city->id . '/edit')
			->type('test', 'name')
			->select($country->id, 'country_id')
			->press('Actualizar')
			->seeInDatabase('cities', [
				'name'       => 'test',
				'country_id' => $country->id,
				'deleted_at' => null
			]);
	}
	
	function test_delete_city()
	{
		$this->delete('maintainers/cities/' . $this->city->id)
			->dontSeeInDatabase('cities', [
				'id'         => $this->city->id,
				'name'       => $this->city->name,
				'country_id' => $this->city->country_id,
				'deleted_at' => null
			]);
	}
	
	function test_restore_city()
	{
		$this->city->delete();
		
		$this->visit('maintainers/cities/create')
			->type($this->city->name, 'name')
			->select($this->city->country_id, 'country_id')
			->press('Guardar')
			->seeInDatabase('cities', [
				'id'         => $this->city->id,
				'name'       => $this->city->name,
				'country_id' => $this->city->country_id,
				'deleted_at' => null
			]);
	}
	
}
