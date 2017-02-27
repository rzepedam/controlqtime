<?php

use Controlqtime\Core\Entities\TypeDisease;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class EmployeeEditDiseaseTest extends BrowserKitTestCase
{
    use DatabaseTransactions;

    protected $typeDisease;

    protected $step1_update;

    protected $step2_update;

    protected $step3_update;

    protected $disease;

    public function setUp()
    {
        parent::setUp();
        $this->signIn();
        $this->typeDisease = factory(TypeDisease::class)->create();

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
            'count_family_relationships' => 0,
        ];

        $this->step2_update = [
            'count_studies'               => 0,
            'count_certifications'        => 0,
            'count_specialities'          => 0,
            'count_professional_licenses' => 0,
        ];

        $this->step3_update = [
            'count_disabilities'            => 0,
            'count_exams'                   => 0,
            'count_family_responsabilities' => 0,
        ];

        Session::put('step1_update', $this->step1_update);
        Session::put('step2_update', $this->step2_update);
        Session::put('email_employee', 'marcelocandia@gmail.com');
        Session::put('password', bcrypt('marcelocandia@gmail.com'));

        $this->disease = $this->employee->diseases()->create([
            'type_disease_id'   => $this->typeDisease->id,
            'treatment_disease' => true,
            'detail_disease'    => 'Lorem ipsum dolor sit amet',
        ]);
    }

    public function test_update_disease_employee()
    {
        $typeDisease = factory(TypeDisease::class)->create();

        $this->step3_update += [
            'id_disease'         => [$this->disease->id],
            'type_disease_id'    => [$typeDisease->id],
            'treatment_disease0' => false,
            'detail_disease'     => [''],
            'count_diseases'     => 1,
        ];

        $this->put('human-resources/employees/'.$this->employee->id, $this->step3_update)
            ->seeInDatabase('diseases', [
                'id'                => $this->disease->id,
                'employee_id'       => $this->employee->id,
                'type_disease_id'   => $typeDisease->id,
                'treatment_disease' => false,
                'detail_disease'    => '',
            ]);
    }
}
