<?php

use Controlqtime\Core\Entities\TypeDisability;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TypeDisabilityDeleteTest extends TestCase
{
	use DatabaseTransactions;
	
	protected $typeDisability;
	
	function setUp()
	{
		parent::setUp();
		$this->signIn();
		$this->typeDisability = factory(TypeDisability::class)->create();
	}
	
	function test_delete_type_disability()
	{
		$this->delete('maintainers/type-disabilities/' . $this->typeDisability->id)
			->dontSeeInDatabase('type_disabilities', [
				'id'         => $this->typeDisability->id,
				'name'       => $this->typeDisability->name,
				'deleted_at' => null
			]);
	}
	
	function test_restore_type_disability()
	{
		$this->typeDisability->delete();
		
		$this->visit('maintainers/type-disabilities/create')
			->type($this->typeDisability->name, 'name')
			->press('Guardar')
			->seeInDatabase('type_disabilities', [
				'id'         => $this->typeDisability->id,
				'name'       => $this->typeDisability->name,
				'deleted_at' => null
			]);
	}
	
}
