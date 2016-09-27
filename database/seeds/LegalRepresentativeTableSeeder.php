<?php

use Controlqtime\Core\Entities\LegalRepresentative;
use Illuminate\Database\Seeder;

class LegalRepresentativeTableSeeder extends Seeder
{
    public function run()
    {
	    DB::table('legal_representatives')->truncate();
        factory(LegalRepresentative::class, 26)->create();
    }
}
