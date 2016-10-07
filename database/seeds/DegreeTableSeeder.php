<?php

use Illuminate\Database\Seeder;
use Controlqtime\Core\Entities\Degree;

class DegreeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
	    DB::statement('SET FOREIGN_KEY_CHECKS=0;');
	    DB::table('degrees')->truncate();
	
	    Degree::create([
		    'id'   => 1,
		    'name' => 'Técnico Nivel Medio'
	    ]);
	
	    Degree::create([
		    'id'   => 2,
		    'name' => 'Técnico Nivel Profesional'
	    ]);
	
	    Degree::create([
		    'id'   => 3,
		    'name' => 'Licenciado'
	    ]);
	
	    Degree::create([
		    'id'   => 4,
		    'name' => 'Título Profesional'
	    ]);
	
	    Degree::create([
		    'id'   => 5,
		    'name' => 'Magister'
	    ]);
	
	    Degree::create([
		    'id'   => 6,
		    'name' => 'Doctorado'
	    ]);
	
	    DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
