<?php

use Controlqtime\Core\Entities\TypeInstitution;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TypeInstitutionEditTest extends TestCase
{
	use DatabaseTransactions;
	
	protected $typeInstitution;
	
	function setUp()
	{
		parent::setUp();
		$this->signIn();
		$this->typeInstitution = factory(TypeInstitution::class)->create();
	}
	
	function test_edit_type_institution()
	{
		$this->visit('maintainers/type-institutions/' . $this->typeInstitution->id . '/edit')
			->seeInElement('h1', 'Editar Tipo Institución: <span class="text-primary">' . $this->typeInstitution->id . '</span>')
			->seeInField('#name', $this->typeInstitution->name)
			->seeInElement('button', 'Actualizar');
	}
	
	function test_update_type_institution()
	{
		$this->visit('maintainers/type-institutions/' . $this->typeInstitution->id . '/edit')
			->type('test', 'name')
			->press('Actualizar')
			->seeInDatabase('type_institutions', [
				'id'         => $this->typeInstitution->id,
				'name'       => 'test',
				'deleted_at' => null
			]);
	}
}
