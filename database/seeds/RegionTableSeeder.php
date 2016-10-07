<?php

use Illuminate\Database\Seeder;
use Controlqtime\Core\Entities\Region;

class RegionTableSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		DB::statement('SET FOREIGN_KEY_CHECKS=0;');
		DB::table('regions')->truncate();
		
		Region::create([
			'id'   => 1,
			'name' => 'Región de Arica y Parinacota'
		]);
		
		Region::create([
			'id'   => 2,
			'name' => 'Región de Tarapacá'
		]);
		
		Region::create([
			'id'   => 3,
			'name' => 'Región de Antofagasta'
		]);
		
		Region::create([
			'id'   => 4,
			'name' => 'Región de Atacama'
		]);
		
		Region::create([
			'id'   => 5,
			'name' => 'Región de Coquimbo'
		]);
		
		Region::create([
			'id'   => 6,
			'name' => 'Región de Valparaiso'
		]);
		
		Region::create([
			'id'   => 7,
			'name' => 'Región Metropolitana de Santiago'
		]);
		
		Region::create([
			'id'   => 8,
			'name' => 'Región de Libertador General Bernardo OHiggins'
		]);
		
		Region::create([
			'id'   => 9,
			'name' => 'Región del Maule'
		]);
		
		Region::create([
			'id'   => 10,
			'name' => 'Región del Biobío'
		]);
		
		Region::create([
			'id'   => 11,
			'name' => 'Región de La Araucanía'
		]);
		
		Region::create([
			'id'   => 12,
			'name' => 'Región de Los Ríos'
		]);
		
		Region::create([
			'id'   => 13,
			'name' => 'Región de Los Lagos'
		]);
		
		Region::create([
			'id'   => 14,
			'name' => 'Región de Aisén del General Carlos Ibáñez del Campo'
		]);
		
		Region::create([
			'id'   => 15,
			'name' => 'Región de Magallanes y de la Antártica Chilena'
		]);
	
	    DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
