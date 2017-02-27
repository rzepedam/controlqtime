<?php

use Controlqtime\Core\Entities\TypeContract;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TypeContractTest extends BrowserKitTestCase
{
    use DatabaseTransactions;

    protected $typeContract;

    public function setUp()
    {
        parent::setUp();
        $this->signIn();
        $this->typeContract = factory(TypeContract::class)->create();
    }

    /** @test */
    public function type_contract_url()
    {
        $this->visit('/maintainers/type-contracts')
            ->see('Listado de Tipos de Contrato')
            ->assertResponseOk();
    }

    /** @test */
    public function type_contract_route()
    {
        $this->visitRoute('type-contracts.index')
            ->assertResponseOk();
    }

    /** @test */
    public function create_new_type_contract_plazo_fijo()
    {
        $this->visit('maintainers/type-contracts/create')
            ->see('Crear Nuevo Tipo de Contrato')
            ->select('Plazo Fijo', 'name')
            ->type('3', 'dur')
            ->press('Guardar')
            ->seeInDatabase('type_contracts', [
                'name' => 'Plazo Fijo',
                'dur'  => 3,
            ]);
    }

    /** @test */
    public function dont_create_new_type_contract_plazo_fijo()
    {
        $this->visit('/maintainers/type-contracts/create')
            ->select('Plazo Fijo', 'name')
            ->type('', 'dur')
            ->press('Guardar')
            ->dontSeeInDatabase('type_contracts', [
                'name' => 'Plazo Fijo',
                'dur'  => '',
            ]);
    }

    /** @test */
    public function create_new_type_contract_indefinido()
    {
        $this->visit('/maintainers/type-contracts/create')
            ->select('Indefinido', 'name')
            ->press('Guardar')
            ->seeInDatabase('type_contracts', [
                'name'      => 'Indefinido',
                'dur'       => null,
                'full_name' => null,
            ]);
    }

    /** @test */
    public function edit_url_type_contract()
    {
        $this->visit('/maintainers/type-contracts/'.$this->typeContract->id.'/edit')
            ->see('Editar Tipo Contrato: <span class="text-primary">'.$this->typeContract->id.'</span>')
            ->assertResponseStatus(200);
    }

    /** @test */
    public function see_correct_default_values_in_edit()
    {
        $this->visit('/maintainers/type-contracts/'.$this->typeContract->id.'/edit')
            ->select($this->typeContract->name, 'name')
            ->seeInField('dur', $this->typeContract->dur)
            ->assertResponseOk();
    }
}
