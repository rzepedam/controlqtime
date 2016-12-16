<?php

use Controlqtime\Core\Entities\TypeExam;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class EmployeeEditExamTest extends TestCase
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
		$this->typeExam = factory(TypeExam::class)->create();
		
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
			'forecast_id'                => $this->forecast->id,
			'pension_id'                 => $this->pension->id,
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
			'count_family_responsabilities' => 0
		];
		
		Session::put('step1_update', $this->step1_update);
		Session::put('step2_update', $this->step2_update);
		Session::put('email_employee', 'marcelocandia@gmail.com');
		Session::put('password', bcrypt('marcelocandia@gmail.com'));
		
		$this->exam = $this->employee->exams()->create([
			'id_exam'       => 0,
			'type_exam_id'  => $this->typeExam->id,
			'emission_exam' => '28-07-2001',
			'expired_exam'  => '28-07-2002',
			'detail_exam'   => 'Lorem ipsum dolor sit amet'
		]);
	}
	
	function test_update_exam_employee()
	{
		$typeExam = factory(TypeExam::class)->create();
		
		$this->step3_update += [
			'id_exam'       => [$this->exam->id],
			'type_exam_id'  => [$typeExam->id],
			'emission_exam' => ['13-03-2008'],
			'expired_exam'  => ['17-04-2009'],
			'detail_exam'   => ['Lorem ipsum solot'],
			'count_exams'   => 1,
		];
		
		$this->put('human-resources/employees/' . $this->employee->id, $this->step3_update)
			->seeInDatabase('exams', [
				'id'            => $this->exam->id,
				'employee_id'   => $this->employee->id,
				'type_exam_id'  => $typeExam->id,
				'emission_exam' => '2008-03-13',
				'expired_exam'  => '2009-04-17',
				'detail_exam'   => 'Lorem ipsum solot',
				'deleted_at'    => null
			]);
	}
}

