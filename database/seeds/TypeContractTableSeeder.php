<?php

use Controlqtime\Core\Entities\TypeContract;
use Illuminate\Database\Seeder;

class TypeContractTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('type_contracts')->truncate();

        TypeContract::create([
            'id'        => 1,
            'name'      => 'Indefinido',
            'dur'       => 0,
            'full_name' => 'Indefinido',
        ]);

        TypeContract::create([
            'id'        => 2,
            'name'      => 'Plazo Fijo',
            'dur'       => 3,
            'full_name' => 'Plazo Fijo 3 meses',
        ]);

        TypeContract::create([
            'id'        => 3,
            'name'      => 'Plazo Fijo',
            'dur'       => 6,
            'full_name' => 'Plazo Fijo 6 meses',
        ]);

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
