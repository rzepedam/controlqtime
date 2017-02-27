<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;

class CompanyEditTest extends BrowserKitTestCase
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

        $typeCompany = factory(\Controlqtime\Core\Entities\TypeCompany::class)->create([
            'name' => 'Operador',
        ]);

        $this->company = factory(\Controlqtime\Core\Entities\Company::class)->create([
            'type_company_id' => $typeCompany->id,
            'rut'             => '6.639.112-4',
            'start_act'       => '01-12-1979',
        ]);

        $this->legalRepresentative = factory(\Controlqtime\Core\Entities\LegalRepresentative::class)->create([
            'company_id'         => $this->company->id,
            'nationality_id'     => 1,
            'rut_representative' => '17.638.322-4',
            'birthday'           => '11-04-1980',
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
            'floor'      => '10',
        ]);

        $this->detailAddressLegalEmployee = factory(\Controlqtime\Core\Entities\DetailAddressLegalEmployee::class)->create([
            'address_id' => $this->addressLegal->id,
            'depto'      => '839',
            'block'      => '12',
            'num_home'   => '14',
        ]);
    }

    /** @test */
    public function edit_company()
    {
        $this->visit('administration/companies/'.$this->company->id.'/edit')
            ->seeInElement('h1', 'Editar Empresa: <span class="text-primary">'.$this->company->id.'</span>')
            ->seeInElement('#type_company_id', $this->company->typeCompany->name)
            ->seeInField('#rut', '6.639.112-4')
            ->seeInField('#firm_name', $this->company->firm_name)
            ->seeInField('#gyre', $this->company->gyre)
            ->seeInField('#start_act', '01-12-1979')
            ->seeInField('#muni_license', $this->company->muni_license)
            ->seeInField('#address', $this->company->address->address)
            ->seeInField('#lot', $this->company->address->detailAddressCompany->lot)
            ->seeInField('#bod', $this->company->address->detailAddressCompany->bod)
            ->seeInField('#ofi', $this->company->address->detailAddressCompany->ofi)
            ->seeInField('#floor', $this->company->address->detailAddressCompany->floor)
            ->seeInElement('#region_id', $this->company->address->commune->province->region->name)
            ->seeInElement('#province_id', $this->company->address->commune->province->name)
            ->seeInElement('#commune_id', $this->company->address->commune->name)
            ->seeInField('#phone1', $this->company->address->phone1)
            ->seeInField('#phone2', $this->company->address->phone2)
            ->seeInField('#email_company', $this->company->email_company)
            ->seeInField('#male_surname', $this->company->legalRepresentative->male_surname)
            ->seeInField('#female_surname', $this->company->legalRepresentative->female_surname)
            ->seeInField('#first_name', $this->company->legalRepresentative->first_name)
            ->seeInField('#second_name', $this->company->legalRepresentative->second_name)
            ->seeInField('#rut_representative', '17.638.322-4')
            ->seeInField('#birthday', '11-04-1980')
            ->seeInElement('#nationality_id', $this->company->legalRepresentative->nationality->name)
            ->seeInField('#address_representative', $this->company->legalRepresentative->address->address)
            ->seeInField('#depto', $this->company->legalRepresentative->address->detailAddressLegalEmployee->depto)
            ->seeInField('#block', $this->company->legalRepresentative->address->detailAddressLegalEmployee->block)
            ->seeInField('#num_home', $this->company->legalRepresentative->address->detailAddressLegalEmployee->num_home)
            ->seeInElement('#region_legal_id', $this->company->legalRepresentative->address->commune->province->region->name)
            ->seeInElement('#province_legal_id', $this->company->legalRepresentative->address->commune->province->name)
            ->seeInElement('#commune_legal_id', $this->company->legalRepresentative->address->commune->name)
            ->seeInField('#phone1_representative', $this->company->legalRepresentative->address->phone1)
            ->seeInField('#phone2_representative', $this->company->legalRepresentative->address->phone2)
            ->seeInField('#email_representative', $this->company->legalRepresentative->email_representative)
            ->seeInElement('button', 'Actualizar');
    }

    /** @test */
    public function update_company()
    {
        $typeCompany = factory(\Controlqtime\Core\Entities\TypeCompany::class)->create([
            'name' => 'Contratista',
        ]);

        $commune = factory(\Controlqtime\Core\Entities\Commune::class)->create([
            'province_id' => $this->province->id,
            'name'        => 'La Granja',
        ]);

        $nationality = factory(\Controlqtime\Core\Entities\Nationality::class)->create([
            'name' => 'Perú',
        ]);

        $this->visit('administration/companies/'.$this->company->id.'/edit')
            ->select($typeCompany->id, '#type_company_id')
            ->type('20.113.639-3', 'rut')
            ->type('Comercializadora de Alimentos PAG', 'firm_name')
            ->type('Venta de productos e insumos marinos', 'gyre')
            ->type('16-07-1985', 'start_act')
            ->type('37489327835', 'muni_license')
            ->type('Rosa Pérez 19', 'address')
            ->type('', 'lot')
            ->type('', 'bod')
            ->type('', 'ofi')
            ->type('', 'floor')
            ->select($commune->id, '#commune_id')
            ->type('+56973001909', '#phone1')
            ->type('2227041109', '#phone2')
            ->type('pag@gmail.com', 'email_company')
            ->type('Valenzuela', 'male_surname')
            ->type('Torres', 'female_surname')
            ->type('Alberto', 'first_name')
            ->type('', 'second_name')
            ->type('18.649.609-4', 'rut_representative')
            ->type('14-09-1980', 'birthday')
            ->select($nationality->id, '#nationality_id')
            ->type('Los Alerces 1669', 'address_representative')
            ->type('', 'depto')
            ->type('', 'block')
            ->type('', 'num_home')
            ->select($commune->id, '#commune_legal_id')
            ->type('+56961802809', 'phone1_representative')
            ->type('2228780990', 'phone2_representative')
            ->type('alberto.val@gmail.com', 'email_representative')
            ->press('Actualizar')
            ->seeInDatabase('companies', [
                'id'              => $this->company->id,
                'type_company_id' => $typeCompany->id,
                'rut'             => '20113639-3',
                'firm_name'       => 'Comercializadora de Alimentos PAG',
                'gyre'            => 'Venta de productos e insumos marinos',
                'start_act'       => '1985-07-16',
                'muni_license'    => '37489327835',
                'email_company'   => 'pag@gmail.com', ]);
            /*->seeInDatabase('addresses', [
                'addressable_id'   => $this->company->id,
                'addressable_type' => 'Controlqtime\Core\Entities\Company',
                'address'          => 'Rosa Pérez 19',
                'commune_id'       => $commune->id,
                'phone1'           => '+56973001909',
                'phone2'           => '2227041109'])
            ->seeInDatabase('detail_address_companies', [
                'lot'   => '',
                'bod'   => '',
                'ofi'   => '',
                'floor' => ''])
            ->seeInDatabase('legal_representatives', [
                'company_id'           => $this->company->id,
                'male_surname'         => 'Valenzuela',
                'female_surname'       => 'Torres',
                'first_name'           => 'Alberto',
                'second_name'          => '',
                'rut_representative'   => '18649609-4',
                'birthday'             => '1980-09-14',
                'nationality_id'       => $nationality->id,
                'email_representative' => 'alberto.val@gmail.com'])
            ->seeInDatabase('addresses', [
                'addressable_id'   => $this->company->legalRepresentative->id,
                'addressable_type' => 'Controlqtime\Core\Entities\LegalRepresentative',
                'address'          => 'Los Alerces 1669',
                'commune_id'       => $commune->id,
                'phone1'           => '+56961802809',
                'phone2'           => '2228780990'])
            ->seeInDatabase('detail_address_legal_employees', [
                'address_id' => $this->company->legalRepresentative->address->id,
                'depto'      => '',
                'block'      => '',
                'num_home'   => ''
            ]);*/
    }
}
