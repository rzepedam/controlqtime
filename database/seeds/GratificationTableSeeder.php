<?php

use Illuminate\Database\Seeder;
use Controlqtime\Core\Entities\Gratification;

class GratificationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
	    DB::statement('SET FOREIGN_KEY_CHECKS=0;');
	    DB::table('gratifications')->truncate();
	
	    Gratification::create([
		    'id'   => 1,
		    'name' => '25% legal anticipada con tope de 4.75 SMM'
	    ]);
	
	    DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
