<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;

class EngineCubicDeleteTest extends TestCase
{
	use DatabaseTransactions;
	
	protected $engineCubic;
	
	function setUp()
	{
		parent::setUp();
		$this->signIn();
		$this->engineCubic = factory(\Controlqtime\Core\Entities\EngineCubic::class)->create();
	}
	
	function test_delete_test()
	{
		$this->delete('maintainers/measuring-units/engine-cubics/' . $this->engineCubic->id)
			->dontSeeInDatabase('engine_cubics', [
				'id'         => $this->engineCubic->id,
				'deleted_at' => null
			]);
	}
}
