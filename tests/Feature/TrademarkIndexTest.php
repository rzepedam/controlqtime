<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;

class TrademarkIndexTest extends BrowserKitTestCase
{
	use DatabaseTransactions;
	
	function setUp()
	{
		parent::setUp();
		$this->signIn();
	}
	
    function test_url_trademark()
    {
        $this->visit('maintainers/trademarks')
	        ->assertResponseOk();
    }
    
    function test_route_trademark()
    {
    	$this->visitRoute('trademarks.index')
		    ->assertResponseOk();
    }
    
    function test_index_trademark()
    {
    	$this->visit('maintainers/trademarks')
		    ->seeInElement('h1', 'Listado de Marcas de Vehículos')
		    ->seeInElement('a', 'Crear Nueva Marca')
		    ->see('Nombre');
    }
}
