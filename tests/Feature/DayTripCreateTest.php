<?php

use Controlqtime\Core\Entities\DayTrip;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class DayTripCreateTest extends BrowserKitTestCase
{
	use DatabaseTransactions;
	
	protected $dayTrip;
	
	function setUp()
	{
		parent::setUp();
		$this->signIn();
		$this->dayTrip = factory(DayTrip::class)->create();
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
	
}
