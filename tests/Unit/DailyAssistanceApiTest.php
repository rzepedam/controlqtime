<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;

class DailyAssistanceApiTest extends BrowserKitTestCase
{
	use DatabaseTransactions;
	
	/** @test */
    function get_created_at_to_his_format()
    {
        $dailyAssistance = factory(\Controlqtime\Core\Api\Entities\DailyAssistanceApi::class)->create([
        	'created_at' => '2017-01-07 00:54:23'
        ]);
	    
        $this->assertEquals('00:54:23', $dailyAssistance->created_at_to_his_format);
    }
}
