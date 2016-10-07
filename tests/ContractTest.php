<?php

use Controlqtime\Core\Entities\User;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ContractTest extends TestCase
{
	use DatabaseTransactions, WithoutMiddleware;
	
    public function test_url_ok()
    {
	    $user = User::find(1)->first();
	    $this->actingAs($user)
		    ->visit('/human-resources/contracts')
	        ->see('Crear Nuevo Contrato Laboral')
	        ->assertResponseStatus(200);
    }
    
    public function test_route_ok()
    {
        $this->visitRoute('contracts.index')
	        ->see('Crear Nuevo Contrato Laboral')
	        ->assertResponseStatus(200);
    }
    
    /*public function test_save_new_contract()
    {
		$user = User::find(1);
	    $this->be($user);
	    
	    $this->visit('/human-resources/contracts/create')
	        ->see('Crear Nuevo Contrato Laboral')
	        ->assertResponseOk();
    }*/
    
}
