<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;

class WeightIndexTest extends BrowserKitTestCase
{
	use DatabaseTransactions;
	
	function setUp()
	{
		parent::setUp();
		$this->signIn();
	}
	
    function test_url_weight()
    {
        $this->visit('maintainers/measuring-units/weights')
	        ->assertResponseOk();
    }
    
    function test_route_weight()
    {
    	$this->visitRoute('weights.index')
		    ->assertResponseOk();
    }
    
    function test_index_weight()
    {
    	$this->visit('maintainers/measuring-units/weights')
		    ->seeInElement('h1', 'Listado de Unidades de Medida para Peso')
		    ->seeInElement('a', 'Crear Nueva Unidad')
		    ->seeInElement('th', 'Nombre')
		    ->seeInElement('th', 'Acrónimo');
    }
}
