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
        DB::table('users')->truncate();

        User::create([
            'employee_id' => 1,
            'email'       => 'raulmeza@controlqtime.cl',
            'password'    => 'grupo@lfr@12',
        ]);

        User::create([
            'employee_id' => 2,
            'email'       => 'robertozepeda@controlqtime.cl',
            'password'    => 'grupo@lfr@12',
        ]);
    }
}
