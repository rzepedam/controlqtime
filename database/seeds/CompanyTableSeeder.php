<?php

use Illuminate\Database\Seeder;
use Controlqtime\Core\Entities\Company;

class CompanyTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('companies')->truncate();

        $state = getenv('APP_ENV') === 'local' ? 'enable' : 'disable';

        $company = Company::create([
            'type_company_id' => 1,
            'rut'             => '76150396-0',
            'firm_name'       => 'Stop Frenos, Alejandro Ulises Piña Ocayo, E.I.R.L.',
            'gyre'            => 'Venta de partes, piezas y accesorios',
            'start_act'       => '01-08-2010',
            'muni_license'    => '203939',
            'email_company'   => 'ventas@grupoalfra.cl',
            'state'           => $state,
        ]);

		DB::table('area_company')->insert([
			'company_id' 	=> $company->id,
			'area_id' 		=> 1
		]);
    }
}
