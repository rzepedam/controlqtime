<?php

use Illuminate\Database\Seeder;
use Controlqtime\Core\Entities\Pension;

class PensionTableSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		DB::statement('SET FOREIGN_KEY_CHECKS=0;');
		DB::table('pensions')->truncate();
		
		Pension::create([
			'id'   => 1,
			'name' => 'Capital',
			'com'  => 0.0144
		]);
		
		Pension::create([
			'id'   => 2,
			'name' => 'CUPRUM',
			'com'  => 0.0148
		]);
		
		Pension::create([
			'id'   => 3,
			'name' => 'Hábitat',
			'com'  => 0.0127
		]);
		
		Pension::create([
			'id'   => 4,
			'name' => 'Modelo',
			'com'  => 0.0077
		]);
		
		Pension::create([
			'id'   => 5,
			'name' => 'Plan Vital',
			'com'  => 0.0041
		]);
		
		Pension::create([
			'id'   => 6,
			'name' => 'Provida',
			'com'  => 0.0154
		]);
		
		DB::statement('SET FOREIGN_KEY_CHECKS=1;');
	}
}
