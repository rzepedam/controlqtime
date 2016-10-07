<?php

use Illuminate\Database\Seeder;
use Controlqtime\Core\Entities\Pension;

class PensionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
	    DB::statement('SET FOREIGN_KEY_CHECKS=0;');
	    DB::table('pensions')->truncate();
	
	    Pension::create([
		    'id'   => 1,
		    'name' => 'Hábitat'
	    ]);
	
	    Pension::create([
		    'id'   => 2,
		    'name' => 'Capital'
	    ]);
	
	    Pension::create([
		    'id'   => 3,
		    'name' => 'Modelo'
	    ]);
	
	    Pension::create([
		    'id'   => 4,
		    'name' => 'CUPRUM'
	    ]);
	
	    Pension::create([
		    'id'   => 5,
		    'name' => 'Provida'
	    ]);
	    
	    DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
