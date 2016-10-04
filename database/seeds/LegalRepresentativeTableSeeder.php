<?php

use Illuminate\Database\Seeder;
use Controlqtime\Core\Entities\LegalRepresentative;

class LegalRepresentativeTableSeeder extends Seeder
{
    public function run()
    {
	    DB::table('legal_representatives')->truncate();
        factory(LegalRepresentative::class, 26)->create();
    }
}
