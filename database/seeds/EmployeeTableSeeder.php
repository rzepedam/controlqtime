<?php

use Illuminate\Database\Seeder;
use Controlqtime\Core\Entities\Employee;

class EmployeeTableSeeder extends Seeder
{
    public function run()
    {
	    DB::statement('SET FOREIGN_KEY_CHECKS=0;');
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
		    'nationality_id'    => 4,
		    'gender_id'         => 1,
		    'marital_status_id' => 3,
		    'forecast_id'       => 7,
		    'pension_id'        => 1,
		    'email_employee'    => 'raulmeza@controlqtime.cl',
		    'state'             => 'disable'
	    ]);
	
	    Employee::create([
		    'user_id'           => 2,
		    'male_surname'      => 'Zepeda',
		    'female_surname'    => 'Muñoz',
		    'first_name'        => 'Roberto',
		    'second_name'       => 'Andrés',
		    'full_name'         => 'Roberto Andrés Zepeda Muñoz',
		    'rut'               => '15679634-4',
		    'birthday'          => '15-08-1984',
		    'nationality_id'    => 4,
		    'gender_id'         => 1,
		    'marital_status_id' => 3,
		    'forecast_id'       => 7,
		    'pension_id'        => 1,
		    'email_employee'    => 'robertozepeda@controlqtime.cl',
		    'state'             => 'disable'
	    ]);
	
	    DB::statement('SET FOREIGN_KEY_CHECKS=1;');
	    
    }
}
