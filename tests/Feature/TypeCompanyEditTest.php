<?php

use Controlqtime\Core\Entities\TypeCompany;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TypeCompanyEditTest extends BrowserKitTestCase
{
    use DatabaseTransactions;

    protected $typeCompany;

    public function setUp()
    {
        parent::setUp();
        $this->signIn();
        $this->typeCompany = factory(TypeCompany::class)->create();
    }

    public function test_edit_type_company()
    {
        $this->visit('maintainers/type-companies/'.$this->typeCompany->id.'/edit')
            ->seeInElement('h1', 'Editar Tipo Empresa: <span class="text-primary">'.$this->typeCompany->id.'</span>')
            ->seeInField('#name', $this->typeCompany->name)
            ->seeInElement('button', 'Actualizar');
    }

    public function test_update_type_company()
    {
        $this->visit('maintainers/type-companies/'.$this->typeCompany->id.'/edit')
            ->type('test', 'name')
            ->press('Actualizar')
            ->seeInDatabase('type_companies', [
                'id'         => $this->typeCompany->id,
                'name'       => 'test',
                'deleted_at' => null,
            ]);
    }
}
