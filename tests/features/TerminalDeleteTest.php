<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;

class TerminalDeleteTest extends TestCase
{
	use DatabaseTransactions;
	
	protected $terminal;
	
	function setUp()
	{
		parent::setUp();
		$this->signIn();
		$this->terminal = factory(\Controlqtime\Core\Entities\Terminal::class)->create();
	}
	
	function test_delete_terminal()
	{
		$this->delete('maintainers/terminals/' . $this->terminal->id)
			->dontSeeInDatabase('terminals', [
				'id'         => $this->terminal->id,
				'deleted_at' => null
			]);
	}
}
