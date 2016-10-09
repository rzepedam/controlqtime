<?php

use Illuminate\Database\Seeder;
use Controlqtime\Core\Entities\Trademark;

class TrademarkTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
	    DB::statement('SET FOREIGN_KEY_CHECKS=0;');
	    DB::table('trademarks')->truncate();
	
	    Trademark::create([
		    'id'   => 1,
		    'name' => 'Mercedes Benz'
	    ]);
	
	    Trademark::create([
		    'id'   => 2,
		    'name' => 'Volvo'
	    ]);
	
	    Trademark::create([
		    'id'   => 3,
		    'name' => 'Scannia'
	    ]);
	
	    Trademark::create([
		    'id'   => 4,
		    'name' => 'Honda'
	    ]);
	
	    DB::statement('SET FOREIGN_KEY_CHECKS=1;');
	    
    }
}
