<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;

class SignInVisitIndexTest extends TestCase
{
	use DatabaseTransactions;
	
	function setUp()
	{
		parent::setUp();
		$this->signIn();
	}
	
	/** @test */
    function url_sign_in_visit()
    {
        $this->visit('visits/sign-in-visits')
	        ->assertResponseOk();
    }
    
    /** @test */
    function route_sign_in_visit()
    {
    	$this->visitRoute('sign-in-visits.index')
		    ->assertResponseOk();
    }
    
    /** @test */
    function index_sign_in_visit()
    {
    	$this->visit('visits/sign-in-visits')
		    ->seeInElement('h1', 'Listado de Visitas')
		    ->seeInElement('a', 'Crear Nuevo Registro Visita')
		    ->seeInElement('th', 'Nombre')
		    ->seeInElement('th', 'Rut')
		    ->seeInElement('th', 'Contacto')
		    ->seeInElement('a', 'Volver');
    }
}
