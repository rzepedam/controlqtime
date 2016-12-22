<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;

class ProfessionDeleteTest extends TestCase
{
	use DatabaseTransactions;
	
	protected $profession;
	
	function setUp()
	{
		parent::setUp();
		$this->signIn();
		$this->profession = factory(\Controlqtime\Core\Entities\Profession::class)->create();
	}
	
	function test_delete_profession()
	{
		$this->delete('maintainers/professions/' . $this->profession->id)
			->dontSeeInDatabase('professions', [
				'id'         => $this->profession->id,
				'deleted_at' => null
			]);
	}
}
