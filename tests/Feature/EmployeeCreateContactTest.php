<?php

use Controlqtime\Core\Entities\Relationship;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class EmployeeCreateContactTest extends BrowserKitTestCase
{
    use DatabaseTransactions;

    protected $relationship;

    protected $sessionStep1;

    protected $sessionStep2;

    protected $sessionStep3;

    public function setUp()
    {
        parent::setUp();
        $this->signIn();
        $this->relationship = factory(Relationship::class)->create();

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
            'count_diseases'                => 0,
            'count_exams'                   => 0,
            'count_family_responsabilities' => 0,
        ];

        Session::put('email_employee', 'marcelocandia@gmail.com');
        Session::put('password', bcrypt('marcelocandia@gmail.com'));
        Session::put('step2', $this->sessionStep2);
    }

    /** @test */
    public function store_with_contact_information_employee()
    {
        $this->sessionStep1 += [
            'id_contact'              => [0],
            'contact_relationship_id' => [$this->relationship->id],
            'name_contact'            => ['José Miguel Osorio Sepúlveda'],
            'email_contact'           => ['joseosorio@gmail.com'],
            'address_contact'         => ['Pje. Limahuida 1990'],
            'tel_contact'             => ['+56983401021'],
            'count_contacts'          => 1,
        ];

        Session::put('step1', $this->sessionStep1);

        $this->post('human-resources/employees', $this->sessionStep3)
            ->seeInDatabase('contact_employees', [
                'name_contact'    => 'José Miguel Osorio Sepúlveda',
                'email_contact'   => 'joseosorio@gmail.com',
                'address_contact' => 'Pje. Limahuida 1990',
                'tel_contact'     => '+56983401021',
            ]);
    }

    /** @test */
    public function store_with_multiple_contact_information_employees()
    {
        $this->sessionStep1 += [
            'id_contact'              => [0, 0, 0],
            'contact_relationship_id' => $this->relationship->id,
            'name_contact'            => ['José Miguel Osorio Sepúlveda', 'Alejandro Pablo López Zaldivia', 'Rodrigo Ángel Céspedes Mondaca'],
            'email_contact'           => ['joseosorio@gmail.com', 'alelopez@gmail.com', 'rodrigoangel@gmail.com'],
            'address_contact'         => ['Pje. Limahuida 1990', 'Calle Uno 919', 'Av. Conquistadores 701'],
            'tel_contact'             => ['+56983401021', '+56976192110', '+56994021990'],
            'count_contacts'          => 3,
        ];

        Session::put('step1', $this->sessionStep1);

        $this->post('human-resources/employees', $this->sessionStep3)
            ->seeInDatabase('contact_employees', [
                'name_contact'    => 'José Miguel Osorio Sepúlveda',
                'email_contact'   => 'joseosorio@gmail.com',
                'address_contact' => 'Pje. Limahuida 1990',
                'tel_contact'     => '+56983401021', ])
            ->seeInDatabase('contact_employees', [
                'name_contact'    => 'Alejandro Pablo López Zaldivia',
                'email_contact'   => 'alelopez@gmail.com',
                'address_contact' => 'Calle Uno 919',
                'tel_contact'     => '+56976192110', ])
            ->seeInDatabase('contact_employees', [
                'name_contact'    => 'Rodrigo Ángel Céspedes Mondaca',
                'email_contact'   => 'rodrigoangel@gmail.com',
                'address_contact' => 'Av. Conquistadores 701',
                'tel_contact'     => '+56994021990',
            ]);
    }
}
