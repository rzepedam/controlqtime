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
	
	/** @test */
    function url_company()
    {
        $this->visit('administration/companies')
	        ->assertResponseOk();
    }
    
    /** @test */
    function route_company()
    {
    	$this->visitRoute('companies.index')
		    ->assertResponseOk();
    }
    
    /** @test */
    function index_company()
    {
    	$this->visit('administration/companies')
		    ->seeInElement('h1', 'Listado de Empresas')
		    ->seeInElement('a', 'Crear Nueva Empresa')
		    ->seeInElement('th', 'Nombre')
		    ->seeInElement('th', 'Email');
    }
}
