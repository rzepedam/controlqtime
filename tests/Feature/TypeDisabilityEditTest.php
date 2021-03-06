<?php

use Controlqtime\Core\Entities\TypeDisability;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TypeDisabilityEditTest extends BrowserKitTestCase
{
    use DatabaseTransactions;

    protected $typeDisability;

    public function setUp()
    {
        parent::setUp();
        $this->signIn();
        $this->typeDisability = factory(TypeDisability::class)->create();
    }

    public function test_edit_type_disability()
    {
        $this->visit('maintainers/type-disabilities/'.$this->typeDisability->id.'/edit')
            ->seeInElement('h1', 'Editar Discapacidad: <span class="text-primary">'.$this->typeDisability->id.'</span>')
            ->seeInField('name', $this->typeDisability->name)
            ->seeInElement('button', 'Actualizar');
    }

    public function test_update_type_disability()
    {
        $this->visit('maintainers/type-disabilities/'.$this->typeDisability->id.'/edit')
            ->type('test', 'name')
            ->press('Actualizar')
            ->seeInDatabase('type_disabilities', [
                'id'         => $this->typeDisability->id,
                'name'       => 'test',
                'deleted_at' => null,
            ]);
    }
}
