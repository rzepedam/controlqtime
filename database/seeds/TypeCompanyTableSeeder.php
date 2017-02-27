<?php

use Controlqtime\Core\Entities\TypeCompany;
use Illuminate\Database\Seeder;

class TypeCompanyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('type_companies')->truncate();

        TypeCompany::create([
            'id'   => 1,
            'name' => 'Operador',
        ]);

        TypeCompany::create([
            'id'   => 2,
            'name' => 'Contratista',
        ]);

        TypeCompany::create([
            'id'   => 3,
            'name' => 'Proveedor',
        ]);

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
