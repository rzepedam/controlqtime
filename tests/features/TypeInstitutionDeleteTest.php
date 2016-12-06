<?php

use Controlqtime\Core\Entities\TypeInstitution;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TypeInstitutionDeleteTest extends TestCase
{
	use DatabaseTransactions;
	
	protected $typeInstitution;
	
	function setUp()
	{
		parent::setUp();
		$this->signIn();
		$this->typeInstitution = factory(TypeInstitution::class)->create();
	}
	
	function test_delete_type_institution()
	{
		$this->delete('maintainers/type-institutions/' . $this->typeInstitution->id)
			->dontSeeInDatabase('type_institutions', [
				'id'         => $this->typeInstitution->id,
				'name'       => $this->typeInstitution->name,
				'deleted_at' => null
			]);
	}
	
	function test_restore_type_institution()
	{
		$this->typeInstitution->delete();
		
		$this->visit('maintainers/type-institutions/create')
			->type($this->typeInstitution->name, 'name')
			->press('Guardar')
			->seeInDatabase('type_institutions', [
				'id'         => $this->typeInstitution->id,
				'name'       => $this->typeInstitution->name,
				'deleted_at' => null
			]);
	}
}
