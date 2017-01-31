<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;

class CompanyWithTrashedTest extends TestCase
{
	use DatabaseTransactions;
	
	protected $company;
	
	protected $legalRepresentative;
	
	protected $addressCompany;
	
	protected $addressLegal;
	
	protected $detailAddressCompany;
	
	function setUp()
	{
		parent::setUp();
		$this->signIn();
		$this->company = factory(\Controlqtime\Core\Entities\Company::class)->create();
		
		$this->legalRepresentative = factory(\Controlqtime\Core\Entities\LegalRepresentative::class)->create([
			'company_id' => $this->company->id
		]);
		
		$this->addressCompany = factory(\Controlqtime\Core\Entities\Address::class)->create([
			'addressable_id'   => $this->company->id,
			'addressable_type' => 'Controlqtime\Core\Entities\Company',
			'address'          => 'Vicuña Mackenna 2800',
			'phone1'           => '+56977190290',
			'phone2'           => '222808020',
			'commune_id'       => 1,
		]);
		
		$this->addressLegal = factory(\Controlqtime\Core\Entities\Address::class)->create([
			'addressable_id'   => $this->legalRepresentative->id,
			'addressable_type' => 'Controlqtime\Core\Entities\LegalRepresentative',
			'address'          => 'Av. La Florida 1909',
			'phone1'           => '+56981002912',
			'phone2'           => '2225601029',
			'commune_id'       => 1,
		]);
		
		$this->detailAddressCompany = factory(\Controlqtime\Core\Entities\DetailAddressCompany::class)->create([
			'address_id' => $this->addressCompany->id,
			'lot'        => '2B',
			'bod'        => '14',
			'ofi'        => '10',
			'floor'      => '10'
		]);
		
		$this->detailAddressLegalEmployee = factory(\Controlqtime\Core\Entities\DetailAddressLegalEmployee::class)->create([
			'address_id' => $this->addressLegal->id,
			'depto'      => '839',
			'block'      => '12',
			'num_home'   => '14'
		]);
	}
	
	/** @test */
	function edit_company_when_type_company_is_deleted()
	{
		$this->delete('maintainers/type-companies/' . $this->company->typeCompany->id);
		
		$this->visit('administration/companies/' . $this->company->id . '/edit')
			->seeInElement('#type_company_id', 'Seleccione Tipo Empresa...');
	}
}
