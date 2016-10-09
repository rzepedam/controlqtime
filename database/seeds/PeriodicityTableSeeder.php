<?php

use Illuminate\Database\Seeder;
use Controlqtime\Core\Entities\Periodicity;

class PeriodicityTableSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		DB::statement('SET FOREIGN_KEY_CHECKS=0;');
		DB::table('periodicities')->truncate();
		
		Periodicity::create([
			'id'   => 1,
			'name' => 'Mensual'
		]);
		
		Periodicity::create([
			'id'   => 2,
			'name' => 'Semanal'
		]);
		
		Periodicity::create([
			'id'   => 3,
			'name' => 'Anual'
		]);
		
		DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
