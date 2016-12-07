<?php

use Controlqtime\Core\Entities\TypeSpeciality;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TypeSpecialityDeleteTest extends TestCase
{
	use DatabaseTransactions;
	
	protected $typeSpeciality;
	
	function setUp()
	{
		parent::setUp();
		$this->signIn();
		$this->typeSpeciality = factory(TypeSpeciality::class)->create();
	}
	
	function test_delete_type_speciality()
	{
		$this->delete('maintainers/type-specialities/' . $this->typeSpeciality->id)
			->dontSeeInDatabase('type_specialities', [
				'id'         => $this->typeSpeciality->id,
				'name'       => $this->typeSpeciality->name,
				'deleted_at' => null
			]);
	}
	
	function test_restore_type_speciality()
	{
		$this->typeSpeciality->delete();
		
		$this->visit('maintainers/type-specialities/create')
			->type($this->typeSpeciality->name, 'name')
			->press('Guardar')
			->seeInDatabase('type_specialities', [
				'id'         => $this->typeSpeciality->id,
				'name'       => $this->typeSpeciality->name,
				'deleted_at' => null
			]);
    }
	
}

