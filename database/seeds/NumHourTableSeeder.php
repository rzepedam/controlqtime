<?php

use Illuminate\Database\Seeder;
use Controlqtime\Core\Entities\NumHour;

class NumHourTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
	    DB::statement('SET FOREIGN_KEY_CHECKS=0;');
	    DB::table('num_hours')->truncate();
	
	    NumHour::create([
		    'id'   => 1,
		    'name' => '30'
	    ]);
	
	    NumHour::create([
		    'id'   => 2,
		    'name' => '45'
	    ]);
	
	    NumHour::create([
		    'id'   => 3,
		    'name' => '180'
	    ]);
	
	    DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
