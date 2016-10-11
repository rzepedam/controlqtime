<?php

use Illuminate\Database\Seeder;
use Controlqtime\Core\Entities\DetailAddressCompany;

class DetailAddressCompanyTableSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		DB::statement('SET FOREIGN_KEY_CHECKS=0;');
		DB::table('detail_address_companies')->truncate();
		
		DetailAddressCompany::create([
			'address_id' => 3,
			'lot'        => '',
			'bod'        => 14,
			'ofi'        => '',
			'floor'      => ''
		]);
		
		DB::statement('SET FOREIGN_KEY_CHECKS=1;');
	}
}
