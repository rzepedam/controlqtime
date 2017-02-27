<?php

use Controlqtime\Core\Entities\TypeExam;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class EmployeeCreateExamTest extends BrowserKitTestCase
{
    use DatabaseTransactions;

    protected $typeExam;

    protected $sessionStep1;

    protected $sessionStep2;

    protected $sessionStep3;

    public function setUp()
    {
        parent::setUp();
        $this->signIn();
        $this->typeExam = factory(TypeExam::class)->create();

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
            'count_studies'               => 0,
            'count_certifications'        => 0,
            'count_specialities'          => 0,
            'count_professional_licenses' => 0,
        ];

        $this->sessionStep3 = [
            'count_diseases'                => 0,
            'count_disabilities'            => 0,
            'count_family_responsabilities' => 0,
        ];

        Session::put('step1', $this->sessionStep1);
        Session::put('step2', $this->sessionStep2);
        Session::put('email_employee', 'marcelocandia@gmail.com');
        Session::put('password', bcrypt('marcelocandia@gmail.com'));
    }

    public function test_store_with_exam_employee()
    {
        $this->sessionStep3 += [
            'id_exam'       => [0],
            'type_exam_id'  => [$this->typeExam->id],
            'emission_exam' => ['07-04-2008'],
            'expired_exam'  => ['19-10-2011'],
            'detail_exam'   => ['Lorem ipsum dolor sit amet, consectetuer adipiscing elit'],
            'count_exams'   => 1,
        ];

        $this->post('human-resources/employees', $this->sessionStep3)
            ->seeInDatabase('exams', [
                'type_exam_id'  => $this->typeExam->id,
                'emission_exam' => '2008-04-07',
                'expired_exam'  => '2011-10-19',
                'detail_exam'   => 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit',
            ]);
    }

    public function test_store_with_multiple_exam_employee()
    {
        $typeExamA = factory(TypeExam::class)->create();
        $typeExamB = factory(TypeExam::class)->create();
        $typeExamC = factory(TypeExam::class)->create();

        $this->sessionStep3 += [
            'id_exam'       => [0, 0, 0],
            'type_exam_id'  => [$typeExamA->id, $typeExamB->id, $typeExamC->id],
            'emission_exam' => ['07-04-2008', '14-11-2001', '21-08-2015'],
            'expired_exam'  => ['19-10-2011', '17-02-2010', '06-07-2019'],
            'detail_exam'   => ['Lorem ipsum dolor sit amet, consectetuer adipiscing elit', '', ''],
            'count_exams'   => 3,
        ];

        $this->post('human-resources/employees', $this->sessionStep3)
            ->seeInDatabase('exams', [
                'type_exam_id'  => $typeExamA->id,
                'emission_exam' => '2008-04-07',
                'expired_exam'  => '2011-10-19',
                'detail_exam'   => 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit', ])
            ->seeInDatabase('exams', [
                'type_exam_id'  => $typeExamB->id,
                'emission_exam' => '2001-11-14',
                'expired_exam'  => '2010-02-17',
                'detail_exam'   => '', ])
            ->seeInDatabase('exams', [
                'type_exam_id'  => $typeExamC->id,
                'emission_exam' => '2015-08-21',
                'expired_exam'  => '2019-07-06',
                'detail_exam'   => '',
            ]);
    }
}
