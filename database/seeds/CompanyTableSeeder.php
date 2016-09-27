<?php

use Controlqtime\Core\Entities\Company;
use Illuminate\Database\Seeder;

class CompanyTableSeeder extends Seeder
{
    public function run()
    {
	    DB::table('companies')->truncate();
    }
}
