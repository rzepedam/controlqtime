<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;

class TypeCompanyDeleteTest extends TestCase
{
	use DatabaseTransactions;
	
	protected $typeCompany;
	
	function setUp()
	{
		parent::setUp();
		$this->signIn();
		$this->typeCompany = factory(\Controlqtime\Core\Entities\TypeCompany::class)->create();
	}
	
	function test_delete_type_company()
	{
		$this->delete('maintainers/type-companies/' . $this->typeCompany->id)
			->dontSeeInDatabase('type_companies', [
				'id'         => $this->typeCompany->id,
				'deleted_at' => null
			]);
	}
}
