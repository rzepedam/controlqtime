<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CompanyAreaTest extends TestCase
{
	use DatabaseTransactions;

	protected $typeCompany;
	protected $areas;

	function setUp()
	{
		parent::setup();
		$this->signIn();
		$this->typeCompany = factory(\Controlqtime\Core\Entities\TypeCompany::class)->create();
		$this->areas       = factory(\Controlqtime\Core\Entities\Area::class, 5)->create();
	}

	/** @test */
	function add_areas_to_company()
	{
		$data = [
			'type_company_id'        => $this->typeCompany->id,
			'rut'                    => '19.184.395-9',
			'firm_name'              => 'Locales Comerciales S.A',
			'gyre'                   => 'Compra y Venta de insumos deportivos',
			'start_act'              => '12-05-1998',
			'muni_license'           => 'KNNNMKDA2001',
			'email_company'          => 'localescomerciales@gmail.com',
			'address'                => 'Las Américas Norte 1090',
			'commune_id'             => $this->commune->id,
			'phone1'                 => '+56226709110',
			'male_surname'           => 'Morales',
			'female_surname'         => 'Carrasco',
			'first_name'             => 'Marcelo',
			'rut_representative'     => '12.022.583-9',
			'birthday'               => '29-10-1980',
			'nationality_id'         => $this->nationality->id,
			'address_representative' => '+59992289594',
			'phone1_representative'  => '+59992289594',
			'phone2_representative'  => '',
			'commune_legal_id'       => $this->commune->id,
			'email_representative'   => 'carloscarrasco@gmail.com',
			'area_id'                => [ $this->areas[0]->id, $this->areas[2]->id, $this->areas[4]->id ]
		];

		$this->postJson('administration/companies', $data)
			->assertStatus(200);

		$company = \Controlqtime\Core\Entities\Company::orderBy('id', 'DESC')->firstOrFail();
		$this->assertDatabaseHas('area_company', [
			'company_id' => $company->id,
			'area_id'    => $this->areas[0]->id
		])->assertDatabaseHas('area_company', [
			'company_id' => $company->id,
			'area_id'    => $this->areas[2]->id
		])->assertDatabaseHas('area_company', [
			'company_id' => $company->id,
			'area_id'    => $this->areas[4]->id
		]);
	}

	/** @test */
	function remove_areas_to_company()
	{
		// We create elements dependent on company
		$company        = factory(\Controlqtime\Core\Entities\Company::class)->create();
		$addressCompany = factory(\Controlqtime\Core\Entities\Address::class)->create([
			'addressable_id'   => $company->id,
			'addressable_type' => 'Controlqtime\Core\Entities\Company',
		]);

		factory(\Controlqtime\Core\Entities\DetailAddressCompany::class)->create([
			'address_id' => $addressCompany->id
		]);

		$legalRepresentative = factory(\Controlqtime\Core\Entities\LegalRepresentative::class)->create([
			'company_id' => $company->id
		]);

		$addressLegal        = factory(\Controlqtime\Core\Entities\Address::class)->create([
			'addressable_id'   => $legalRepresentative->id,
			'addressable_type' => 'Controlqtime\Core\Entities\LegalRepresentative',
		]);

		factory(\Controlqtime\Core\Entities\DetailAddressLegalEmployee::class)->create([
			'address_id' => $addressLegal->id,
		]);

		// We populate table with many areas
		$company->areas()->sync([ $this->areas[0]->id, $this->areas[2]->id, $this->areas[4]->id ]);

		$data = [
			'type_company_id'        => $this->typeCompany->id,
			'rut'                    => '19.184.395-9',
			'firm_name'              => 'Locales Comerciales S.A',
			'gyre'                   => 'Compra y Venta de insumos deportivos',
			'start_act'              => '12-05-1998',
			'muni_license'           => 'KNNNMKDA2001',
			'email_company'          => 'localescomerciales@gmail.com',
			'address'                => 'Las Américas Norte 1090',
			'commune_id'             => $this->commune->id,
			'phone1'                 => '+56226709110',
			'male_surname'           => 'Morales',
			'female_surname'         => 'Carrasco',
			'first_name'             => 'Marcelo',
			'rut_representative'     => '12.022.583-9',
			'birthday'               => '29-10-1980',
			'nationality_id'         => $this->nationality->id,
			'address_representative' => '+59992289594',
			'phone1_representative'  => '+59992289594',
			'phone2_representative'  => '',
			'commune_legal_id'       => $this->commune->id,
			'email_representative'   => 'carloscarrasco@gmail.com',
			'area_id'                => [ $this->areas[0]->id ]
		];

		$this->putJson('administration/companies/' . $company->id, $data)
			->assertExactJson([ 'status' => true, 'url' => '/administration/companies' ]);

		$this->assertDatabaseMissing('area_company', [
			'company_id' => $company->id,
			'area_id'    => $this->areas[2]->id
		])->assertDatabaseMissing('area_company', [
			'company_id' => $company->id,
			'area_id'    => $this->areas[4]->id
		])->assertDatabaseHas('area_company', [
			'company_id' => $company->id,
			'area_id'    => $this->areas[0]->id
		]);
	}
}
