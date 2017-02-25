<?php

use Controlqtime\Core\Entities\Weight;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class WeightEditTest extends BrowserKitTestCase
{
	use DatabaseTransactions;
	
	protected $weight;
	
	function setUp()
	{
		parent::setUp();
		$this->signIn();
		$this->weight = factory(Weight::class)->create([
			'name' => 'Kilógramo',
			'acr'  => 'kg'
		]);
	}
	
	function test_edit_weight()
	{
		$this->visit('maintainers/measuring-units/weights/' . $this->weight->id . '/edit')
			->seeInElement('h1', 'Editar Unidad de Medida: <span class="text-primary">' . $this->weight->id . '</span>')
			->seeInField('#name', $this->weight->name)
			->seeInField('#acr', $this->weight->acr)
			->seeInElement('button', 'Actualizar');
	}
	
	function test_update_weight()
	{
		$this->visit('maintainers/measuring-units/weights/' . $this->weight->id . '/edit')
			->type('test', 'name')
			->type('tt', 'acr')
			->press('Actualizar')
			->seeInDatabase('weights', [
				'id'         => $this->weight->id,
				'name'       => 'test',
				'acr'        => 'tt',
				'deleted_at' => null
			]);
	}
}
