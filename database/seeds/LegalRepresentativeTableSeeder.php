<?php

use Illuminate\Database\Seeder;
use Controlqtime\Core\Entities\LegalRepresentative;

class LegalRepresentativeTableSeeder extends Seeder
{
    public function run()
    {
	    DB::statement('SET FOREIGN_KEY_CHECKS=0;');
	    DB::table('legal_representatives')->truncate();
	    
	    if (getenv('APP_ENV') === 'local')
	    {
		    factory(LegalRepresentative::class, 26)->create();
	    }
	
	    DB::statement('SET FOREIGN_KEY_CHECKS=1;');
	    
    }
}
