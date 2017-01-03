<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;

class TermAndObligatoryDeleteTest extends TestCase
{
	use DatabaseTransactions;
	
	protected $term;
	
	function setUp()
	{
		parent::setUp();
		$this->signIn();
		$this->term = factory(\Controlqtime\Core\Entities\TermAndObligatory::class)->create();
	}
	
	function test_delete_term_and_obligatory()
	{
		$this->delete('maintainers/terms-and-obligatories/' . $this->term->id)
			->dontSeeInDatabase('term_and_obligatories', [
				'id'         => $this->term->id,
				'deleted_at' => null
			]);
	}
}