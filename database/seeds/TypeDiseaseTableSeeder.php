<?php

use Illuminate\Database\Seeder;
use Controlqtime\Core\Entities\TypeDisease;

class TypeDiseaseTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
	    DB::statement('SET FOREIGN_KEY_CHECKS=0;');
	    DB::table('type_diseases')->truncate();
	
	    TypeDisease::create([
		    'id'   => 1,
		    'name' => 'Fatiga Visual'
	    ]);
	
	    TypeDisease::create([
		    'id'   => 2,
		    'name' => 'Dolor de Espalda'
	    ]);
	
	    TypeDisease::create([
		    'id'   => 3,
		    'name' => 'Estrés'
	    ]);
	
	    TypeDisease::create([
		    'id'   => 4,
		    'name' => 'El Síndrome de la Fatiga Crónica'
	    ]);
	
	    TypeDisease::create([
		    'id'   => 5,
		    'name' => 'Síndrome de Tunel Carpiano'
	    ]);
	
	    DB::statement('SET FOREIGN_KEY_CHECKS=1;');
	    
    }
}
