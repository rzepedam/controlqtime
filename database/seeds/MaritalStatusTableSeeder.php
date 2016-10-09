<?php

use Illuminate\Database\Seeder;
use Controlqtime\Core\Entities\MaritalStatus;

class MaritalStatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
	    DB::statement('SET FOREIGN_KEY_CHECKS=0;');
	    DB::table('marital_statuses')->truncate();
	
	    MaritalStatus::create([
		    'id'   => 1,
		    'name' => 'Casado'
	    ]);
	
	    MaritalStatus::create([
		    'id'   => 2,
		    'name' => 'Separado'
	    ]);
	
	    MaritalStatus::create([
		    'id'   => 3,
		    'name' => 'Soltero'
	    ]);
	
	    MaritalStatus::create([
		    'id'   => 4,
		    'name' => 'Viudo'
	    ]);
	
	    DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
