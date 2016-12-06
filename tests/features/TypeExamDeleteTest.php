<?php

use Controlqtime\Core\Entities\TypeExam;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TypeExamDeleteTest extends TestCase
{
	use DatabaseTransactions;
	
	protected $typeExam;
	
	function setUp()
	{
		parent::setUp();
		$this->signIn();
		$this->typeExam = factory(TypeExam::class)->create();
	}
	
	function test_delete_type_exam()
	{
		$this->delete('maintainers/type-exams/' . $this->typeExam->id)
			->dontSeeInDatabase('type_exams', [
				'id'         => $this->typeExam->id,
				'name'       => $this->typeExam->name,
				'deleted_at' => null
			]);
	}
	
	function test_restore_type_exam()
	{
		$this->typeExam->delete();
		
		$this->visit('maintainers/type-exams/create')
			->type($this->typeExam->name, 'name')
			->press('Guardar')
			->seeInDatabase('type_exams', [
				'id'         => $this->typeExam->id,
				'name'       => $this->typeExam->name,
				'deleted_at' => null
			]);
	}
	
}
