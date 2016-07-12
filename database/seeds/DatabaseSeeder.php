<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call(CompanyTableSeeder::class);
        $this->call(RepresentativeCompanyTableSeeder::class);
        $this->call(EmployeeTableSeeder::class);
        $this->call(AccessControlTableSeeder::class);
    }
}
