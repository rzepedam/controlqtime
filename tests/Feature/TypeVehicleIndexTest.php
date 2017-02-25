<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;

class TypeVehicleIndexTest extends BrowserKitTestCase
{
	use DatabaseTransactions;
	
	function setUp()
	{
		parent::setUp();
		$this->signIn();
	}
	
	function test_url_type_vehicle()
    {
        $this->visit('maintainers/type-vehicles')
	        ->assertResponseOk();
    }
    
    function test_route_type_vehicle()
    {
    	$this->visitRoute('type-vehicles.index')
		    ->assertResponseOk();
    }
    
    function test_index_type_vehicle()
    {
    	$this->visit('maintainers/type-vehicles')
		    ->seeInElement('h1', 'Listado de Tipos de Vehículos')
		    ->seeInElement('a', 'Crear Nuevo Tipo de Vehículo')
		    ->see('Nombre');
    }
    
}
