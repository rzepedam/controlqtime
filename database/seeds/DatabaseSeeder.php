<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
	    DB::statement('SET FOREIGN_KEY_CHECKS=0;');
	    // Maintainers base
	    $this->call(GenderTableSeeder::class);
	    $this->call(CountryTableSeeder::class);
	    
	    // Importants tables
		$this->call(CompanyTableSeeder::class);
        $this->call(LegalRepresentativeTableSeeder::class);
	    $this->call(UserTableSeeder::class);
	    $this->call(EmployeeTableSeeder::class);
	    $this->call(AddressTableSeeder::class);
	    $this->call(AccessControlApiTableSeeder::class);
	    $this->call(MasterFormPieceVehicleTableSeeder::class);
	    
	    DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
