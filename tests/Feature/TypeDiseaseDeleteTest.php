<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;

class TypeDiseaseDeleteTest extends BrowserKitTestCase
{
	use DatabaseTransactions;
	
	protected $typeDisease;
	
	function setUp()
	{
		parent::setUp();
		$this->signIn();
		$this->typeDisease = factory(\Controlqtime\Core\Entities\TypeDisease::class)->create();
	}
	
	function test_delete_type_disease()
	{
		$this->delete('maintainers/type-diseases/' . $this->typeDisease->id)
			->dontSeeInDatabase('type_diseases', [
				'id'         => $this->typeDisease->id,
				'deleted_at' => null
			]);
	}
}
