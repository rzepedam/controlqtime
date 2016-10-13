<?php

use Illuminate\Database\Seeder;
use Controlqtime\Core\Entities\DetailAddressLegalEmployee;

class DetailAddressLegalEmployeeTableSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		DB::statement('SET FOREIGN_KEY_CHECKS=0;');
		DB::table('detail_address_legal_employees')->truncate();
		
		DetailAddressLegalEmployee::create([
			'id'         => 1,
			'address_id' => 1,
			'depto'      => '303',
			'block'      => '',
			'num_home'   => ''
		]);
		
		DetailAddressLegalEmployee::create([
			'id'         => 2,
			'address_id' => 2,
			'depto'      => '1506',
			'block'      => '',
			'num_home'   => ''
		]);
		
		DetailAddressLegalEmployee::create([
			'id'         => 3,
			'address_id' => 4,
			'depto'      => '',
			'block'      => '',
			'num_home'   => ''
		]);
		
		DB::statement('SET FOREIGN_KEY_CHECKS=1;');
	}
}
