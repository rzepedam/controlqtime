<?php

use Controlqtime\Core\Entities\Weight;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class WeightDeleteTest extends TestCase
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
	
	function test_delete_weight()
	{
		$this->delete('maintainers/measuring-units/weights/' . $this->weight->id)
			->dontSeeInDatabase('weights', [
				'id'         => $this->weight->id,
				'name'       => $this->weight->name,
				'acr'        => $this->weight->acr,
				'deleted_at' => null
			]);
	}
	
	function test_restore_weight()
	{
		$this->weight->delete();
		
		$this->visit('maintainers/measuring-units/weights/create')
			->type($this->weight->name, 'name')
			->type($this->weight->acr, 'acr')
			->press('Guardar')
			->seeInDatabase('weights', [
				'id'         => $this->weight->id,
				'name'       => $this->weight->name,
				'acr'        => $this->weight->acr,
				'deleted_at' => null
			]);
	}
}
