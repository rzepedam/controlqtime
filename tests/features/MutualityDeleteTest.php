<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;

class MutualityDeleteTest extends TestCase
{
	use DatabaseTransactions;
	
	protected $mutuality;
	
	function setUp()
	{
		parent::setUp();
		$this->signIn();
		$this->mutuality = factory(\Controlqtime\Core\Entities\Mutuality::class)->create();
	}
	
	function test_delete_mutuality()
	{
		$this->delete('maintainers/mutualities/' . $this->mutuality->id)
			->dontSeeInDatabase('mutualities', [
				'id'         => $this->mutuality->id,
				'deleted_at' => null
			]);
	}
}
