<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;

class CompanyDeleteTest extends BrowserKitTestCase
{
    use DatabaseTransactions;

    protected $company;

    protected $legalRepresentative;

    protected $detailAddressCompany;

    protected $addressCompany;

    protected $addressLegal;

    public function setUp()
    {
        parent::setUp();
        $this->signIn();

        $this->company = factory(\Controlqtime\Core\Entities\Company::class)->states('enable')->create();

        $this->addressCompany = factory(\Controlqtime\Core\Entities\Address::class)->create([
            'addressable_id'   => $this->company->id,
            'addressable_type' => 'Controlqtime\Core\Entities\Company',
        ]);

        $this->detailAddressCompany = factory(\Controlqtime\Core\Entities\DetailAddressCompany::class)->create([
            'address_id' => $this->addressCompany->id,
        ]);

        $this->legalRepresentative = factory(\Controlqtime\Core\Entities\LegalRepresentative::class)->create([
            'company_id'         => $this->company->id,
            'rut_representative' => '12.077.637-1',
            'birthday'           => '14-08-1986',
        ]);

        $this->addressLegal = factory(\Controlqtime\Core\Entities\Address::class)->create([
            'addressable_id'   => $this->legalRepresentative->id,
            'addressable_type' => 'Controlqtime\Core\Entities\LegalRepresentative',
        ]);

        $this->detailAddressLegalEmployee = factory(\Controlqtime\Core\Entities\DetailAddressLegalEmployee::class)->create([
            'address_id' => $this->addressLegal->id,
            'depto'      => '',
            'block'      => '',
            'num_home'   => '',
        ]);
    }

    /** @test */
    public function delete_url_company()
    {
        $response = $this->call('DELETE', 'administration/companies/'.$this->company->id);
        $this->assertEquals(302, $response->getStatusCode());
    }

    /** @test */
    public function delete_company()
    {
        $this->delete('administration/companies/'.$this->company->id)
            ->dontSeeInDatabase('companies', [
                'id'         => $this->company->id,
                'deleted_at' => null, ])
            ->seeInDatabase('addresses', [
                'addressable_id'   => $this->company->id,
                'addressable_type' => 'Controlqtime\Core\Entities\Company',
                'address'          => $this->addressCompany->address,
                'commune_id'       => $this->addressCompany->commune_id,
                'phone1'           => $this->addressCompany->phone1,
                'phone2'           => $this->addressCompany->phone2, ])
            ->seeInDatabase('detail_address_companies', [
                'address_id' => $this->addressCompany->id,
                'lot'        => $this->detailAddressCompany->lot,
                'bod'        => $this->detailAddressCompany->bod,
                'ofi'        => $this->detailAddressCompany->ofi,
                'floor'      => $this->detailAddressCompany->floor, ])
            ->seeInDatabase('legal_representatives', [
                'company_id'           => $this->company->id,
                'male_surname'         => $this->legalRepresentative->male_surname,
                'female_surname'       => $this->legalRepresentative->female_surname,
                'first_name'           => $this->legalRepresentative->first_name,
                'rut_representative'   => '12077637-1',
                'birthday'             => '1986-08-14',
                'second_name'          => $this->legalRepresentative->second_name,
                'nationality_id'       => $this->legalRepresentative->nationality->id,
                'email_representative' => $this->legalRepresentative->email_representative, ])
            ->seeInDatabase('addresses', [
                'addressable_id'   => $this->legalRepresentative->id,
                'addressable_type' => 'Controlqtime\Core\Entities\LegalRepresentative',
                'address'          => $this->addressLegal->address,
                'commune_id'       => $this->addressLegal->commune_id,
                'phone1'           => $this->addressLegal->phone1,
                'phone2'           => $this->addressLegal->phone2, ])
            ->seeInDatabase('detail_address_legal_employees', [
                'address_id' => $this->addressLegal->id,
                'depto'      => $this->detailAddressLegalEmployee->depto,
                'block'      => $this->detailAddressLegalEmployee->block,
                'num_home'   => $this->detailAddressLegalEmployee->num_home,
            ]);
    }
}
