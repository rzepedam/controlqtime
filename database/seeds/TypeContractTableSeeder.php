<?php

use Illuminate\Database\Seeder;
use Controlqtime\Core\Entities\TypeContract;

class TypeContractTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
	    DB::statement('SET FOREIGN_KEY_CHECKS=0;');
	    DB::table('type_contracts')->truncate();
	
	    TypeContract::create([
		    'id'   => 1,
		    'name' => 'Indefinido'
	    ]);
	
	    TypeContract::create([
		    'id'   => 2,
		    'name' => 'Part-time'
	    ]);
	
	    DB::statement('SET FOREIGN_KEY_CHECKS=1;');
	    
    }
}
