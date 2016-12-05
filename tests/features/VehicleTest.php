<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;

class VehicleTest extends TestCase
{
	use DatabaseTransactions;
	
	function setUp()
	{
		parent::setUp();
		$this->signIn();
	}
	
    function test_url_vehicle()
    {
        $this->visit('operations/vehicles')
	        ->assertResponseOk();
    }
    
    function test_route_vehicle()
    {
    	$this->visitRoute('vehicles.index')
		    ->assertResponseOk();
    }
}
