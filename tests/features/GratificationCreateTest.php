<?php

use Controlqtime\Core\Entities\Gratification;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class GratificationCreateTest extends TestCase
{
	use DatabaseTransactions;
	
	protected $gratification;
	
	function setUp()
	{
		parent::setUp();
		$this->signIn();
		$this->gratification = factory(Gratification::class)->create();
	}
	
	function test_create_gratification()
	{
		$this->visit('maintainers/gratifications/create')
			->seeInElement('h1', 'Crear Nueva Gratificación')
			->see('Nombre')
			->see('Guardar')
			->assertResponseOk();
	}
	
	function test_store_gratification()
	{
		$this->visit('maintainers/gratifications/create')
			->type('test', 'name')
			->press('Guardar')
			->seeInDatabase('gratifications', [
				'name'       => 'test',
				'deleted_at' => null
			]);
	}
}
