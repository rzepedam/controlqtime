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
	
	/** @test */
    function url_contract()
    {
        $this->visit('human-resources/contracts')
	        ->assertResponseOk();
    }
    
    /** @test */
    function route_contract()
    {
    	$this->visitRoute('contracts.index')
		    ->assertResponseOk();
    }
    
    /** @test */
    function index_contract()
    {
    	$this->visit('human-resources/contracts')
		    ->seeInElement('h1', 'Listado de Contratos')
		    ->seeInElement('a', 'Crear Nuevo Contrato Laboral')
		    ->seeInElement('th', 'Nº')
		    ->seeInElement('th', 'Trabajador')
		    ->seeInElement('th', 'Empresa')
		    ->seeInElement('th', 'Inicio')
		    ->seeInElement('a', 'Volver');
    }
}
