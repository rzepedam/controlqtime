<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;

class EmployeeTest extends TestCase
{
	use DatabaseTransactions;
	
	function setUp()
	{
	    parent::setUp();
		$this->signIn();
	}
	
    function test_url_employee_exists()
    {
	    $this->visit('human-resources/employees')
		    ->see('Listado de Trabajadores')
		    ->assertResponseOk();
    }
    
    function test_route_exists()
    {
	    $this->visitRoute('employees.index')
	        ->assertResponseOk();
    }
    
    function test_create_new_employee_with_required_fields()
    {
        //
    }
    
}
