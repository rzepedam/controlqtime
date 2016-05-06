<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call(CompanyTableSeeder::class);
        $this->call(LegalRepresentativeTableSeeder::class);
        $this->call(SubsidiaryTableSeeder::class);
        //$this->call(ManpowerTableSeeder::class);
    }
}
