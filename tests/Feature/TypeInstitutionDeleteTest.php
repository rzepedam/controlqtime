<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;

class TypeInstitutionDeleteTest extends BrowserKitTestCase
{
	use DatabaseTransactions;
	
	protected $typeInstitution;
	
	function setUp()
	{
		parent::setUp();
		$this->signIn();
		$this->typeInstitution = factory(\Controlqtime\Core\Entities\TypeInstitution::class)->create();
	}
	
	function test_delete_type_institution()
	{
		$this->delete('maintainers/type-institutions/' . $this->typeInstitution->id)
			->dontSeeInDatabase('type_institutions', [
				'id'         => $this->typeInstitution->id,
				'deleted_at' => null
			]);
	}
}
