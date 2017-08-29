<?php

use Controlqtime\Core\Entities\Employee;
use Illuminate\Database\Seeder;

class EmployeeTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('employees')->truncate();

        Employee::create([
            'nationality_id'    => 4,
            'marital_status_id' => 3,
            'male_surname'      => 'Zepeda',
            'female_surname'    => 'Muñoz',
            'first_name'        => 'Roberto',
            'second_name'       => 'Andrés',
            'full_name'         => 'Roberto Andrés Zepeda Muñoz',
            'doc'               => 'rut',
            'rut'               => '15679634-4',
            'birthday'          => '15-08-1984',
            'is_male'           => 'M',
            'email_employee'    => 'robertozepeda@controlqtime.cl',
            'url'               => 'https://s3-sa-east-1.amazonaws.com/biometry/faces/2016/06/29/163531241838.jpg',
            'state'             => 'enable',
        ]);

        factory(\Controlqtime\Core\Entities\Employee::class, 199)->create();

        $employees = \Controlqtime\Core\Entities\Employee::all()->except(1);

        foreach ($employees as $employee)
        {
            $contract = factory(\Controlqtime\Core\Entities\Contract::class)->create([
                'company_id' => 1,
                'employee_id' => $employee->id,
                'area_id' => 1
            ]);

            $address = factory(\Controlqtime\Core\Entities\Address::class)->create([
                'addressable_id' => $employee->id,
            ]);

            $detalAddressEmployee = factory(\Controlqtime\Core\Entities\DetailAddressLegalEmployee::class)->create([
                'address_id' => $address->id
            ]);
        }
    }
}
