<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;

class EmployeeUploadFilesTest extends BrowserKitTestCase
{
	use DatabaseTransactions;
	
	function setUp()
	{
		parent::setUp();
		$this->signIn();
	}
	
    function test_url_upload_employee()
    {
        $this->visit('human-resources/employees/attachFiles/' . $this->employee->id)
	        ->assertResponseOk();
    }
}
