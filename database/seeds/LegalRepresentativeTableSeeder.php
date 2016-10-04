<?php

use Illuminate\Database\Seeder;
use Controlqtime\Core\Entities\LegalRepresentative;

class LegalRepresentativeTableSeeder extends Seeder
{
    public function run()
    {
	    DB::table('legal_representatives')->truncate();
	    
	    if (getenv('APP_ENV') === 'local')
	    {
		    factory(LegalRepresentative::class, 26)->create();
	    }
    }
}
