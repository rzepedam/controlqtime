<?php

use Controlqtime\Core\Entities\TypeDisease;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TypeDiseaseDeleteTest extends TestCase
{
	use DatabaseTransactions;
	
	protected $typeDisease;
	
	function setUp()
	{
		parent::setUp();
		$this->signIn();
		$this->typeDisease = factory(TypeDisease::class)->create();
	}
	
	function test_delete_type_disease()
	{
		$this->delete('maintainers/type-diseases/' . $this->typeDisease->id)
			->dontSeeInDatabase('type_diseases', [
				'id'         => $this->typeDisease->id,
				'name'       => $this->typeDisease->name,
				'deleted_at' => null
			]);
	}
	
	function test_restore_type_disease()
	{
		$this->typeDisease->delete();
		
		$this->visit('maintainers/type-diseases/create')
			->type($this->typeDisease->name, 'name')
			->press('Guardar')
			->seeInDatabase('type_diseases', [
				'id'         => $this->typeDisease->id,
				'name'       => $this->typeDisease->name,
				'deleted_at' => null
			]);
		
	}
	
}
