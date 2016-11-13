<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;

class ContractTest extends TestCase
{
	use DatabaseTransactions;
	
	function setUp()
	{
		parent::setUp();
		$this->signIn();
	}
	
    function test_url_ok()
    {
	    $this->visit('human-resources/contracts')
	        ->see('Listado de Contratos')
		    ->see('Crear Nuevo Contrato Laboral')
	        ->assertResponseOk();
    }
    
    function test_route_ok()
    {
	    $this->visitRoute('contracts.index')
	        ->see('Crear Nuevo Contrato Laboral')
	        ->assertResponseStatus(200);
    }
    
    function test_save_new_contract()
    {
	    $this->visit('human-resources/contracts/create')
		    ->see('Crear Nuevo Contrato Laboral')
		    ->press('Guardar')
		    ->assertResponseOk();
    }
    
    function test_get_pdf_contract()
    {
	    //
    }
    
}
