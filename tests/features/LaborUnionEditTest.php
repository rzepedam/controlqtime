<?php

use Controlqtime\Core\Entities\LaborUnion;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class LaborUnionEditTest extends TestCase
{
	use DatabaseTransactions;
	
	protected $laborUnion;
	
	function setUp()
	{
		parent::setUp();
		$this->signIn();
		$this->laborUnion = factory(LaborUnion::class)->create();
	}
	
	function test_edit_labor_union()
	{
		$this->visit('maintainers/labor-unions/' . $this->laborUnion->id . '/edit')
			->seeInElement('h1', 'Editar Sindicato: <span class="text-primary">' . $this->laborUnion->id . '</span>')
			->seeInField('#name', $this->laborUnion->name)
			->seeInElement('button', 'Actualizar');
	}
	
	function test_update_labor_union()
	{
		$this->visit('maintainers/labor-unions/' . $this->laborUnion->id . '/edit')
			->type('test', 'name')
			->press('Actualizar')
			->seeInDatabase('labor_unions', [
				'id'         => $this->laborUnion->id,
				'name'       => 'test',
				'deleted_at' => null
			]);
	}
}
