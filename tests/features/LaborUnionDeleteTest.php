<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;

class LaborUnionDeleteTest extends TestCase
{
	use DatabaseTransactions;
	
	protected $laborUnion;
	
	function setUp()
	{
		parent::setUp();
		$this->signIn();
		$this->laborUnion = factory(\Controlqtime\Core\Entities\LaborUnion::class)->create();
	}
	
	function test_delete_labor_union()
	{
		$this->delete('maintainers/labor-unions/' . $this->laborUnion->id)
			->dontSeeInDatabase('labor_unions', [
				'id'         => $this->laborUnion->id,
				'deleted_at' => null
			]);
	}
}