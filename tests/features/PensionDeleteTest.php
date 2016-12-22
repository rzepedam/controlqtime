<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;

class PensionDeleteTest extends TestCase
{
	use DatabaseTransactions;
	
	protected $pension;
	
	function setUp()
	{
		parent::setUp();
		$this->signIn();
		$this->pension = factory(\Controlqtime\Core\Entities\Pension::class)->create();
	}
	
	function test_delete_pension()
	{
		$this->delete('maintainers/pensions/' . $this->pension->id)
			->dontSeeInDatabase('pensions', [
				'id'         => $this->pension->id,
				'deleted_at' => null
			]);
	}
}
