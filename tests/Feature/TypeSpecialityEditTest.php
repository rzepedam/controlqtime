<?php

use Controlqtime\Core\Entities\TypeSpeciality;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TypeSpecialityEditTest extends BrowserKitTestCase
{
	use DatabaseTransactions;
	
	protected $typeSpeciality;
	
	function setUp()
	{
		parent::setUp();
		$this->signIn();
		$this->typeSpeciality = factory(TypeSpeciality::class)->create();
	}
	
	function test_edit_type_speciality()
	{
		$this->visit('maintainers/type-specialities/' . $this->typeSpeciality->id . '/edit')
			->seeInElement('h1', 'Editar Especialidad: <span class="text-primary">' . $this->typeSpeciality->id . '</span>')
			->seeInField('#name', $this->typeSpeciality->name)
			->seeInElement('button', 'Actualizar');
	}
	
	function test_update_type_speciality()
	{
		$this->visit('maintainers/type-specialities/' . $this->typeSpeciality->id . '/edit')
			->type('test', 'name')
			->press('Actualizar')
			->seeInDatabase('type_specialities', [
				'id'         => $this->typeSpeciality->id,
				'name'       => 'test',
				'deleted_at' => null
			]);
	}
}
