<?php

use Controlqtime\Core\Entities\TypeDisease;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TypeDiseaseEditTest extends BrowserKitTestCase
{
    use DatabaseTransactions;

    protected $typeDisease;

    public function setUp()
    {
        parent::setUp();
        $this->signIn();
        $this->typeDisease = factory(TypeDisease::class)->create();
    }

    public function test_edit_type_disease()
    {
        $this->visit('maintainers/type-diseases/'.$this->typeDisease->id.'/edit')
            ->seeInElement('h1', 'Editar Enfermedad: <span class="text-primary">'.$this->typeDisease->id.'</span>')
            ->seeInField('#name', $this->typeDisease->name)
            ->seeInElement('button', 'Actualizar');
    }

    public function test_update_type_disease()
    {
        $this->visit('maintainers/type-diseases/'.$this->typeDisease->id.'/edit')
            ->type('test', 'name')
            ->press('Actualizar')
            ->seeInDatabase('type_diseases', [
                'id'         => $this->typeDisease->id,
                'name'       => 'test',
                'deleted_at' => null,
            ]);
    }
}
