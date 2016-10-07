<?php

use Illuminate\Database\Seeder;
use Controlqtime\Core\Entities\Mutuality;

class MutualityTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
	    DB::statement('SET FOREIGN_KEY_CHECKS=0;');
	    DB::table('mutualities')->truncate();
	
	    Mutuality::create([
		    'id'   => 1,
		    'name' => 'Instituto de Seguridad del Trabajo'
	    ]);
	
	    Mutuality::create([
		    'id'   => 2,
		    'name' => 'Asociación Chilena de Seguridad (ACHS)'
	    ]);
	
	    Mutuality::create([
		    'id'   => 3,
		    'name' => 'Mutual de Seguridad'
	    ]);
	
	    Mutuality::create([
		    'id'   => 4,
		    'name' => 'Instituto de Seguridad Laboral'
	    ]);
	
	    Mutuality::create([
		    'id'   => 5,
		    'name' => 'Sin Mutualidad'
	    ]);
	    
	    DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
