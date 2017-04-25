<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseTransactions;

class TicketCreateTest extends \BrowserKitTestCase
{
	use DatabaseTransactions;

	public function setUp()
	{
		parent::setUp();
		$this->signIn();
	}

	/** @test */
	function create_ticket()
	{
		$this->visit('tickets/create')
			->assertResponseOk();
	}
}
