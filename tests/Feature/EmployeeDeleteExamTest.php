<?php

use Controlqtime\Core\Entities\TypeExam;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class EmployeeDeleteExamTest extends BrowserKitTestCase
{
	use DatabaseTransactions;
	
	protected $step1_update;
	
	protected $step2_update;
	
	protected $step3_update;
	
	protected $typeExam;
	
	protected $exam;
	
	function setUp()
	{
		parent::setUp();
		$this->signIn();
		
		$this->step1_update = [
			'male_surname'               => 'Candia',
			'female_surname'             => 'Parra',
			'first_name'                 => 'Marcelo',
			'second_name'                => 'Pedro',
			'rut'                        => '10.486.861-4',
			'birthday'                   => '11-06-1989',
			'nationality_id'             => $this->nationality->id,
			'is_male'                    => 'M',
			'marital_status_id'          => $this->maritalStatus->id,
			'address'                    => 'Vicuña Mackenna 2209',
			'commune_id'                 => $this->commune->id,
			'phone1'                     => '+56988102910',
			'email_employee'             => 'marcelocandia@gmail.com',
			'count_contacts'             => 0,
			'count_family_relationships' => 0
		];
		
		$this->step2_update = [
			'count_studies'               => 0,
			'count_certifications'        => 0,
			'count_specialities'          => 0,
			'count_professional_licenses' => 0
		];
		
		$this->step3_update = [
			'count_disabilities'            => 0,
			'count_diseases'                => 0,
			'count_exams'                   => 0,
			'count_family_responsabilities' => 0
		];
		
		Session::put('step1_update', $this->step1_update);
		Session::put('step2_update', $this->step2_update);
		
		$this->typeExam = factory(TypeExam::class)->create();
		
		$this->exam = $this->employee->exams()->create([
			'type_exam_id'  => $this->typeExam->id,
			'emission_exam' => '28-07-2001',
			'expired_exam'  => '28-07-2002',
			'detail_exam'   => 'Lorem ipsum dolor sit amet'
		]);
	}
	
	function test_delete_a_exam_employee()
	{
		$this->step3_update += [
			'id_delete_exam' => json_encode([$this->exam->id])
		];
		
		$this->put('human-resources/employees/' . $this->employee->id, $this->step3_update)
			->dontSeeInDatabase('exams', [
				'id'            => $this->exam->id,
				'employee_id'   => $this->employee->id,
				'type_exam_id'  => $this->typeExam->id,
				'emission_exam' => '2001-07-21',
				'expired_exam'  => '2002-07-28',
				'detail_exam'   => 'Lorem ipsum dolor sit amet'
			]);
	}
	
	function test_delete_a_exam_and_image_employee()
	{
		$image = factory(\Controlqtime\Core\Entities\Image::class)->create([
			'imagesable_id'   => $this->exam->id,
			'imagesable_type' => 'Controlqtime\Core\Entities\Exam'
		]);
		
		$this->step3_update += [
			'id_delete_exam' => json_encode([$this->exam->id])
		];
		
		$this->put('human-resources/employees/' . $this->employee->id, $this->step3_update)
			->dontSeeInDatabase('exams', [
				'id'            => $this->exam->id,
				'employee_id'   => $this->employee->id,
				'type_exam_id'  => $this->typeExam->id,
				'emission_exam' => '2001-07-21',
				'expired_exam'  => '2002-07-28',
				'detail_exam'   => 'Lorem ipsum dolor sit amet'])
			->dontSeeInDatabase('images', [
				'id'              => $image->id,
				'imagesable_id'   => $this->exam->id,
				'imagesable_type' => 'Controlqtime\Core\Entities\Exam',
				'path'            => $image->path,
				'orig_name'       => $image->orig_name,
				'size'            => $image->size
			]);
	}
	
	function test_delete_than_one_exam_employee()
	{
		$typeExam = factory(TypeExam::class)->create();
		
		$exam = $this->employee->exams()->create([
			'type_exam_id'  => $typeExam->id,
			'emission_exam' => '18-09-2009',
			'expired_exam'  => '27-10-2018',
			'detail_exam'   => 'Lorem'
		]);
		
		$this->step3_update += [
			'id_delete_exam' => json_encode([$this->exam->id, $exam->id])
		];
		
		$this->put('human-resources/employees/' . $this->employee->id, $this->step3_update)
			->dontSeeInDatabase('exams', [
				'id'            => $this->exam->id,
				'employee_id'   => $this->employee->id,
				'type_exam_id'  => $this->typeExam->id,
				'emission_exam' => '2001-07-21',
				'expired_exam'  => '2002-07-28',
				'detail_exam'   => 'Lorem ipsum dolor sit amet'])
			->dontSeeInDatabase('exams', [
				'id'            => $exam->id,
				'employee_id'   => $this->employee->id,
				'type_exam_id'  => $typeExam->id,
				'emission_exam' => '2009-09-18',
				'expired_exam'  => '2018-10-27',
				'detail_exam'   => 'Lorem'
			]);
	}
	
	function test_delete_than_one_exam_and_than_one_image_employee()
	{
		$typeExam = factory(TypeExam::class)->create();
		
		$exam = $this->employee->exams()->create([
			'type_exam_id'  => $typeExam->id,
			'emission_exam' => '18-09-2009',
			'expired_exam'  => '27-10-2018',
			'detail_exam'   => 'Lorem'
		]);
		
		$this->step3_update += [
			'id_delete_exam' => json_encode([$this->exam->id, $exam->id])
		];
		
		$image1 = factory(\Controlqtime\Core\Entities\Image::class)->create([
			'imagesable_id'   => $this->exam->id,
			'imagesable_type' => 'Controlqtime\Core\Entities\Exam'
		]);
		
		$image2 = factory(\Controlqtime\Core\Entities\Image::class)->create([
			'imagesable_id'   => $exam->id,
			'imagesable_type' => 'Controlqtime\Core\Entities\Exam'
		]);
		
		$this->put('human-resources/employees/' . $this->employee->id, $this->step3_update)
			->dontSeeInDatabase('exams', [
				'id'            => $this->exam->id,
				'employee_id'   => $this->employee->id,
				'type_exam_id'  => $this->typeExam->id,
				'emission_exam' => '2001-07-21',
				'expired_exam'  => '2002-07-28',
				'detail_exam'   => 'Lorem ipsum dolor sit amet'])
			->dontSeeInDatabase('images', [
				'id'              => $image1->id,
				'imagesable_id'   => $this->exam->id,
				'imagesable_type' => 'Controlqtime\Core\Entities\Exam',
				'path'            => $image1->path,
				'orig_name'       => $image1->orig_name,
				'size'            => $image1->size])
			->dontSeeInDatabase('exams', [
				'id'            => $exam->id,
				'employee_id'   => $this->employee->id,
				'type_exam_id'  => $typeExam->id,
				'emission_exam' => '2009-09-18',
				'expired_exam'  => '2018-10-27',
				'detail_exam'   => 'Lorem'])
			->dontSeeInDatabase('images', [
				'id'              => $image2->id,
				'imagesable_id'   => $exam->id,
				'imagesable_type' => 'Controlqtime\Core\Entities\Exam',
				'path'            => $image2->path,
				'orig_name'       => $image2->orig_name,
				'size'            => $image2->size
			]);
	}
}
