<?php

use Illuminate\Database\Seeder;
use Controlqtime\Core\Entities\TypeCertification;

class TypeCertificationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
	    DB::statement('SET FOREIGN_KEY_CHECKS=0;');
	    DB::table('type_certifications')->truncate();
	
	    TypeCertification::create([
		    'id'   => 1,
		    'name' => 'Certificación Java'
	    ]);
	
	    TypeCertification::create([
		    'id'   => 2,
		    'name' => 'Certificación RIGGR'
	    ]);
	
	    TypeCertification::create([
		    'id'   => 3,
		    'name' => 'Certificación Conducción a la Defensiva'
	    ]);
	
	    TypeCertification::create([
		    'id'   => 4,
		    'name' => 'Certificación Cero Daño'
	    ]);
	    
	    DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
