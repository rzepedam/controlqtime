<?php

use Illuminate\Database\Seeder;
use Controlqtime\Core\Entities\Gender;

class GenderTableSeeder extends Seeder
{
	public function run()
	{
		DB::statement('SET FOREIGN_KEY_CHECKS=0;');
		DB::table('genders')->truncate();
		
		Gender::create([
			'id'   => 1,
			'name' => 'Masculino'
		]);
		
		Gender::create([
			'id'   => 2,
			'name' => 'Femenino'
		]);
		
		DB::statement('SET FOREIGN_KEY_CHECKS=1;');
	}
}
