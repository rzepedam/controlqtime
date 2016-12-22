<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;

class InstitutionDeleteTest extends TestCase
{
	use DatabaseTransactions;
	
	protected $institution;
	
	function setUp()
	{
		parent::setUp();
		$this->signIn();
		$this->institution = factory(\Controlqtime\Core\Entities\Institution::class)->create();
	}
	
	function test_delete_institution()
	{
		$this->delete('maintainers/institutions/' . $this->institution->id)
			->dontSeeInDatabase('institutions', [
				'id'         => $this->institution->id,
				'deleted_at' => null
			]);
	}
}
