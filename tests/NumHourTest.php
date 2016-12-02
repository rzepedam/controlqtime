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
			->see('Listado de Nº de Horas')
			->assertResponseOk();
	}
	
	function test_route_num_hour()
	{
		$this->visitRoute('num-hours.index')
			->assertResponseOk();
	}
	
	function test_save_new_num_hour_and_see_in_database()
	{
		$data = [
			'name' => '80'
		];
		
		$this->post('maintainers/num-hours', $data, [
			'HTTP_X_REQUESTED_WITH' => 'XMLHttpRequest'])
			->seeInDatabase('num_hours', ['name' => '80'])
			->assertResponseOk();
	}
	
	function test_restore_num_hour()
	{
		$numHour = NumHour::create([
			'name' => '80'
		]);
		
		$numHour->delete();
		
		$data = [
			'name' => '80'
		];
		
		$this->post('maintainers/num-hours', $data, [
			'HTTP_X_REQUESTED_WITH' => 'XMLHttpRequest'])
			->seeInDatabase('num_hours', [
				'name'       => '80',
				'deleted_at' => null
			])
			->assertResponseOk();
	}
	
	function test_dont_save_num_hour_when_name_is_empty()
	{
		$data = [
			'name' => ''
		];
		
		$this->post('maintainers/num-hours', $data, [
			'HTTP_X_REQUESTED_WITH' => 'XMLHttpRequest'])
			->assertResponseStatus(422)
			->seeJsonEquals([
				'name' => ['El campo <strong>Nombre</strong> es obligatorio.']
			]);
	}
	
	function test_dont_save_duplicate_num_hour()
	{
		$data = [
			'name' => $this->numHour->name
		];
		
		$this->post('maintainers/num-hours', $data, [
			'HTTP_X_REQUESTED_WITH' => 'XMLHttpRequest'])
			->assertResponseStatus(422)
			->seeJsonEquals([
				'name' => ['El campo <strong>Nombre</strong> ya ha sido registrado.'],
			]);
	}
	
	function test_dont_add_num_hour_when_name_have_characters()
	{
		$data = [
			'name' => '5b'
		];
		
		$this->post('maintainers/num-hours', $data, [
			'HTTP_X_REQUESTED_WITH' => 'XMLHttpRequest'])
			->assertResponseStatus(422)
			->seeJsonEquals([
				'name' => ['El formato de <strong>Nombre</strong> es inválido.']
			]);
	}
	
	function test_dont_add_num_hour_when_name_have_more_3_characters()
	{
		$data = [
			'name' => '1234'
		];
		
		$this->post('maintainers/num-hours', $data, [
			'HTTP_X_REQUESTED_WITH' => 'XMLHttpRequest'])
			->assertResponseStatus(422)
			->seeJsonEquals([
				'name' => ['El campo <strong>Nombre</strong> no debe ser mayor que 3 caracteres.']
			]);
	}
	
	function test_delete_num_hour_from_database()
	{
		$this->seeInDatabase('num_hours', [
			'id'         => $this->numHour->id,
			'name'       => $this->numHour->name,
			'deleted_at' => null
		]);
		
		$this->numHour->delete();
		
		$this->dontSeeInDatabase('num_hours', [
			'id'         => $this->numHour->id,
			'name'       => $this->numHour->name,
			'deleted_at' => null
		]);
	}
	
	function test_edit_num_hour_route()
	{
		$this->visitRoute('num-hours.edit', 1)
			->assertResponseOk();
	}
	
	function test_edit_num_hour_url()
	{
		$this->visit('maintainers/num-hours/1/edit')
			->see('Editar')
			->assertResponseOk();
	}
	
	function test_update_name_num_hour()
	{
		$this->visit('maintainers/num-hours/' . $this->numHour->id . '/edit')
			->see('Editar Nº Hora: <span class="text-primary">' . $this->numHour->id . '</span>')
			->see('Nombre')
			->seeInField('name', $this->numHour->name)
			->type('19', 'name')
			->press('Actualizar')
			->seeInDatabase('num_hours', [
				'id'         => $this->numHour->id,
				'name'       => '19',
				'deleted_at' => null
			]);
	}
	
}
