<?php

use Illuminate\Database\Seeder;
use Controlqtime\Core\Entities\Institution;

class InstitutionTableSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		DB::statement('SET FOREIGN_KEY_CHECKS=0;');
		DB::table('institutions')->truncate();
		
		Institution::create([
			'id'                  => 1,
			'type_institution_id' => 1,
			'name'                => 'Universidad Católica de Chile'
		]);
		
		Institution::create([
			'id'                  => 2,
			'type_institution_id' => 1,
			'name'                => 'Universidad Adolfo Ibáñez'
		]);
		
		Institution::create([
			'id'                  => 3,
			'type_institution_id' => 1,
			'name'                => 'Universidad de Chile'
		]);
		
		Institution::create([
			'id'                  => 4,
			'type_institution_id' => 1,
			'name'                => 'Universidad de Las Américas'
		]);
		
		Institution::create([
			'id'                  => 5,
			'type_institution_id' => 1,
			'name'                => 'Universidad de Los Andes'
		]);
		
		Institution::create([
			'id'                  => 6,
			'type_institution_id' => 1,
			'name'                => 'Universidad de Los Lagos'
		]);
		
		Institution::create([
			'id'                  => 7,
			'type_institution_id' => 1,
			'name'                => 'Universidad Tecnológica Metropolitana'
		]);
		
		Institution::create([
			'id'                  => 8,
			'type_institution_id' => 2,
			'name'                => 'CFT ICEL'
		]);
		
		Institution::create([
			'id'                  => 9,
			'type_institution_id' => 2,
			'name'                => 'CFT La Araucana'
		]);
		
		Institution::create([
			'id'                  => 10,
			'type_institution_id' => 2,
			'name'                => 'CFT Los Leones'
		]);
		
		Institution::create([
			'id'                  => 11,
			'type_institution_id' => 2,
			'name'                => 'CFT Manpower'
		]);
		
		Institution::create([
			'id'                  => 12,
			'type_institution_id' => 3,
			'name'                => 'IP Aiep'
		]);
		
		Institution::create([
			'id'                  => 13,
			'type_institution_id' => 3,
			'name'                => 'IP CIISA'
		]);
		
		Institution::create([
			'id'                  => 14,
			'type_institution_id' => 3,
			'name'                => 'IP de Arte y Comunicación ARCOS'
		]);
		
		Institution::create([
			'id'                  => 15,
			'type_institution_id' => 3,
			'name'                => 'IP de Chile'
		]);
		
		DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
