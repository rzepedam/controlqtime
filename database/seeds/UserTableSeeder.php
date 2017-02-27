<?php

use Controlqtime\Core\Entities\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('users')->truncate();

        User::create([
            'id'          => 1,
            'employee_id' => 1,
            'email'       => 'raulmeza@controlqtime.cl',
            'password'    => bcrypt('grupo@lfr@12'),
        ]);

        User::create([
            'id'          => 2,
            'employee_id' => 2,
            'email'       => 'robertozepeda@controlqtime.cl',
            'password'    => bcrypt('grupo@lfr@12'),
        ]);

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
