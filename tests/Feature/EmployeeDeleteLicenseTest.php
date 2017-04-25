<?php

use Controlqtime\Core\Entities\TypeProfessionalLicense;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class EmployeeDeleteLicenseTest extends BrowserKitTestCase
{
    use DatabaseTransactions;

    protected $step1_update;

    protected $step2_update;

    protected $step3_update;

    protected $typeProfessionalLicense;

    protected $license;

    public function setUp()
    {
        parent::setUp();
        $this->signIn();

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

        $this->typeProfessionalLicense = factory(TypeProfessionalLicense::class)->create();

        $this->license = $this->employee->professionalLicenses()->create([
            'type_professional_license_id' => $this->typeProfessionalLicense->id,
            'emission_license'             => '08-10-2000',
            'expired_license'              => '08-10-2007',
            'is_donor'                     => true,
            'detail_license'               => 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit.',
        ]);
    }

    public function test_delete_a_license_employee()
    {
        Session::put('id_delete_professional_license', json_encode([$this->license->id]));

        $this->put('human-resources/employees/'.$this->employee->id, $this->step3_update)
            ->dontSeeInDatabase('professional_licenses', [
                'id'                           => $this->license->id,
                'employee_id'                  => $this->employee->id,
                'type_professional_license_id' => $this->typeProfessionalLicense->id,
                'emission_license'             => '2000-10-08',
                'expired_license'              => '2007-10-08',
                'is_donor'                     => true,
                'detail_license'               => 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit.',
            ]);
    }

    public function test_delete_a_license_and_image_employee()
    {
        $image = factory(\Controlqtime\Core\Entities\Image::class)->create([
            'imageable_id'   => $this->license->id,
            'imageable_type' => 'Controlqtime\Core\Entities\ProfessionalLicense',
        ]);

        Session::put('id_delete_professional_license', json_encode([$this->license->id]));

        $this->put('human-resources/employees/'.$this->employee->id, $this->step3_update)
            ->dontSeeInDatabase('professional_licenses', [
                'id'                           => $this->license->id,
                'employee_id'                  => $this->employee->id,
                'type_professional_license_id' => $this->typeProfessionalLicense->id,
                'emission_license'             => '2000-10-08',
                'expired_license'              => '2007-10-08',
                'is_donor'                     => true,
                'detail_license'               => 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit.', ])
            ->dontSeeInDatabase('images', [
                'id'              => $image->id,
                'imageable_id'   => $this->license->id,
                'imageable_type' => 'Controlqtime\Core\Entities\ProfessionalLicense',
                'path'            => $image->path,
                'orig_name'       => $image->orig_name,
                'size'            => $image->size,
            ]);
    }

    public function test_delete_than_one_license_employee()
    {
        $typeProfessionalLicense = factory(TypeProfessionalLicense::class)->create();

        $license = $this->employee->professionalLicenses()->create([
            'type_professional_license_id' => $typeProfessionalLicense->id,
            'emission_license'             => '07-12-2015',
            'expired_license'              => '18-02-2025',
            'is_donor'                     => true,
            'detail_license'               => 'Lorem ipsum',
        ]);

        Session::put('id_delete_professional_license', json_encode([$this->license->id, $license->id]));

        $this->put('human-resources/employees/'.$this->employee->id, $this->step3_update)
            ->dontSeeInDatabase('professional_licenses', [
                'id'                           => $this->license->id,
                'employee_id'                  => $this->employee->id,
                'type_professional_license_id' => $this->typeProfessionalLicense->id,
                'emission_license'             => '2000-10-08',
                'expired_license'              => '2007-10-08',
                'is_donor'                     => true,
                'detail_license'               => 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit.', ])
            ->dontSeeInDatabase('professional_licenses', [
                'id'                           => $license->id,
                'employee_id'                  => $this->employee->id,
                'type_professional_license_id' => $typeProfessionalLicense->id,
                'emission_license'             => '2015-12-07',
                'expired_license'              => '2025-02-18',
                'is_donor'                     => true,
                'detail_license'               => 'Lorem ipsum',
            ]);
    }

    public function test_delete_than_one_license_and_than_one_image_employee()
    {
        $typeProfessionalLicense = factory(TypeProfessionalLicense::class)->create();

        $license = $this->employee->professionalLicenses()->create([
            'type_professional_license_id' => $typeProfessionalLicense->id,
            'emission_license'             => '19-01-2001',
            'expired_license'              => '09-10-2019',
            'is_donor'                     => true,
            'detail_license'               => '',
        ]);

        $image1 = factory(\Controlqtime\Core\Entities\Image::class)->create([
            'imageable_id'   => $this->license->id,
            'imageable_type' => 'Controlqtime\Core\Entities\ProfessionalLicense',
        ]);

        $image2 = factory(\Controlqtime\Core\Entities\Image::class)->create([
            'imageable_id'   => $license->id,
            'imageable_type' => 'Controlqtime\Core\Entities\ProfessionalLicense',
        ]);

        Session::put('id_delete_professional_license', json_encode([$this->license->id, $license->id]));

        $this->put('human-resources/employees/'.$this->employee->id, $this->step3_update)
            ->dontSeeInDatabase('professional_licenses', [
                'id'                           => $this->license->id,
                'employee_id'                  => $this->employee->id,
                'type_professional_license_id' => $this->typeProfessionalLicense->id,
                'emission_license'             => '2001-01-19',
                'expired_license'              => '2019-19-09',
                'is_donor'                     => true,
                'detail_license'               => '', ])
            ->dontSeeInDatabase('professional_licenses', [
                'id'                           => $license->id,
                'employee_id'                  => $this->employee->id,
                'type_professional_license_id' => $typeProfessionalLicense->id,
                'emission_license'             => '2000-10-08',
                'expired_license'              => '2007-10-08',
                'is_donor'                     => true,
                'detail_license'               => 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit.', ])
            ->dontSeeInDatabase('images', [
                'id'              => $image1->id,
                'imageable_id'   => $this->license->id,
                'imageable_type' => 'Controlqtime\Core\Entities\ProfessionalLicense',
                'path'            => $image1->path,
                'orig_name'       => $image1->orig_name,
                'size'            => $image1->size, ])
            ->dontSeeInDatabase('images', [
                'id'              => $image2->id,
                'imageable_id'   => $license->id,
                'imageable_type' => 'Controlqtime\Core\Entities\ProfessionalLicense',
                'path'            => $image2->path,
                'orig_name'       => $image2->orig_name,
                'size'            => $image2->size,
            ]);
    }
}
