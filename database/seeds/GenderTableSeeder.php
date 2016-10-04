<?php

use Illuminate\Database\Seeder;
use Controlqtime\Core\Entities\Gender;

class GenderTableSeeder extends Seeder
{
    public function run()
    {
	    DB::table('genders')->truncate();
        
	    Gender::create([
        	'name' => 'Masculino'
        ]);
	
	    Gender::create([
		    'name' => 'Femenino'
	    ]);
    }
}
