<?php

use Controlqtime\Core\Entities\Relationship;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class EmployeeEditFamilyRelationshipTest extends BrowserKitTestCase
{
    use DatabaseTransactions;

    protected $relationship;

    protected $step1_update;

    protected $step2_update;

    protected $step3_update;

    protected $familyRelationship;

    public function setUp()
    {
        parent::setUp();
        $this->signIn();
        $this->relationship = factory(Relationship::class)->create();

        $this->step1_update = [
            'male_surname'      => 'Candia',
            'female_surname'    => 'Parra',
            'first_name'        => 'Marcelo',
            'second_name'       => 'Pedro',
            'rut'               => '10.486.861-4',
            'birthday'          => '11-06-1989',
            'nationality_id'    => $this->nationality->id,
            'is_male'           => 'M',
            'marital_status_id' => $this->maritalStatus->id,
            'address'           => 'Vicuña Mackenna 2209',
            'commune_id'        => $this->commune->id,
            'phone1'            => '+56988102910',
            'email_employee'    => 'marcelocandia@gmail.com',
            'count_contacts'    => 0,
        ];

        $this->step2_update = [
            'count_studies'               => 0,
            'count_certifications'        => 0,
            'count_specialities'          => 0,
            'count_professional_licenses' => 0,
        ];

        $this->step3_update = [
            'count_disabilities'            => 0,
            'count_diseases'                => 0,
            'count_exams'                   => 0,
            'count_family_responsabilities' => 0,
        ];

        Session::put('step2', $this->step2_update);
        Session::put('email_employee', 'marcelocandia@gmail.com');
        Session::put('password', bcrypt('marcelocandia@gmail.com'));

        $this->familyRelationship = $this->employee->familyRelationships()->create([
            'id_family_relationship' => 0,
            'relationship_id'        => $this->relationship->id,
            'employee_family_id'     => $this->employee->id,
        ]);
    }

    public function test_update_family_relationship_employee()
    {
        $relationship = factory(Relationship::class)->create();
        $employee = factory(\Controlqtime\Core\Entities\Employee::class)->states('enable')->create();

        $this->step1_update += [
            'id_family_relationship'     => [$this->familyRelationship->id],
            'relationship_id'            => [$relationship->id],
            'employee_family_id'         => [$employee->id],
            'count_family_relationships' => 1,
        ];

        Session::put('step1_update', $this->step1_update);

        $this->put('human-resources/employees/'.$this->employee->id, $this->step3_update)
            ->seeInDatabase('family_relationships', [
                'id'                 => $this->familyRelationship->id,
                'employee_id'        => $this->employee->id,
                'relationship_id'    => $relationship->id,
                'employee_family_id' => $employee->id,
            ]);
    }
}
