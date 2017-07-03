<?php

use Illuminate\Database\Seeder;
use Controlqtime\Core\Entities\Company;

class CompanyTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('companies')->truncate();

        $state = getenv('APP_ENV') === 'local' ? 'enable' : 'disable';

        Company::create([
            'id'              => 1,
            'type_company_id' => 1,
            'rut'             => '76150396-0',
            'firm_name'       => 'Stop Frenos, Alejandro Ulises Piña Ocayo, E.I.R.L.',
            'gyre'            => 'Venta de partes, piezas y accesorios',
            'start_act'       => '01-08-2010',
            'muni_license'    => '203939',
            'email_company'   => 'ventas@grupoalfra.cl',
            'state'           => $state,
        ]);

        factory(\Controlqtime\Core\Entities\Company::class, 3)->create();

        $companies 	= \Controlqtime\Core\Entities\Company::all();
        $areas 		= \Controlqtime\Core\Entities\Area::all();

        foreach($companies as $company)
		{
			$num = rand(1, 3);
			for ($i = 0; $i < $num; $i ++)
			{
				DB::table('area_company')->insert([
					'company_id' 	=> $company->id,
					'area_id' 		=> $areas[$i]->id
				]);
			}
		}
    }
}
