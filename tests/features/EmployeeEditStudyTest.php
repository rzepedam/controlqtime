<?php

use Controlqtime\Core\Entities\Degree;
use Controlqtime\Core\Entities\Institution;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class EmployeeEditStudyTest extends TestCase
{
	use DatabaseTransactions;
	
	protected $institution;
	
	protected $step1_update;
	
	protected $step2_update;
	
	protected $step3_update;
	
	protected $degreeDetailSchool;
	
	protected $degreeDetailTechnical;
	
	protected $degreeDetailCollege;
	
	protected $studySchool;
	
	protected $detailSchool;
	
	protected $studyTechnical;
	
	protected $detailTechnical;
	
	protected $studyCollege;
	
	protected $detailCollege;
	
	function setUp()
	{
		parent::setUp();
		$this->signIn();
		$this->degreeDetailSchool      = factory(Degree::class)->create(['id' => '2']);
		$this->degreeDetailTechnical   = factory(Degree::class)->create(['id' => '3']);
		$this->degreeDetailCollege     = factory(Degree::class)->create(['id' => '6']);
		$this->institution             = factory(Institution::class)->create();
		
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
		Session::put('email_employee', 'marcelocandia@gmail.com');
		Session::put('password', bcrypt('marcelocandia@gmail.com'));
		
		$this->studySchool = $this->employee->studies()->create([
			'id_study'       => 0,
			'degree_id'      => $this->degreeDetailSchool->id,
			'date_obtention' => '11-08-2009'
		]);
		
		$this->detailSchool = $this->studySchool->detailSchoolStudy()->create([
			'name_institution' => 'Colegio Altos de Lircay'
		]);
		
		$this->studyTechnical = $this->employee->studies()->create([
			'id_study'       => 0,
			'degree_id'      => $this->degreeDetailTechnical->id,
			'date_obtention' => '15-05-1994'
		]);
		
		$this->detailTechnical = $this->studyTechnical->detailTechnicalStudy()->create([
			'name_study'       => 'Carpintería Mención Madera',
			'name_institution' => 'APV Valparaíso'
		]);
		
		$this->studyCollege = $this->employee->studies()->create([
			'id_study'       => 0,
			'degree_id'      => $this->degreeDetailCollege->id,
			'date_obtention' => '19-01-2016'
		]);
		
		$this->detailCollege = $this->studyCollege->detailCollegeStudy()->create([
			'name_study'           => 'Derecho',
			'institution_study_id' => $this->institution->id,
		]);
	}
	
	function test_update_with_detail_school_study_employee()
	{
		$degreeSchool = factory(Degree::class)->create(['id' => 1]);
		
		$this->step2_update += [
			'id_study'         => [$this->studySchool->id],
			'degree_id'        => [$degreeSchool->id],
			'date_obtention'   => ['17-07-1998'],
			'name_institution' => ['Colegio Los Almendros'],
			'count_studies'    => 1,
		];
		
		Session::put('step2_update', $this->step2_update);
		
		$this->put('human-resources/employees/' . $this->employee->id, $this->step3_update)
			->seeInDatabase('studies', [
				'id'             => $this->studySchool->id,
				'employee_id'    => $this->employee->id,
				'degree_id'      => $degreeSchool->id,
				'date_obtention' => '1998-07-17'])
			->seeInDatabase('detail_school_studies', [
				'id'               => $this->detailSchool->id,
				'study_id'         => $this->studySchool->id,
				'name_institution' => 'Colegio Los Almendros',
				'deleted_at'       => null
			]);
	}
	
	function test_update_with_detail_technical_study_employee()
	{
		$this->step2_update += [
			'id_study'         => [$this->studyTechnical->id],
			'degree_id'        => [$this->degreeDetailTechnical->id],
			'date_obtention'   => ['08-12-2005'],
			'name_study'       => ['Soldadura en Piezas de Relojería'],
			'name_institution' => ['Instituto Arévalo Henríquez'],
			'count_studies'    => 1,
		];
		
		Session::put('step2_update', $this->step2_update);
		
		$this->put('human-resources/employees/' . $this->employee->id, $this->step3_update)
			->seeInDatabase('studies', [
				'id'             => $this->studyTechnical->id,
				'employee_id'    => $this->employee->id,
				'degree_id'      => $this->degreeDetailTechnical->id,
				'date_obtention' => '2005-12-08'])
			->seeInDatabase('detail_technical_studies', [
				'id'               => $this->detailTechnical->id,
				'study_id'         => $this->studyTechnical->id,
				'name_study'       => 'Soldadura en Piezas de Relojería',
				'name_institution' => 'Instituto Arévalo Henríquez',
				'deleted_at'       => null
			]);
	}
	
	function test_update_with_detail_college_study_employee()
	{
		$degreeCollege = factory(Degree::class)->create(['id' => 8]);
		$institution   = factory(Institution::class)->create();
		
		$this->step2_update += [
			'id_study'             => [$this->studyCollege->id],
			'degree_id'            => [$degreeCollege->id],
			'date_obtention'       => ['28-02-2015'],
			'institution_study_id' => [$institution->id],
			'name_study'           => ['Ingeniería Mecánica'],
			'count_studies'        => 1,
		];
		
		Session::put('step2_update', $this->step2_update);
		
		$this->put('human-resources/employees/' . $this->employee->id, $this->step3_update)
			->seeInDatabase('studies', [
				'id'             => $this->studyCollege->id,
				'employee_id'    => $this->employee->id,
				'degree_id'      => $degreeCollege->id,
				'date_obtention' => '2015-02-28',
				'deleted_at'     => null])
			->seeInDatabase('detail_college_studies', [
				'id'                   => $this->detailCollege->id,
				'study_id'             => $this->studyCollege->id,
				'name_study'           => 'Ingeniería Mecánica',
				'institution_study_id' => $institution->id,
				'deleted_at'           => null
			]);
	}
}
