<?php

use Illuminate\Database\Seeder;
use Controlqtime\Core\Entities\TypeExam;

class TypeExamTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
	    DB::statement('SET FOREIGN_KEY_CHECKS=0;');
	    DB::table('type_exams')->truncate();
	
	    TypeExam::create([
		    'id'   => 1,
		    'name' => 'Antropometría'
	    ]);
	
	    TypeExam::create([
		    'id'   => 2,
		    'name' => 'Test Visual'
	    ]);
	
	    TypeExam::create([
		    'id'   => 3,
		    'name' => 'Glicemia'
	    ]);
	
	    TypeExam::create([
		    'id'   => 4,
		    'name' => 'Hemograma'
	    ]);
	
	    TypeExam::create([
		    'id'   => 5,
		    'name' => 'Declaración de Salud'
	    ]);
	    
	    DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
