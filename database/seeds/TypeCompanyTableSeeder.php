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
        DB::table('type_companies')->truncate();

        TypeCompany::create([
            'name' => 'Operador',
        ]);

        TypeCompany::create([
            'name' => 'Contratista',
        ]);

        TypeCompany::create([
            'name' => 'Proveedor',
        ]);
    }
}
