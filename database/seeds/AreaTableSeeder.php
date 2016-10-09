<?php

use Illuminate\Database\Seeder;
use Controlqtime\Core\Entities\Area;

class AreaTableSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		DB::statement('SET FOREIGN_KEY_CHECKS=0;');
		DB::table('areas')->truncate();
		
		Area::create([
			'id'          => 1,
			'terminal_id' => 1,
			'name'        => 'COF'
		]);
		
		Area::create([
			'id'          => 2,
			'terminal_id' => 1,
			'name'        => 'Mantención'
		]);
		
		Area::create([
			'id'          => 3,
			'terminal_id' => 1,
			'name'        => 'Gerencia'
		]);
		
		DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
