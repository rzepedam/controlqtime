<?php

use Controlqtime\Core\Entities\MasterFormPieceVehicle;
use Illuminate\Database\Seeder;

class MasterFormPieceVehicleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('master_form_piece_vehicles')->truncate();

        factory(MasterFormPieceVehicle::class, 1)->create()->each(function ($u) {
            for ($i = 1; $i <= 22; $i++) {
                $u->pieceVehicles()->attach([$i]);
                $i++;
            }
        });

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
