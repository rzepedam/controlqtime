<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;

class TrademarkDeleteTest extends TestCase
{
	use DatabaseTransactions;
	
	protected $trademark;
	
	function setUp()
	{
		parent::setUp();
		$this->signIn();
		$this->trademark = factory(\Controlqtime\Core\Entities\Trademark::class)->create();
	}
	
	function test_delete_trademark()
	{
		$this->delete('maintainers/trademarks/' . $this->trademark->id)
			->dontSeeInDatabase('trademarks', [
				'id'         => $this->trademark->id,
				'deleted_at' => null
			]);
	}
}
