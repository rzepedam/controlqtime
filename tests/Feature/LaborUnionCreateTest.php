<?php

use Controlqtime\Core\Entities\LaborUnion;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class LaborUnionCreateTest extends BrowserKitTestCase
{
	use DatabaseTransactions;
	
	protected $laborUnion;
	
	function setUp()
	{
		parent::setUp();
		$this->signIn();
		$this->laborUnion = factory(LaborUnion::class)->create();
	}
	
	function test_create_labor_union()
	{
		$this->visit('maintainers/labor-unions/create')
			->seeInElement('h1', 'Crear Nuevo Sindicato')
			->see('Nombre')
			->seeInElement('button', 'Guardar');
	}
	
	function test_store_labor_union()
	{
		$this->visit('maintainers/labor-unions/create')
			->type('test', 'name')
			->press('Guardar')
			->seeInDatabase('labor_unions', [
				'name'       => 'test',
				'deleted_at' => null
			]);
	}
}
