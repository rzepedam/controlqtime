<?php

use Illuminate\Database\Seeder;
use Controlqtime\Core\Entities\StatePieceVehicle;

class StatePieceVehicleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
	    DB::statement('SET FOREIGN_KEY_CHECKS=0;');
	    DB::table('state_piece_vehicles')->truncate();
	
	    StatePieceVehicle::create([
		    'id'   => 1,
		    'name' => 'Bueno'
	    ]);
	
	    StatePieceVehicle::create([
		    'id'   => 2,
		    'name' => 'Dañado'
	    ]);
	
	    StatePieceVehicle::create([
		    'id'   => 3,
		    'name' => 'Faltante'
	    ]);
	
	    DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
