<?php

use Controlqtime\Core\Entities\TypeDisability;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class EmployeeCreateDisabilityTest extends BrowserKitTestCase
{
    use DatabaseTransactions;

    protected $typeDisability;

    protected $sessionStep1;

    protected $sessionStep2;

    protected $sessionStep3;

    public function setUp()
    {
        parent::setUp();
        $this->signIn();
        $this->typeDisability = factory(TypeDisability::class)->create();

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
            'count_exams'                   => 0,
            'count_family_responsabilities' => 0,
        ];

        Session::put('step1', $this->sessionStep1);
        Session::put('step2', $this->sessionStep2);
        Session::put('email_employee', 'marcelocandia@gmail.com');
        Session::put('password', bcrypt('marcelocandia@gmail.com'));
    }

    public function test_store_with_disability_employee()
    {
        $this->sessionStep3 += [
            'id_disability'         => [0],
            'type_disability_id'    => [$this->typeDisability->id],
            'treatment_disability0' => true,
            'detail_disability'     => ['Lorem ipsum dolor sit amet, consectetuer adipiscing elit'],
            'count_disabilities'    => 1,
        ];

        $this->post('human-resources/employees', $this->sessionStep3)
            ->seeInDatabase('disabilities', [
                'type_disability_id'   => $this->typeDisability->id,
                'treatment_disability' => true,
                'detail_disability'    => 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit',
            ]);
    }

    public function test_store_with_multiple_disability_employee()
    {
        $typeDisabilityA = factory(TypeDisability::class)->create();
        $typeDisabilityB = factory(TypeDisability::class)->create();
        $typeDisabilityC = factory(TypeDisability::class)->create();

        $this->sessionStep3 += [
            'id_disability'         => [0, 0, 0],
            'type_disability_id'    => [$typeDisabilityA->id, $typeDisabilityB->id, $typeDisabilityC->id],
            'treatment_disability0' => true,
            'treatment_disability1' => false,
            'treatment_disability2' => true,
            'detail_disability'     => ['Lorem ipsum dolor sit amet, consectetuer adipiscing elit', 'Lorem ipsum', ', consectetuer adipiscing elit'],
            'count_disabilities'    => 3,
        ];

        $this->post('human-resources/employees', $this->sessionStep3)
            ->seeInDatabase('disabilities', [
                'type_disability_id'   => $typeDisabilityA->id,
                'treatment_disability' => true,
                'detail_disability'    => 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit', ])
            ->seeInDatabase('disabilities', [
                'type_disability_id'   => $typeDisabilityB->id,
                'treatment_disability' => false,
                'detail_disability'    => 'Lorem ipsum', ])
            ->seeInDatabase('disabilities', [
                'type_disability_id'   => $typeDisabilityC->id,
                'treatment_disability' => true,
                'detail_disability'    => ', consectetuer adipiscing elit',
            ]);
    }
}
