<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
		/*$this->call(CompanyTableSeeder::class);
        $this->call(LegalRepresentativeTableSeeder::class);
        $this->call(EmployeeTableSeeder::class);
        $this->call(AccessControlApiTableSeeder::class);*/
	    $this->call(MasterFormPieceVehicleTableSeeder::class);
    }
}
