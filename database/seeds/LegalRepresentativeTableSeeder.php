<?php

use Controlqtime\Core\Entities\LegalRepresentative;
use Illuminate\Database\Seeder;

class LegalRepresentativeTableSeeder extends Seeder
{
    public function run()
    {
        factory(LegalRepresentative::class, 26)->create();
    }
}
