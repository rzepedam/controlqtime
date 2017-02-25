<?php

use Controlqtime\Core\Entities\Degree;
use Controlqtime\Core\Entities\Institution;
use Controlqtime\Core\Entities\Relationship;
use Controlqtime\Core\Entities\TypeCertification;
use Controlqtime\Core\Entities\TypeDisability;
use Controlqtime\Core\Entities\TypeDisease;
use Controlqtime\Core\Entities\TypeExam;
use Controlqtime\Core\Entities\TypeProfessionalLicense;
use Controlqtime\Core\Entities\TypeSpeciality;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class EmployeeDeleteTest extends BrowserKitTestCase
{
	use DatabaseTransactions;
	
	function setUp()
	{
		parent::setUp();
		$this->signIn();
	}
	
	/** @test */
	function delete_url_employee()
	{
		$response = $this->call('DELETE', 'human-resources/employees/' . $this->employee->id);
		$this->assertEquals(302, $response->getStatusCode());
	}
	
	/** @test */
	function delete_employee()
	{
		$employee = factory(\Controlqtime\Core\Entities\Employee::class)->states('enable')->create();
		
		$this->delete('human-resources/employees/' . $employee->id)
			->dontSeeInDatabase('employees', [
				'id'         => $employee->id,
				'state'      => 'enable',
				'deleted_at' => null
			]);
	}
	
	/** @test */
	function delete_employee_and_not_delete_contacts_relationships_studies_etc()
	{
		$employee = factory(\Controlqtime\Core\Entities\Employee::class)->states('enable')->create();
		
		$relationship = factory(Relationship::class)->create();
		$employee->contactsable()->create([
			'contactsable_type'       => 'Controlqtime\Core\Entities\Employee',
			'contact_relationship_id' => $relationship->id,
			'name_contact'            => 'José Miguel Osorio Sepúlveda',
			'email_contact'           => 'joseosorio@gmail.com',
			'address_contact'         => 'Pje. Limahuida 1990',
			'tel_contact'             => '+56983401021'
		]);
		
		$employee->familyRelationships()->create([
			'relationship_id'    => $relationship->id,
			'employee_family_id' => $employee->id
		]);
		
		$degreeDetailCollege = factory(Degree::class)->create(['id' => '6']);
		$studyCollege        = $employee->studies()->create([
			'degree_id'      => $degreeDetailCollege->id,
			'date_obtention' => '19-01-2016'
		]);
		
		$institution = factory(Institution::class)->create();
		$studyCollege->detailCollegeStudy()->create([
			'name_study'           => 'Derecho',
			'institution_study_id' => $institution->id
		]);
		
		$typeCertification = factory(TypeCertification::class)->create();
		$employee->certifications()->create([
			'type_certification_id'        => $typeCertification->id,
			'institution_certification_id' => $institution->id,
			'emission_certification'       => '22-10-1996',
			'expired_certification'        => '28-03-2010'
		]);
		
		$typeSpeciality = factory(TypeSpeciality::class)->create();
		$employee->specialities()->create([
			'type_speciality_id'        => $typeSpeciality->id,
			'institution_speciality_id' => $institution->id,
			'emission_speciality'       => '22-10-1996',
			'expired_speciality'        => '28-03-2010'
		]);
		
		$typeProfessionalLicense = factory(TypeProfessionalLicense::class)->create();
		$employee->professionalLicenses()->create([
			'type_professional_license_id' => $typeProfessionalLicense->id,
			'emission_license'             => '08-10-2000',
			'expired_license'              => '08-10-2007',
			'is_donor'                     => true,
			'detail_license'               => 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit.'
		]);
		
		$typeDisability = factory(TypeDisability::class)->create();
		$employee->disabilities()->create([
			'type_disability_id'   => $typeDisability->id,
			'treatment_disability' => true,
			'detail_disability'    => 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit'
		]);
		
		$typeDisease = factory(TypeDisease::class)->create();
		$employee->diseases()->create([
			'type_disease_id'   => $typeDisease->id,
			'treatment_disease' => true,
			'detail_disease'    => 'Lorem ipsum dolor sit amet'
		]);
		
		$typeExam = factory(TypeExam::class)->create();
		$employee->exams()->create([
			'type_exam_id'  => $typeExam->id,
			'emission_exam' => '28-07-2001',
			'expired_exam'  => '28-07-2002',
			'detail_exam'   => 'Lorem ipsum dolor sit amet'
		]);
		
		$employee->familyResponsabilities()->create([
			'name_responsability' => 'Andrés Camargo Salas',
			'rut_responsability'  => '15.257.414-2',
			'relationship_id'     => $relationship->id
		]);
		
		$this->delete('human-resources/employees/' . $employee->id)
			->dontSeeInDatabase('employees', [
				'id'         => $employee->id,
				'state'      => 'enable',
				'deleted_at' => null])
			->seeInDatabase('contact_employees', [
				'contactsable_type'       => 'Controlqtime\Core\Entities\Employee',
				'contact_relationship_id' => $relationship->id,
				'name_contact'            => 'José Miguel Osorio Sepúlveda',
				'email_contact'           => 'joseosorio@gmail.com',
				'address_contact'         => 'Pje. Limahuida 1990',
				'tel_contact'             => '+56983401021'])
			->seeInDatabase('family_relationships', [
				'employee_id'        => $employee->id,
				'relationship_id'    => $relationship->id,
				'employee_family_id' => $employee->id])
			->seeInDatabase('studies', [
				'employee_id'    => $employee->id,
				'degree_id'      => $degreeDetailCollege->id,
				'date_obtention' => '2016-01-19'])
			->seeInDatabase('detail_college_studies', [
				'study_id'             => $studyCollege->id,
				'name_study'           => 'Derecho',
				'institution_study_id' => $institution->id])
			->seeInDatabase('certifications', [
				'employee_id'                  => $employee->id,
				'type_certification_id'        => $typeCertification->id,
				'institution_certification_id' => $institution->id,
				'emission_certification'       => '1996-10-22',
				'expired_certification'        => '2010-03-28'])
			->seeInDatabase('specialities', [
				'employee_id'               => $employee->id,
				'type_speciality_id'        => $typeSpeciality->id,
				'institution_speciality_id' => $institution->id,
				'emission_speciality'       => '1996-10-22',
				'expired_speciality'        => '2010-03-28'])
			->seeInDatabase('professional_licenses', [
				'employee_id'                  => $employee->id,
				'type_professional_license_id' => $typeProfessionalLicense->id,
				'emission_license'             => '2000-10-08',
				'expired_license'              => '2007-10-08',
				'is_donor'                     => true,
				'detail_license'               => 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit.'])
			->seeInDatabase('disabilities', [
				'employee_id'          => $employee->id,
				'type_disability_id'   => $typeDisability->id,
				'treatment_disability' => true,
				'detail_disability'    => 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit'])
			->seeInDatabase('diseases', [
				'employee_id'       => $employee->id,
				'type_disease_id'   => $typeDisease->id,
				'treatment_disease' => true,
				'detail_disease'    => 'Lorem ipsum dolor sit amet'])
			->seeInDatabase('exams', [
				'employee_id'   => $employee->id,
				'type_exam_id'  => $typeExam->id,
				'emission_exam' => '2001-07-28',
				'expired_exam'  => '2002-07-28',
				'detail_exam'   => 'Lorem ipsum dolor sit amet'])
			->seeInDatabase('family_responsabilities', [
				'employee_id'         => $employee->id,
				'name_responsability' => 'Andrés Camargo Salas',
				'rut_responsability'  => '15257414-2',
				'relationship_id'     => $relationship->id]);
	}
}
