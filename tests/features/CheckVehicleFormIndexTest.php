<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;

class CheckVehicleFormIndexTest extends TestCase
{
	use DatabaseTransactions;
	
	function setUp()
	{
		parent::setUp();
		$this->signIn();
	}
	
    function test_url_check_form_vehicle()
    {
        $this->visit('operations/check-vehicle-forms')
	        ->assertResponseOk();
    }
    
    function test_route_check_vehicle_form()
    {
    	$this->visitRoute('check-vehicle-forms.index')
		    ->assertResponseOk();
    }
    
    function test_index_check_vehicle_form()
    {
    	$this->visit('operations/check-vehicle-forms')
		    ->seeInElement('h1', 'Listado Formulario Chequeo Vehículos')
		    ->seeInElement('a', 'Crear Nuevo Formulario Chequeo Vehículo')
		    ->seeInElement('th', 'Revisor')
		    ->seeInElement('th', 'Vehículo')
		    ->seeInElement('th', 'Ingresado')
		    ->seeInElement('a', 'Volver');
    }
}
