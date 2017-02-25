<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;

class TypeSpecialityCreateTest extends BrowserKitTestCase
{
	use DatabaseTransactions;
	
	function setUp()
	{
		parent::setUp();
		$this->signIn();
	}
	
	function test_create_type_speciality()
	{
		$this->visit('maintainers/type-specialities/create')
			->seeInElement('h1', 'Crear Nueva Especialidad')
			->see('Nombre')
			->seeInElement('button', 'Guardar');
	}
	
	function test_store_type_speciality()
	{
		$this->visit('maintainers/type-specialities/create')
			->type('test', 'name')
			->press('Guardar')
			->seeInDatabase('type_specialities', [
				'name'       => 'test',
				'deleted_at' => null
			]);
    }
}
