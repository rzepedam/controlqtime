<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;

class EmployeeIndexTest extends BrowserKitTestCase
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
		    ->assertResponseOk();
    }
    
    function test_route_exists()
    {
	    $this->visitRoute('employees.index')
	        ->assertResponseOk();
    }
    
    function test_index_employee()
    {
    	$this->visit('human-resources/employees')
		    ->seeInElement('h1', 'Listado de Trabajadores')
		    ->seeInElement('a', 'Crear Nuevo Trabajador')
		    ->seeInElement('th', 'Nombre')
		    ->seeInElement('th', 'Email')
		    ->seeInElement('th', 'Nacionalidad');
    }
    
}
