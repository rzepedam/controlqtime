<?php

use Controlqtime\Core\Entities\Degree;
use Controlqtime\Core\Entities\Institution;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class EmployeeDeleteStudyTest extends TestCase
{
	use DatabaseTransactions;
	
	protected $step1_update;
	
	protected $step2_update;
	
	protected $step3_update;
	
	protected $degreeDetailSchool;
	
	protected $studySchool;
	
	protected $detailSchool;
	
	protected $studyTechnical;
	
	protected $detailTechnical;
	
	protected $degreeDetailTechnical;
	
	protected $studyCollege;
	
	protected $detailCollege;
	
	protected $institution;
	
	protected $degreeDetailCollege;
	
	function setUp()
	{
		parent::setUp();
		$this->signIn();
		
		$this->degreeDetailSchool    = factory(Degree::class)->create(['id' => '2']);
		$this->degreeDetailTechnical = factory(Degree::class)->create(['id' => '3']);
		$this->degreeDetailCollege   = factory(Degree::class)->create(['id' => '6']);
		$this->institution           = factory(Institution::class)->create();
		
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
			'count_exams'                   => 0,
			'count_family_responsabilities' => 0
		];
		
		Session::put('step1_update', $this->step1_update);
		Session::put('step2_update', $this->step2_update);
		
		$this->studySchool = $this->employee->studies()->create([
			'degree_id'      => $this->degreeDetailSchool->id,
			'date_obtention' => '11-08-2009'
		]);
		
		$this->detailSchool = $this->studySchool->detailSchoolStudy()->create([
			'name_institution' => 'Colegio Altos de Lircay'
		]);
		
		$this->studyTechnical = $this->employee->studies()->create([
			'degree_id'      => $this->degreeDetailTechnical->id,
			'date_obtention' => '15-05-1994'
		]);
		
		$this->detailTechnical = $this->studyTechnical->detailTechnicalStudy()->create([
			'name_study'       => 'Carpintería Mención Madera',
			'name_institution' => 'APV Valparaíso'
		]);
		
		$this->studyCollege = $this->employee->studies()->create([
			'degree_id'      => $this->degreeDetailCollege->id,
			'date_obtention' => '19-01-2016'
		]);
		
		$this->detailCollege = $this->studyCollege->detailCollegeStudy()->create([
			'name_study'           => 'Derecho',
			'institution_study_id' => $this->institution->id,
		]);
	}
	
	function test_delete_a_school_study_employee()
	{
		Session::put('id_delete_study', [$this->studySchool->id]);
		
		$this->put('human-resources/employees/' . $this->employee->id, $this->step3_update)
			->dontSeeInDatabase('studies', [
				'id'             => $this->studySchool->id,
				'employee_id'    => $this->employee->id,
				'degree_id'      => $this->degreeDetailSchool->id,
				'date_obtention' => '2009-08-11'])
			->dontSeeInDatabase('detail_school_studies', [
				'id'               => $this->detailSchool->id,
				'study_id'         => $this->studySchool->id,
				'name_institution' => 'Colegio Altos de Lircay'
			]);
	}
	
	function test_delete_than_one_school_study_employee()
	{
		$degreeDetailSchool = factory(Degree::class)->create(['id' => '1']);
		
		$studySchool        = $this->employee->studies()->create([
			'degree_id'      => $degreeDetailSchool->id,
			'date_obtention' => '29-02-1984'
		]);
		
		$detailSchool = $studySchool->detailSchoolStudy()->create([
			'name_institution' => 'Colegio Alcántara'
		]);
		
		Session::put('id_delete_study', [$this->studySchool->id, $studySchool->id]);
		
		$this->put('human-resources/employees/' . $this->employee->id, $this->step3_update)
			->dontSeeInDatabase('studies', [
				'id'             => $this->studySchool->id,
				'employee_id'    => $this->employee->id,
				'degree_id'      => $this->degreeDetailSchool->id,
				'date_obtention' => '2009-08-11'])
			->dontSeeInDatabase('detail_school_studies', [
				'id'               => $this->detailSchool->id,
				'study_id'         => $this->studySchool->id,
				'name_institution' => 'Colegio Altos de Lircay'])
			->dontSeeInDatabase('studies', [
				'id'             => $studySchool->id,
				'employee_id'    => $this->employee->id,
				'degree_id'      => $degreeDetailSchool->id,
				'date_obtention' => '1984-02-29'])
			->dontSeeInDatabase('detail_school_studies', [
				'id'               => $detailSchool->id,
				'study_id'         => $studySchool->id,
				'name_institution' => 'Colegio Alcántara'
			]);
	}
	
	function test_delete_a_technical_study_employee()
	{
		Session::put('id_delete_study', [$this->studyTechnical->id]);
		
		$this->put('human-resources/employees/' . $this->employee->id, $this->step3_update)
			->dontSeeInDatabase('studies', [
				'id'             => $this->studyTechnical->id,
				'employee_id'    => $this->employee->id,
				'degree_id'      => $this->degreeDetailTechnical->id,
				'date_obtention' => '1994-05-15'])
			->dontSeeInDatabase('detail_technical_studies', [
				'id'               => $this->detailTechnical->id,
				'study_id'         => $this->studyTechnical->id,
				'name_study'       => 'Carpintería Mención Madera',
				'name_institution' => 'APV Valparaíso'
			]);
	}
	
	function test_delete_than_one_technical_study_employee()
	{
		$studyTechnical = $this->employee->studies()->create([
			'degree_id'      => $this->degreeDetailTechnical->id,
			'date_obtention' => '29-02-2009'
		]);
		
		$detailTechnical = $studyTechnical->detailTechnicalStudy()->create([
			'name_study'       => 'Soldadura en Piezas Metálicas',
			'name_institution' => 'PA Los Andes'
		]);
		
		Session::put('id_delete_study', [$this->studyTechnical->id, $studyTechnical->id]);
		
		$this->put('human-resources/employees/' . $this->employee->id, $this->step3_update)
			->dontSeeInDatabase('studies', [
				'id'             => $this->studyTechnical->id,
				'employee_id'    => $this->employee->id,
				'degree_id'      => $this->degreeDetailTechnical->id,
				'date_obtention' => '1994-05-15'])
			->dontSeeInDatabase('detail_technical_studies', [
				'id'               => $this->detailTechnical->id,
				'study_id'         => $this->studyTechnical->id,
				'name_study'       => 'Carpintería Mención Madera',
				'name_institution' => 'APV Valparaíso'])
			->dontSeeInDatabase('studies', [
				'id'             => $studyTechnical->id,
				'employee_id'    => $this->employee->id,
				'degree_id'      => $this->degreeDetailTechnical->id,
				'date_obtention' => '2009-02-29'])
			->dontSeeInDatabase('detail_technical_studies', [
				'id'               => $detailTechnical->id,
				'study_id'         => $studyTechnical->id,
				'name_study'       => 'Soldadura en Piezas Metálicas',
				'name_institution' => 'PA Los Andes'
			]);
	}
	
	function test_delete_a_college_study_employee()
	{
		Session::put('id_delete_study', [$this->studyCollege->id]);
		
		$this->put('human-resources/employees/' . $this->employee->id, $this->step3_update)
			->dontSeeInDatabase('studies', [
				'id'             => $this->studyCollege->id,
				'employee_id'    => $this->employee->id,
				'degree_id'      => $this->degreeDetailCollege->id,
				'date_obtention' => '2016-01-19'])
			->dontSeeInDatabase('detail_college_studies', [
				'id'                   => $this->detailCollege->id,
				'study_id'             => $this->studyCollege->id,
				'name_study'           => 'Derecho',
				'institution_study_id' => $this->institution->id,
			]);
	}
	
	function test_delete_than_one_college_study_employee()
	{
		$degreeDetailCollege = factory(Degree::class)->create(['id' => '7']);
		
		$studyCollege = $this->employee->studies()->create([
			'degree_id'      => $degreeDetailCollege->id,
			'date_obtention' => '01-08-2000'
		]);
		
		$detailCollege = $studyCollege->detailCollegeStudy()->create([
			'name_study'           => 'Medicina',
			'institution_study_id' => $this->institution->id,
		]);
		
		Session::put('id_delete_study', [$this->studyCollege->id, $studyCollege->id]);
		
		$this->put('human-resources/employees/' . $this->employee->id, $this->step3_update)
			->dontSeeInDatabase('studies', [
				'id'             => $this->studyCollege->id,
				'employee_id'    => $this->employee->id,
				'degree_id'      => $this->degreeDetailCollege->id,
				'date_obtention' => '2016-01-19'])
			->dontSeeInDatabase('detail_college_studies', [
				'id'                   => $this->detailCollege->id,
				'study_id'             => $this->studyCollege->id,
				'name_study'           => 'Derecho',
				'institution_study_id' => $this->institution->id])
			->dontSeeInDatabase('studies', [
				'id'             => $studyCollege->id,
				'employee_id'    => $this->employee->id,
				'degree_id'      => $degreeDetailCollege->id,
				'date_obtention' => '2000-08-01'])
			->dontSeeInDatabase('detail_college_studies', [
				'id'                   => $detailCollege->id,
				'study_id'             => $studyCollege->id,
				'name_study'           => 'Medicina',
				'institution_study_id' => $this->institution->id
			]);
	}
}
