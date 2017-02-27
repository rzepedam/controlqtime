<?php

use Controlqtime\Core\Entities\Position;
use Illuminate\Database\Seeder;

class PositionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('positions')->truncate();

        Position::create([
            'id'   => 1,
            'name' => 'Administrador',
        ]);

        Position::create([
            'id'   => 2,
            'name' => 'Gerente General',
        ]);

        Position::create([
            'id'   => 3,
            'name' => 'Contador',
        ]);

        Position::create([
            'id'   => 4,
            'name' => 'Secretario',
        ]);

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
