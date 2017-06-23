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
            'male_surname'      => 'Meza',
            'female_surname'    => 'Mora',
            'first_name'        => 'Raúl',
            'second_name'       => 'Elías',
            'full_name'         => 'Raúl Elías Meza Mora',
            'doc'               => 'rut',
            'rut'               => '17032680-6',
            'birthday'          => '11-06-1989',
            'is_male'           => true,
            'email_employee'    => 'raulmeza@controlqtime.cl',
            'url'               => 'https://s3-sa-east-1.amazonaws.com/biometry/faces/2016/07/18/200031564881.jpg',
            'state'             => 'enable',
        ]);

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
            'is_male'           => true,
            'email_employee'    => 'robertozepeda@controlqtime.cl',
            'url'               => 'https://s3-sa-east-1.amazonaws.com/biometry/faces/2016/06/29/163531241838.jpg',
            'state'             => 'enable',
        ]);

        factory(Employee::class, 8)->states('enable')->create();
    }
}
