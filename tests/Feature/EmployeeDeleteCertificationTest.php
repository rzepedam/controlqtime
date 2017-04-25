<?php

use Controlqtime\Core\Entities\Institution;
use Controlqtime\Core\Entities\TypeCertification;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class EmployeeDeleteCertificationTest extends BrowserKitTestCase
{
    use DatabaseTransactions;

    protected $step1_update;

    protected $step2_update;

    protected $step3_update;

    protected $typeCertification;

    protected $institution;

    protected $certification;

    public function setUp()
    {
        parent::setUp();
        $this->signIn();

        $this->institution = factory(Institution::class)->create();
        $this->typeCertification = factory(TypeCertification::class)->create();

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
            'count_diseases'                => 0,
            'count_exams'                   => 0,
            'count_family_responsabilities' => 0,
        ];

        Session::put('step1_update', $this->step1_update);
        Session::put('step2_update', $this->step2_update);

        $this->certification = $this->employee->certifications()->create([
            'type_certification_id'        => $this->typeCertification->id,
            'institution_certification_id' => $this->institution->id,
            'emission_certification'       => '22-10-1996',
            'expired_certification'        => '28-03-2010',
        ]);
    }

    public function test_delete_a_certification_employee()
    {
        Session::put('id_delete_certification', json_encode([$this->certification->id]));

        $this->put('human-resources/employees/'.$this->employee->id, $this->step3_update)
            ->dontSeeInDatabase('certifications', [
                'id'                           => $this->certification->id,
                'employee_id'                  => $this->employee->id,
                'type_certification_id'        => $this->typeCertification->id,
                'institution_certification_id' => $this->institution->id,
                'emission_certification'       => '1996-10-22',
                'expired_certification'        => '2010-03-28',
            ]);
    }

    public function test_delete_a_certification_and_image_employee()
    {
        $image = factory(\Controlqtime\Core\Entities\Image::class)->create([
            'imageable_id'   => $this->certification->id,
            'imageable_type' => 'Controlqtime\Core\Entities\Certification',
        ]);

        Session::put('id_delete_certification', json_encode([$this->certification->id]));

        $this->put('human-resources/employees/'.$this->employee->id, $this->step3_update)
            ->dontSeeInDatabase('certifications', [
                'id'                           => $this->certification->id,
                'employee_id'                  => $this->employee->id,
                'type_certification_id'        => $this->typeCertification->id,
                'institution_certification_id' => $this->institution->id,
                'emission_certification'       => '1996-10-22',
                'expired_certification'        => '2010-03-28', ])
            ->dontSeeInDatabase('images', [
                'id'              => $image->id,
                'imageable_id'   => $this->certification->id,
                'imageable_type' => 'Controlqtime\Core\Entities\Certification',
                'path'            => $image->path,
                'orig_name'       => $image->orig_name,
                'size'            => $image->size,
            ]);
    }

    public function test_delete_than_one_certification_employee()
    {
        $institution = factory(Institution::class)->create();
        $typeCertification = factory(TypeCertification::class)->create();

        $certification = $this->employee->certifications()->create([
            'type_certification_id'        => $typeCertification->id,
            'institution_certification_id' => $institution->id,
            'emission_certification'       => '31-08-2006',
            'expired_certification'        => '31-01-2007',
        ]);

        Session::put('id_delete_certification', json_encode([$this->certification->id, $certification->id]));

        $this->put('human-resources/employees/'.$this->employee->id, $this->step3_update)
            ->dontSeeInDatabase('certifications', [
                'id'                           => $this->certification->id,
                'employee_id'                  => $this->employee->id,
                'type_certification_id'        => $this->typeCertification->id,
                'institution_certification_id' => $this->institution->id,
                'emission_certification'       => '1996-10-22',
                'expired_certification'        => '2010-03-28', ])
            ->dontSeeInDatabase('certifications', [
                'id'                           => $certification->id,
                'employee_id'                  => $this->employee->id,
                'type_certification_id'        => $typeCertification->id,
                'institution_certification_id' => $institution->id,
                'emission_certification'       => '2006-08-31',
                'expired_certification'        => '2007-01-31',
            ]);
    }

    public function test_delete_than_one_certification_and_than_one_image_employee()
    {
        $institution = factory(Institution::class)->create();
        $typeCertification = factory(TypeCertification::class)->create();

        $certification = $this->employee->certifications()->create([
            'type_certification_id'        => $typeCertification->id,
            'institution_certification_id' => $institution->id,
            'emission_certification'       => '31-08-2006',
            'expired_certification'        => '31-01-2007',
        ]);

        $image1 = factory(\Controlqtime\Core\Entities\Image::class)->create([
            'imageable_id'   => $this->certification->id,
            'imageable_type' => 'Controlqtime\Core\Entities\Certification',
        ]);

        $image2 = factory(\Controlqtime\Core\Entities\Image::class)->create([
            'imageable_id'   => $certification->id,
            'imageable_type' => 'Controlqtime\Core\Entities\Certification',
        ]);

        Session::put('id_delete_certification', json_encode([$this->certification->id, $certification->id]));

        $this->put('human-resources/employees/'.$this->employee->id, $this->step3_update)
            ->dontSeeInDatabase('certifications', [
                'id'                           => $this->certification->id,
                'employee_id'                  => $this->employee->id,
                'type_certification_id'        => $this->typeCertification->id,
                'institution_certification_id' => $this->institution->id,
                'emission_certification'       => '1996-10-22',
                'expired_certification'        => '2010-03-28', ])
            ->dontSeeInDatabase('images', [
                'id'              => $image1->id,
                'imageable_id'   => $this->certification->id,
                'imageable_type' => 'Controlqtime\Core\Entities\Certification',
                'path'            => $image1->path,
                'orig_name'       => $image1->orig_name,
                'size'            => $image1->size, ])
            ->dontSeeInDatabase('certifications', [
                'id'                           => $certification->id,
                'employee_id'                  => $this->employee->id,
                'type_certification_id'        => $typeCertification->id,
                'institution_certification_id' => $institution->id,
                'emission_certification'       => '2006-08-31',
                'expired_certification'        => '2007-01-31', ])
            ->dontSeeInDatabase('images', [
                'id'              => $image2->id,
                'imageable_id'   => $certification->id,
                'imageable_type' => 'Controlqtime\Core\Entities\Certification',
                'path'            => $image2->path,
                'orig_name'       => $image2->orig_name,
                'size'            => $image2->size,
            ]);
    }
}
