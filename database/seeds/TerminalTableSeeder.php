<?php

use Controlqtime\Core\Entities\Terminal;
use Illuminate\Database\Seeder;

class TerminalTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('terminals')->truncate();

        Terminal::create([
            'id'         => 1,
            'name'       => 'Terminal Norte',
            'address'    => 'Santa Raquel 10234',
            'commune_id' => '106',
        ]);

        Terminal::create([
            'id'         => 2,
            'name'       => 'Terminal Oriente',
            'address'    => 'Palacio Riesco 3819',
            'commune_id' => '102',
        ]);

        Terminal::create([
            'id'         => 3,
            'name'       => 'Terminal Sur',
            'address'    => 'Av. La Florida 1000',
            'commune_id' => '106',
        ]);

        Terminal::create([
            'id'         => 4,
            'name'       => 'Juanita',
            'address'    => 'Av. Juanita 1490',
            'commune_id' => '86',
        ]);

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
