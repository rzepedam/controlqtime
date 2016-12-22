<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;

class GratificationDeleteTest extends TestCase
{
	use DatabaseTransactions;
	
	protected $gratification;
	
	function setUp()
	{
		parent::setUp();
		$this->signIn();
		$this->gratification = factory(\Controlqtime\Core\Entities\Gratification::class)->create();
	}
	
	function test_delete_gratification()
	{
		$this->delete('maintainers/gratifications/' . $this->gratification->id)
			->dontSeeInDatabase('gratifications', [
				'id'         => $this->gratification->id,
				'deleted_at' => null
			]);
    }
}
