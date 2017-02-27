<?php

use Controlqtime\Core\Entities\Weight;
use Illuminate\Database\Seeder;

class WeightTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('weights')->truncate();

        Weight::create([
            'id'   => 1,
            'name' => 'Kilógramo',
            'acr'  => 'kg',
        ]);

        Weight::create([
            'id'   => 2,
            'name' => 'Tonelada',
            'acr'  => 'ton',
        ]);

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
