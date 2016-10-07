<?php

use Illuminate\Database\Seeder;
use Controlqtime\Core\Entities\TypeInstitution;

class TypeInstitutionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
	    DB::statement('SET FOREIGN_KEY_CHECKS=0;');
	    DB::table('type_institutions')->truncate();
	
	    TypeInstitution::create([
		    'id'   => 1,
		    'name' => 'Universidad'
	    ]);
	
	    TypeInstitution::create([
		    'id'   => 2,
		    'name' => 'Centro de Formación Técnica'
	    ]);
	
	    TypeInstitution::create([
		    'id'   => 3,
		    'name' => 'Instituto Profesional'
	    ]);
	    
	    DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
