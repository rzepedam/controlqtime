<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;

class TypeProfessionalLicenseCreateTest extends BrowserKitTestCase
{
	use DatabaseTransactions;
	
	function setUp()
	{
		parent::setUp();
		$this->signIn();
	}
	
	function test_create_professional_license()
	{
		$this->visit('maintainers/type-professional-licenses/create')
			->seeInElement('h1', 'Crear Nueva Licencia Profesional')
			->see('Nombre')
			->seeInElement('button', 'Guardar');
	}
	
	function test_store_professional_license()
	{
		$this->visit('maintainers/type-professional-licenses/create')
			->type('test', 'name')
			->press('Guardar')
			->seeInDatabase('type_professional_licenses', [
				'name'       => 'test',
				'deleted_at' => null
			]);
	}
}
