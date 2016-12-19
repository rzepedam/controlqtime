<?php

use Carbon\Carbon;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class DailyAssistanceIndexTest extends TestCase
{
	use DatabaseTransactions;
	
	function setUp()
	{
		parent::setUp();
		$this->signIn();
	}
	
    function test_url_daily_assistance()
    {
        $this->visit('human-resources/daily-assistances')
	        ->assertResponseOk();
    }
    
    function test_route_daily_assistance()
    {
    	$this->visitRoute('daily-assistances.index')
		    ->assertResponseOk();
    }
    
    function test_index_daily_assistance()
    {
        $this->visit('human-resources/daily-assistances')
	        ->seeInField('#date', Carbon::today()->format('d-m-Y'))
	        ->seeInElement('#employee_id', 'Ver Todos');
    }
    
}
