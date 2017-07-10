<?php

use Controlqtime\Core\Entities\Company;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CompanyTest extends BrowserKitTestCase
{
	use DatabaseTransactions;

	protected $company;
	protected $typeCompany;

	function setUp()
	{
		parent::setUp();
		$this->signIn();
		$this->typeCompany = factory(\Controlqtime\Core\Entities\TypeCompany::class)->create();
		$this->company     = factory(\Controlqtime\Core\Entities\Company::class)->create();

		$addressCompany = factory(\Controlqtime\Core\Entities\Address::class)->create([
			'addressable_id'   => $this->company->id,
			'addressable_type' => 'Controlqtime\Core\Entities\Company',
		]);

		factory(\Controlqtime\Core\Entities\DetailAddressCompany::class)->create([
			'address_id' => $addressCompany->id
		]);

		$legalRepresentative = factory(\Controlqtime\Core\Entities\LegalRepresentative::class)->create([
			'company_id' => $this->company->id
		]);

		$addressLegal        = factory(\Controlqtime\Core\Entities\Address::class)->create([
			'addressable_id'   => $legalRepresentative->id,
			'addressable_type' => 'Controlqtime\Core\Entities\LegalRepresentative',
		]);

		factory(\Controlqtime\Core\Entities\DetailAddressLegalEmployee::class)->create([
			'address_id' => $addressLegal->id,
		]);
	}

	/** @test */
	function scope_company()
	{
		$companyA = factory(Company::class)->states('enable')->create();
		$companyB = factory(Company::class)->states('disable')->create();

		$companyEnables = Company::enabled()->get();

		$this->assertTrue($companyEnables->contains($companyA));
		$this->assertFalse($companyEnables->contains($companyB));
	}

	/** @test */
	function can_formatted_rut_company()
	{
		$company = factory(Company::class)->create([
			'rut' => '6.639.112-4',
		]);

		$this->seeInDatabase('companies', [
			'id'  => $company->id,
			'rut' => '6639112-4',
		]);
	}

	/** @test */
	function get_rut_with_points_company()
	{
		$company = factory(Company::class)->create([
			'rut' => '6.639.112-4',
		]);

		$this->assertEquals('6.639.112-4', $company->rut);
	}

	/** @test */
	function can_formatted_start_act_company()
	{
		$company = factory(Company::class)->create([
			'start_act' => '01-12-1979',
		]);

		$this->seeInDatabase('companies', [
			'id'        => $company->id,
			'start_act' => '1979-12-01',
		]);
	}

	/** @test */
	function get_start_act_to_d_m_Y_company()
	{
		$company = factory(Company::class)->create([
			'start_act' => '01-12-1979',
		]);

		$this->assertEquals('01-12-1979', $company->start_act);
	}

	/** @test */
	function get_start_act_to_spanish_format_company()
	{
		$company = factory(Company::class)->create([
			'start_act' => '11-12-2016',
		]);

		$this->assertEquals('domingo 11 diciembre 2016', $company->start_act_to_spanish_format);
	}

	/** @test */
	function get_created_at_to_spanish_format_company()
	{
		$company = factory(Company::class)->create([
			'created_at' => '2016-12-11 20:50:18',
		]);

		$this->assertEquals('domingo 11 diciembre 2016 20:50:18', $company->created_at_to_spanish_format);
	}

	/** @test */
	function a_company_requires_a_valid_area_id()
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
		];

		// $data does not have area
		$this->postJson('/administration/companies', $data)
			->assertResponseStatus(422)
			->seeJson([ 'area_id' => [ 'El campo <strong>area id</strong> es obligatorio.' ] ]);

		$this->putJson('/administration/companies/' . $this->company->id, $data)
			->assertResponseStatus(422)
			->seeJson([ 'area_id' => [ 'El campo <strong>area id</strong> es obligatorio.' ] ]);

		// We added an invalid area
		$data += [ 'area_id' => 9999 ];

		$this->postJson('/administration/companies', $data)
			->assertResponseStatus(422)
			->seeJson([ 'area_id' => [ 'El campo <strong>area id</strong> no es válido.' ] ]);

		$this->putJson('/administration/companies/' . $this->company->id, $data)
			->assertResponseStatus(422)
			->seeJson([ 'area_id' => [ 'El campo <strong>area id</strong> no es válido.' ] ]);
	}
}
