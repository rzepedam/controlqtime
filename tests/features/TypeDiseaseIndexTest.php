<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;

class TypeDiseaseIndexTest extends TestCase
{
	use DatabaseTransactions;
	
	function setUp()
	{
		parent::setUp();
		$this->signIn();
	}
	
    function test_url_type_disease()
    {
        $this->visit('maintainers/type-diseases')
	        ->assertResponseOk();
    }
    
    function test_route_type_disease()
    {
    	$this->visitRoute('type-diseases.index')
		    ->assertResponseOk();
    }
    
    function test_index_type_disease()
    {
    	$this->visit('maintainers/type-diseases')
		    ->seeInElement('h1', 'Listado de Enfermedades')
		    ->seeInElement('a', 'Crear Nueva Enfermedad')
		    ->see('Nombre');
    }
    
}
