<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;

class PositionDeleteTest extends BrowserKitTestCase
{
	use DatabaseTransactions;
	
	protected $position;
	
	function setUp()
	{
		parent::setUp();
		$this->signIn();
		$this->position = factory(\Controlqtime\Core\Entities\Position::class)->create();
	}
	
	function test_delete_position()
	{
		$this->delete('maintainers/positions/' . $this->position->id)
			->dontSeeInDatabase('positions', [
				'id'         => $this->position->id,
				'deleted_at' => null
			]);
	}
}
