<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;

class CompanyIndexTest extends TestCase
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
    
    function test_route_company()
    {
    	$this->visitRoute('companies.index')
		    ->assertResponseOk();
    }
    
    function test_index_company()
    {
    	$this->visit('administration/companies')
		    ->seeInElement('h1', 'Listado de Empresas')
		    ->seeInElement('a', 'Crear Nueva Empresa')
		    ->seeInElement('th', 'Nombre')
		    ->seeInElement('th', 'Email');
    }
}
