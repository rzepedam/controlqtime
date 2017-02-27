<?php

use Controlqtime\Core\Entities\Relationship;
use Illuminate\Database\Seeder;

class RelationshipTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('relationships')->truncate();

        Relationship::create([
            'id'   => 1,
            'name' => 'Padre',
        ]);

        Relationship::create([
            'id'   => 2,
            'name' => 'Madre',
        ]);

        Relationship::create([
            'id'   => 3,
            'name' => 'Hijo',
        ]);

        Relationship::create([
            'id'   => 4,
            'name' => 'Tía',
        ]);

        Relationship::create([
            'id'   => 5,
            'name' => 'Primo',
        ]);

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
