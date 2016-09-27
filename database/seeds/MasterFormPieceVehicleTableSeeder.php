<?php

use Illuminate\Database\Seeder;
use Controlqtime\Core\Entities\MasterFormPieceVehicle;

class MasterFormPieceVehicleTableSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		factory(MasterFormPieceVehicle::class, 1)->create()->each(function ($u)
		{
			for ($i = 1; $i <= 22; $i++)
			{
				$u->pieceVehicles()->attach([$i]);
				$i++;
			}
		});
	}
}
