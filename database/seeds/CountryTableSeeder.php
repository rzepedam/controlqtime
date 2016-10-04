<?php

use Illuminate\Database\Seeder;
use Controlqtime\Core\Entities\Country;

class CountryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
	    DB::statement('SET FOREIGN_KEY_CHECKS=0;');
	    DB::table('countries')->truncate();
	
	    Country::create([
		    'id'   => 1,
		    'name' => 'Argentina'
	    ]);
	
	    Country::create([
		    'id'   => 2,
		    'name' => 'Bolivia'
	    ]);
	
	    Country::create([
		    'id'   => 3,
		    'name' => 'Colombia'
	    ]);
	
	    Country::create([
		    'id'   => 4,
		    'name' => 'Chile'
	    ]);
	
	    Country::create([
		    'id'   => 5,
		    'name' => 'Ecuador'
	    ]);
	
	    Country::create([
		    'id'   => 6,
		    'name' => 'Perú'
	    ]);
	
	    Country::create([
		    'id'   => 7,
		    'name' => 'Paraguay'
	    ]);
	
	    Country::create([
		    'id'   => 8,
		    'name' => 'Uruguay'
	    ]);
	
	    Country::create([
		    'id'   => 9,
		    'name' => 'Venezuela'
	    ]);
	
	    DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
