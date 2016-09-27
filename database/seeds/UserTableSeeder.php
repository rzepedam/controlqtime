<?php

use Controlqtime\Core\Entities\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		User::create([
			'name'     => 'Raúl Meza',
			'email'    => 'raulmeza@controlqtime.cl',
			'password' => bcrypt('123456'),
		]);
	}
}
