<?php

use Illuminate\Database\Seeder;

class EmployeeTableSeeder extends Seeder
{
    public function run()
    {
        factory(Controlqtime\Employee::class, 3)->create();
    }
}
