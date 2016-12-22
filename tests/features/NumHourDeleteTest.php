<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;

class NumHourDeleteTest extends TestCase
{
	use DatabaseTransactions;
	
	protected $numHour;
	
	function setUp()
	{
		parent::setUp();
		$this->signIn();
		$this->numHour = factory(\Controlqtime\Core\Entities\NumHour::class)->create();
	}
	
	function test_delete_num_hour()
	{
		$this->delete('maintainers/num-hours/' . $this->numHour->id)
			->dontSeeInDatabase('num_hours', [
				'id'         => $this->numHour->id,
				'deleted_at' => null
			]);
	}
}
