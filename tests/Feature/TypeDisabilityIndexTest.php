<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;

class TypeDisabilityIndexTest extends BrowserKitTestCase
{
	use DatabaseTransactions;
	
	function setUp()
	{
		parent::setUp();
		$this->signIn();
	}
	
    function test_url_type_disability()
    {
    	$this->visit('maintainers/type-disabilities')
		    ->assertResponseOk();
    }
    
    function test_route_type_disability()
    {
    	$this->visitRoute('type-disabilities.index')
		    ->assertResponseOk();
    }
    
    function test_index_type_disability()
    {
    	$this->visit('maintainers/type-disabilities')
		    ->seeInElement('h1', 'Listado de Discapacidades')
		    ->seeInElement('a', 'Crear Nueva Discapacidad')
		    ->see('Nombre');
    }
}
