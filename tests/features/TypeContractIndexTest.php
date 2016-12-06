<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TypeContractIndexTest extends TestCase
{
	use DatabaseTransactions;
	
	function setUp()
	{
		parent::setUp();
		$this->signIn();
	}
	
    function test_url_type_contract()
    {
    	$this->visit('maintainers/type-contracts')
		    ->assertResponseOk();
    }
    
    function test_route_type_contract()
    {
    	$this->visitRoute('type-contracts.index')
		    ->assertResponseOk();
    }
    
    function test_index_type_contract()
    {
    	$this->visit('maintainers/type-contracts')
		    ->seeInElement('h1', 'Listado de Tipos de Contrato')
		    ->seeInElement('a', 'Crear Nuevo Tipo Contrato')
		    ->see('Nombre')
		    ->see('Duración');
    }
    
}
