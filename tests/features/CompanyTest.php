<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;

class CompanyTest extends TestCase
{
	use DatabaseTransactions;
	
	function setUp()
	{
		parent::setUp();
		$this->signIn();
	}
	
    function test_url_company()
    {
        $this->visit('administration/companies')
	        ->assertResponseOk();
    }
}
