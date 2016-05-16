<?php

use Controlqtime\Core\Entities\Employee;
use Illuminate\Database\Seeder;

class EmployeeTableSeeder extends Seeder
{
    public function run()
    {
        factory(Employee::class, 50)->create();
    }
}
