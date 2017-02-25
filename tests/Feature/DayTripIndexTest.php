<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;

class DayTripIndexTest extends BrowserKitTestCase
{
	use DatabaseTransactions;
	
	function setUp()
	{
		parent::setUp();
		$this->signIn();
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
}
