<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TypeExamCreateTest extends BrowserKitTestCase
{
	use DatabaseTransactions;
	
	function setUp()
	{
		parent::setUp();
		$this->signIn();
	}
	
	function test_create_type_exam()
	{
		$this->visit('maintainers/type-exams/create')
			->seeInElement('h1', 'Crear Nuevo Examen Preocupacional')
			->see('Nombre')
			->seeInElement('button', 'Guardar');
	}
	
	function test_store_type_exam()
	{
		$this->visit('maintainers/type-exams/create')
			->type('test', 'name')
			->press('Guardar')
			->seeInDatabase('type_exams', [
				'name'       => 'test',
				'deleted_at' => null
			]);
	}
	
}
