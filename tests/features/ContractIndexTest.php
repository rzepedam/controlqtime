<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;

class ContractIndexTest extends TestCase
{
	use DatabaseTransactions;
	
	function setUp()
	{
		parent::setUp();
		$this->signIn();
	}
	
    function test_url_contract()
    {
        $this->visit('human-resources/contracts')
	        ->assertResponseOk();
    }
    
    function test_route_contract()
    {
    	$this->visitRoute('contracts.index')
		    ->assertResponseOk();
    }
    
    function test_index_contract()
    {
    	$this->visit('human-resources/contracts')
		    ->seeInElement('h1', 'Listado de Contratos')
		    ->seeInElement('a', 'Crear Nuevo Contrato Laboral')
		    ->seeInElement('th', 'Nº')
		    ->seeInElement('th', 'Trabajador')
		    ->seeInElement('th', 'Empresa')
		    ->seeInElement('th', 'Fecha')
		    ->seeInElement('a', 'Volver');
    }
}
