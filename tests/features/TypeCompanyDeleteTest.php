<?php

use Controlqtime\Core\Entities\TypeCompany;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TypeCompanyDeleteTest extends TestCase
{
	use DatabaseTransactions;
	
	protected $typeCompany;
	
	function setUp()
	{
		parent::setUp();
		$this->signIn();
		$this->typeCompany = factory(TypeCompany::class)->create();
	}
	
	function test_delete_type_company()
	{
		$this->delete('maintainers/type-companies/' . $this->typeCompany->id)
			->dontSeeInDatabase('type_companies', [
				'id'         => $this->typeCompany->id,
				'name'       => $this->typeCompany->name,
				'deleted_at' => null
			]);
	}
	
	function test_restore_type_company()
	{
		$this->typeCompany->delete();
		
		$this->visit('maintainers/type-companies/create')
			->type($this->typeCompany->name, 'name')
			->press('Guardar')
			->seeInDatabase('type_companies', [
				'id'         => $this->typeCompany->id,
				'name'       => $this->typeCompany->name,
				'deleted_at' => null
			]);
	}
}
