<?php

use Illuminate\Database\Seeder;

class ManpowerTableSeeder extends Seeder
{
    public function run()
    {
        factory(Controlqtime\Manpower::class, 3)->create();
    }
}
