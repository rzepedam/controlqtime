<?php

use Controlqtime\Core\Entities\TypeDisease;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class EmployeeCreateDiseaseTest extends BrowserKitTestCase
{
    use DatabaseTransactions;

    protected $typeDisease;

    protected $sessionStep1;

    protected $sessionStep2;

    protected $sessionStep3;

    public function setUp()
    {
        parent::setUp();
        $this->signIn();
        $this->typeDisease = factory(TypeDisease::class)->create();

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
            'count_disabilities'            => 0,
            'count_exams'                   => 0,
            'count_family_responsabilities' => 0,
        ];

        Session::put('step1', $this->sessionStep1);
        Session::put('step2', $this->sessionStep2);
        Session::put('email_employee', 'marcelocandia@gmail.com');
        Session::put('password', bcrypt('marcelocandia@gmail.com'));
    }

    public function test_store_with_disease_employee()
    {
        $this->sessionStep3 += [
            'id_disease'         => [0],
            'type_disease_id'    => [$this->typeDisease->id],
            'treatment_disease0' => true,
            'detail_disease'     => ['Lorem ipsum dolor sit amet, consectetuer adipiscing elit'],
            'count_diseases'     => 1,
        ];

        $this->post('human-resources/employees', $this->sessionStep3)
            ->seeInDatabase('diseases', [
                'type_disease_id'   => $this->typeDisease->id,
                'treatment_disease' => true,
                'detail_disease'    => 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit',
            ]);
    }

    public function test_store_with_multiple_disease_employee()
    {
        $typeDiseaseA = factory(TypeDisease::class)->create();
        $typeDiseaseB = factory(TypeDisease::class)->create();
        $typeDiseaseC = factory(TypeDisease::class)->create();

        $this->sessionStep3 += [
            'id_disease'         => [0, 0, 0],
            'type_disease_id'    => [$typeDiseaseA->id, $typeDiseaseB->id, $typeDiseaseC->id],
            'treatment_disease0' => true,
            'treatment_disease1' => true,
            'treatment_disease2' => false,
            'detail_disease'     => ['Lorem ipsum dolor sit amet, consectetuer adipiscing elit', 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, to', ''],
            'count_diseases'     => 3,
        ];

        $this->post('human-resources/employees', $this->sessionStep3)
            ->seeInDatabase('diseases', [
                'type_disease_id'   => $typeDiseaseA->id,
                'treatment_disease' => true,
                'detail_disease'    => 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit', ])
            ->seeInDatabase('diseases', [
                'type_disease_id'   => $typeDiseaseB->id,
                'treatment_disease' => true,
                'detail_disease'    => 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, to', ])
            ->seeInDatabase('diseases', [
                'type_disease_id'   => $typeDiseaseC->id,
                'treatment_disease' => false,
                'detail_disease'    => '',
            ]);
    }
}
