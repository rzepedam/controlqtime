<?php

use Illuminate\Database\Seeder;
use Controlqtime\Core\Entities\User;

class UserTableSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		DB::statement('SET FOREIGN_KEY_CHECKS=0;');
		DB::table('users')->truncate();
		
		User::create([
			'email'    => 'raulmeza@controlqtime.cl',
			'password' => bcrypt('123456'),
		]);
		
		User::create([
			'email'    => 'robertozepeda@controlqtime.cl',
			'password' => bcrypt('123456'),
		]);
		
		DB::statement('SET FOREIGN_KEY_CHECKS=1;');
	}
}
