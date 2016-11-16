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
		    'name' => 'Enseñanza Básica'
	    ]);
	
	    Degree::create([
		    'id'   => 2,
		    'name' => 'Enseñanza Media'
	    ]);
	    
	    Degree::create([
		    'id'   => 3,
		    'name' => 'Técnico Nivel Medio'
	    ]);
	
	    Degree::create([
		    'id'   => 4,
		    'name' => 'Técnico Nivel Profesional'
	    ]);
	
	    Degree::create([
		    'id'   => 5,
		    'name' => 'Licenciado'
	    ]);
	
	    Degree::create([
		    'id'   => 6,
		    'name' => 'Título Profesional'
	    ]);
	
	    Degree::create([
		    'id'   => 7,
		    'name' => 'Magister'
	    ]);
	
	    Degree::create([
		    'id'   => 8,
		    'name' => 'Doctorado'
	    ]);
	
	    DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
