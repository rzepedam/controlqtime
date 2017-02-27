<?php

use Controlqtime\Core\Entities\Degree;
use Controlqtime\Core\Entities\Institution;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class EmployeeCreateStudyTest extends BrowserKitTestCase
{
    use DatabaseTransactions;

    protected $institution;

    protected $sessionStep1;

    protected $sessionStep2;

    protected $sessionStep3;

    public function setUp()
    {
        parent::setUp();
        $this->signIn();
        $this->institution = factory(Institution::class)->create();

        $this->sessionStep1 = [
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
            'count_family_relationships' => 0,
        ];

        $this->sessionStep2 = [
            'count_certifications'        => 0,
            'count_specialities'          => 0,
            'count_professional_licenses' => 0,
        ];

        $this->sessionStep3 = [
            'count_disabilities'            => 0,
            'count_diseases'                => 0,
            'count_exams'                   => 0,
            'count_family_responsabilities' => 0,
        ];

        Session::put('step1', $this->sessionStep1);
        Session::put('email_employee', 'marcelocandia@gmail.com');
        Session::put('password', bcrypt('marcelocandia@gmail.com'));
    }

    public function test_store_with_detail_school_study_employee()
    {
        $degreeSchool = factory(Degree::class)->create(['id' => 2]);

        $this->sessionStep2 += [
            'id_study'         => [0],
            'degree_id'        => [$degreeSchool->id],
            'date_obtention'   => ['17-07-1998'],
            'name_institution' => ['Colegio Altos de Lircay'],
            'count_studies'    => 1,
        ];

        Session::put('step2', $this->sessionStep2);

        $this->post('human-resources/employees', $this->sessionStep3)
            ->seeInDatabase('studies', [
                'degree_id'      => $degreeSchool->id,
                'date_obtention' => '1998-07-17', ])
            ->seeInDatabase('detail_school_studies', [
                'name_institution' => 'Colegio Altos de Lircay',
            ]);
    }

    public function test_store_with_multiple_detail_school_study_employee()
    {
        $degreeSchoolA = factory(Degree::class)->create(['id' => 1]);
        $degreeSchoolB = factory(Degree::class)->create(['id' => 2]);

        $this->sessionStep2 += [
            'id_study'         => [0, 0, 0],
            'degree_id'        => [$degreeSchoolA->id, $degreeSchoolB->id],
            'date_obtention'   => ['17-07-1998', '22-09-2011'],
            'name_institution' => ['Colegio Altos de Lircay', 'Colegio Agustinas'],
            'count_studies'    => 2,
        ];

        Session::put('step2', $this->sessionStep2);

        $this->post('human-resources/employees', $this->sessionStep3)
            ->seeInDatabase('studies', [
                'degree_id'      => $degreeSchoolA->id,
                'date_obtention' => '1998-07-17', ])
            ->seeInDatabase('studies', [
                'degree_id'      => $degreeSchoolB->id,
                'date_obtention' => '2011-09-22', ])
            ->seeInDatabase('detail_school_studies', [
                'name_institution' => 'Colegio Altos de Lircay', ])
            ->seeInDatabase('detail_school_studies', [
                'name_institution' => 'Colegio Agustinas', ]);
    }

    public function test_store_with_detail_technical_study_employee()
    {
        $degreeTechnical = factory(Degree::class)->create(['id' => 3]);

        $this->sessionStep2 += [
            'id_study'         => [0, 0, 0],
            'degree_id'        => [$degreeTechnical->id],
            'date_obtention'   => ['25-02-2009'],
            'name_study'       => ['Carpintería Mención Madera'],
            'name_institution' => ['APV Valparaíso'],
            'count_studies'    => 1,
        ];

        Session::put('step2', $this->sessionStep2);

        $this->post('human-resources/employees', $this->sessionStep3)
            ->seeInDatabase('studies', [
                'degree_id'      => $degreeTechnical->id,
                'date_obtention' => '2009-02-25', ])
            ->seeInDatabase('detail_technical_studies', [
                'name_study'       => 'Carpintería Mención Madera',
                'name_institution' => 'APV Valparaíso',
            ]);
    }

    public function test_store_with_multiple_detail_technical_study_employee()
    {
        $degreeTechnical = factory(Degree::class)->create(['id' => 3]);

        $this->sessionStep2 += [
            'id_study'         => [0, 0, 0],
            'degree_id'        => [$degreeTechnical->id, $degreeTechnical->id, $degreeTechnical->id],
            'date_obtention'   => ['25-02-2009', '03-03-2010', '13-12-2016'],
            'name_study'       => ['Carpintería Mención Madera', 'Soldador en Estructuras Metálicas', 'Contabilidad en Primer Grado'],
            'name_institution' => ['APV Valparaíso', 'Los Alpes School', 'Instituto Rancagua'],
            'count_studies'    => 3,
        ];

        Session::put('step2', $this->sessionStep2);

        $this->post('human-resources/employees', $this->sessionStep3)
            ->seeInDatabase('studies', [
                'degree_id'      => $degreeTechnical->id,
                'date_obtention' => '2009-02-25', ])
            ->seeInDatabase('studies', [
                'degree_id'      => $degreeTechnical->id,
                'date_obtention' => '2010-03-03', ])
            ->seeInDatabase('studies', [
                'degree_id'      => $degreeTechnical->id,
                'date_obtention' => '2016-12-13', ])
            ->seeInDatabase('detail_technical_studies', [
                'name_study'       => 'Carpintería Mención Madera',
                'name_institution' => 'APV Valparaíso', ])
            ->seeInDatabase('detail_technical_studies', [
                'name_study'       => 'Soldador en Estructuras Metálicas',
                'name_institution' => 'Los Alpes School', ])
            ->seeInDatabase('detail_technical_studies', [
                'name_study'       => 'Contabilidad en Primer Grado',
                'name_institution' => 'Instituto Rancagua',
            ]);
    }

    public function test_store_with_detail_college_study_employee()
    {
        $degreeCollege = factory(Degree::class)->create(['id' => 8]);

        $this->sessionStep2 += [
            'id_study'             => [0, 0, 0],
            'degree_id'            => [$degreeCollege->id],
            'date_obtention'       => ['09-12-2015'],
            'name_study'           => ['Ingeniería Informática'],
            'institution_study_id' => [$this->institution->id],
            'count_studies'        => 1,
        ];

        Session::put('step2', $this->sessionStep2);

        $this->post('human-resources/employees', $this->sessionStep3)
            ->seeInDatabase('studies', [
                'degree_id'      => $degreeCollege->id,
                'date_obtention' => '2015-12-09', ])
            ->seeInDatabase('detail_college_studies', [
                'institution_study_id' => $this->institution->id,
                'name_study'           => 'Ingeniería Informática',
            ]);
    }

    public function test_store_with_multiple_detail_college_study_employee()
    {
        $degreeCollegeA = factory(Degree::class)->create(['id' => 4]);
        $degreeCollegeB = factory(Degree::class)->create(['id' => 5]);
        $degreeCollegeC = factory(Degree::class)->create(['id' => 6]);
        $degreeCollegeD = factory(Degree::class)->create(['id' => 7]);
        $degreeCollegeE = factory(Degree::class)->create(['id' => 8]);

        $institutionA = factory(Institution::class)->create();
        $institutionB = factory(Institution::class)->create();
        $institutionC = factory(Institution::class)->create();
        $institutionD = factory(Institution::class)->create();
        $institutionE = factory(Institution::class)->create();

        $this->sessionStep2 += [
            'id_study'             => [0, 0, 0, 0, 0],
            'degree_id'            => [$degreeCollegeA->id, $degreeCollegeB->id, $degreeCollegeC->id, $degreeCollegeD->id, $degreeCollegeE->id],
            'date_obtention'       => ['09-12-2015', '30-01-2001', '19-05-2010', '21-08-2015', '19-11-2012'],
            'name_study'           => ['Ingeniería Informática', 'Ingeniería en Madera', 'Ingeniería Industrial', 'Pedagogia en Educación Física', 'Astronomía'],
            'institution_study_id' => [$institutionA->id, $institutionB->id, $institutionC->id, $institutionD->id, $institutionE->id],
            'count_studies'        => 5,
        ];

        Session::put('step2', $this->sessionStep2);

        $this->post('human-resources/employees', $this->sessionStep3)
            ->seeInDatabase('studies', [
                'degree_id'      => $degreeCollegeA->id,
                'date_obtention' => '2015-12-09', ])
            ->seeInDatabase('studies', [
                'degree_id'      => $degreeCollegeB->id,
                'date_obtention' => '2001-01-30', ])
            ->seeInDatabase('studies', [
                'degree_id'      => $degreeCollegeC->id,
                'date_obtention' => '2010-05-19', ])
            ->seeInDatabase('studies', [
                'degree_id'      => $degreeCollegeD->id,
                'date_obtention' => '2015-08-21', ])
            ->seeInDatabase('studies', [
                'degree_id'      => $degreeCollegeE->id,
                'date_obtention' => '2012-11-19', ])
            ->seeInDatabase('detail_college_studies', [
                'institution_study_id' => $institutionA->id,
                'name_study'           => 'Ingeniería Informática', ])
            ->seeInDatabase('detail_college_studies', [
                'institution_study_id' => $institutionB->id,
                'name_study'           => 'Ingeniería en Madera', ])
            ->seeInDatabase('detail_college_studies', [
                'institution_study_id' => $institutionC->id,
                'name_study'           => 'Ingeniería Industrial', ])
            ->seeInDatabase('detail_college_studies', [
                'institution_study_id' => $institutionD->id,
                'name_study'           => 'Pedagogia en Educación Física', ])
            ->seeInDatabase('detail_college_studies', [
                'institution_study_id' => $institutionE->id,
                'name_study'           => 'Astronomía',
            ]);
    }

    public function test_store_with_multiple_detail_study_employee()
    {
        $degreeSchool = factory(Degree::class)->create(['id' => 2]);
        $degreeTechnical = factory(Degree::class)->create(['id' => 3]);
        $degreeCollege = factory(Degree::class)->create(['id' => 8]);

        $this->sessionStep2 += [
            'id_study'             => [0, 0, 0],
            'degree_id'            => [$degreeSchool->id, $degreeTechnical->id, $degreeCollege->id],
            'date_obtention'       => ['17-07-1998', '25-02-2009', '09-12-2015'],
            'name_study'           => ['', 'Carpintería Mención Madera', 'Ingeniería Informática'],
            'name_institution'     => ['Colegio Altos de Lircay', 'APV Valparaíso'],
            'institution_study_id' => ['', '', $this->institution->id],
            'count_studies'        => 3,
        ];

        Session::put('step2', $this->sessionStep2);

        $this->post('human-resources/employees', $this->sessionStep3)
            ->seeInDatabase('studies', [
                'degree_id'      => $degreeSchool->id,
                'date_obtention' => '1998-07-17', ])
            ->seeInDatabase('studies', [
                'degree_id'      => $degreeTechnical->id,
                'date_obtention' => '2009-02-25', ])
            ->seeInDatabase('studies', [
                'degree_id'      => $degreeCollege->id,
                'date_obtention' => '2015-12-09', ])
            ->seeInDatabase('detail_school_studies', [
                'name_institution' => 'Colegio Altos de Lircay', ])
            ->seeInDatabase('detail_technical_studies', [
                'name_study'       => 'Carpintería Mención Madera',
                'name_institution' => 'APV Valparaíso', ])
            ->seeInDatabase('detail_college_studies', [
                'institution_study_id' => $this->institution->id,
                'name_study'           => 'Ingeniería Informática',
            ]);
    }
}
