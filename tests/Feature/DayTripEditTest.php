<?php

use Controlqtime\Core\Entities\DayTrip;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class DayTripEditTest extends BrowserKitTestCase
{
	use DatabaseTransactions;
	
	protected $dayTrip;
	
	function setUp()
	{
		parent::setUp();
		$this->signIn();
		$this->dayTrip = factory(DayTrip::class)->create();
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
}
