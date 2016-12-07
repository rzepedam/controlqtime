<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;

class TypeProfessionalLicenseIndexTest extends TestCase
{
	use DatabaseTransactions;
	
	function setUp()
	{
		parent::setUp();
		$this->signIn();
	}
	
    function test_url_type_professional_license()
    {
        $this->visit('maintainers/type-professional-licenses')
	        ->assertResponseOk();
    }
    
    function test_route_professional_license()
    {
		$this->visitRoute('type-professional-licenses.index')
			->assertResponseOk();
    }
    
    function test_index_professional_license()
    {
    	$this->visit('maintainers/type-professional-licenses')
		    ->seeInElement('h1', 'Listado de Licencias Profesionales')
		    ->seeInElement('a', 'Crear Nueva Licencia Profesional')
		    ->see('Nombre');
    }
}
