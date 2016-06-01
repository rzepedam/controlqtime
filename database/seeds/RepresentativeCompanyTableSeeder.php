<?php

use Controlqtime\Core\Entities\RepresentativeCompany;
use Illuminate\Database\Seeder;

class RepresentativeCompanyTableSeeder extends Seeder
{
    public function run()
    {
        factory(RepresentativeCompany::class, 200)->create();
    }
}
