<?php

use Illuminate\Database\Seeder;
use Controlqtime\Core\Entities\Employee;

class EmployeeTableSeeder extends Seeder
{
    public function run()
    {
	    DB::table('employees')->truncate();
	    Employee::create([
		    'user_id'           => 1,
		    'male_surname'      => 'Meza',
		    'female_surname'    => 'Mora',
		    'first_name'        => 'Raúl',
		    'second_name'       => 'Elías',
		    'full_name'         => 'Raúl Elías Meza Mora',
		    'rut'               => '17032680-6',
		    'birthday'          => '11-06-1989',
		    'nationality_id'    => 3,
		    'gender_id'         => 1,
		    'marital_status_id' => 3,
		    'forecast_id'       => 7,
		    'pension_id'        => 1,
		    'address'           => 'Pérez Valenzuela 1209',
		    'commune_id'        => 35,
		    'email_employee'    => 'raulmeza@controlqtime.cl',
		    'phone1'            => '+56974155784',
		    'phone2'            => '22624050',
		    'state'             => 'disable'
	    ]);
	    
        factory(Employee::class, 50)->create();
    }
}
