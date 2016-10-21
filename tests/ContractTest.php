<?php

use Controlqtime\Core\Entities\User;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ContractTest extends TestCase
{
	use DatabaseTransactions;
	
    function test_url_ok()
    {
	    $user = User::first();
	    $this->actingAs($user)
	        ->visit('/human-resources/contracts')
		    ->see('Listado de Contratos')
		    ->see('Crear Nuevo Contrato Laboral')
	        ->assertResponseOk();
    }
    
    function test_route_ok()
    {
	    $user = User::first();
	    $this->actingAs($user)
		    ->visitRoute('contracts.index')
	        ->see('Crear Nuevo Contrato Laboral')
	        ->assertResponseStatus(200);
    }
    
    function test_save_new_contract()
    {
    	// Revisar, no debiese dar Ok al final del test
	    $user = User::first();
	    $this->actingAs($user)
	        ->visit('/human-resources/contracts/create')
		    ->press('Guardar')
		    ->assertResponseOk();
    }
    
}
