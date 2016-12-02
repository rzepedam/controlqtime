<?php

use Controlqtime\Core\Entities\DayTrip;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class DayTripTest extends TestCase
{
	use DatabaseTransactions;
	
	protected $dayTrip;
	
	function setUp()
	{
		parent::setUp();
		$this->signIn();
		$this->dayTrip = factory(DayTrip::class)->create();
	}
	
	function test_url_day_trip()
	{
		$this->visit('maintainers/day-trips')
			->assertResponseOk();
	}
	
	function test_route_day_trip()
	{
		$this->visitRoute('day-trips.index')
			->assertResponseOk();
	}
	
	function test_index_day_trip()
	{
		$this->visit('maintainers/day-trips')
			->see('Listado de Jornadas Laborales')
			->see('Crear Nueva Jornada Laboral')
			->see('Nombre')
			->assertResponseOk();
	}
	
	function test_create_day_trip()
	{
		$this->visit('maintainers/day-trips/create')
			->see('Crear Nueva Jornada Laboral')
			->see('Nombre')
			->see('Guardar')
			->assertResponseOk();
	}
	
	function test_store_day_trip()
	{
		$this->visit('maintainers/day-trips/create')
			->type('test', 'name')
			->press('Guardar')
			->seeInDatabase('day_trips', [
				'name'       => 'test',
				'deleted_at' => null
			]);
	}
	
	function test_edit_day_trip()
	{
		$this->visit('maintainers/day-trips/' . $this->dayTrip->id . '/edit')
			->see('Editar Jornada Laboral: <span class="text-primary">' . $this->dayTrip->id . '</span>')
			->seeInField('#name', $this->dayTrip->name)
			->see('Actualizar');
	}
	
	function test_update_day_trip()
	{
		$this->visit('maintainers/day-trips/' . $this->dayTrip->id . '/edit')
			->type('test', 'name')
			->press('Actualizar')
			->seeInDatabase('day_trips', [
				'id'         => $this->dayTrip->id,
				'name'       => 'test',
				'deleted_at' => null
			]);
	}
	
	function test_delete_day_trip()
	{
		$this->delete('maintainers/day-trips/' . $this->dayTrip->id)
			->dontSeeInDatabase('day_trips', [
				'id'         => $this->dayTrip->id,
				'name'       => $this->dayTrip->name,
				'deleted_at' => null
			]);
	}
	
	function test_restore_day_trip()
	{
		$this->dayTrip->delete();
		
		$this->visit('maintainers/day-trips/create')
			->type($this->dayTrip->name, 'name')
			->press('Guardar')
			->seeInDatabase('day_trips', [
				'id'         => $this->dayTrip->id,
				'name'       => $this->dayTrip->name,
				'deleted_at' => null
			]);
	}
}
