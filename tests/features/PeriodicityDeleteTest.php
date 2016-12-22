<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;

class PeriodicityDeleteTest extends TestCase
{
	use DatabaseTransactions;
	
	protected $periodicity;
	
	function setUp()
	{
		parent::setUp();
		$this->signIn();
		$this->periodicity = factory(\Controlqtime\Core\Entities\Periodicity::class)->create();
	}
	
	function test_delete_periodicity()
	{
		$this->delete('maintainers/periodicities/' . $this->periodicity->id)
			->dontSeeInDatabase('periodicities', [
				'id'         => $this->periodicity->id,
				'deleted_at' => null
			]);
	}
}
