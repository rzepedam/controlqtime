<?php

use Illuminate\Database\Seeder;
use Controlqtime\Core\Entities\Address;

class AddressTableSeeder extends Seeder
{
	public function run()
	{
		DB::table('addresses')->truncate();
		
		Address::create([
			'employee_id'    => 1,
			'address'        => 'Pérez Valenzuela 1209',
			'depto'          => '303',
			'commune_id'     => 118,
		]);
		
		Address::create([
			'employee_id'    => 2,
			'address'        => 'José Pedro Alessandri 61',
			'depto'          => '1506',
			'commune_id'     => 115,
		]);
		
		if (getenv('APP_ENV') === 'local')
		{
			factory(Address::class, 50)->create();
		}
		
	}
}
