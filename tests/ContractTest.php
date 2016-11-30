<?php

use Controlqtime\Core\Entities\Employee;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ContractTest extends TestCase
{
	use DatabaseTransactions;
	
	function setUp()
	{
		parent::setUp();
		$this->signIn();
	}
	
    function test_url_contract_exists()
    {
	    $this->visit('human-resources/contracts')
	        ->see('Listado de Contratos')
		    ->see('Crear Nuevo Contrato Laboral')
	        ->assertResponseOk();
    }
    
    function test_route_contract_exists()
    {
	    $this->visitRoute('contracts.index')
	        ->see('Crear Nuevo Contrato Laboral')
	        ->assertResponseStatus(200);
    }
    
    function test_save_new_contract()
    {
	    $this->visit('human-resources/contracts/create')
		    ->press('Guardar')
		    ->assertResponseStatus(200);
    }
    
    function test_get_pdf_contract()
    {
	    //
    }
    
}
