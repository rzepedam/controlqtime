<?php

use Controlqtime\Core\Entities\Institution;
use Controlqtime\Core\Entities\TypeInstitution;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class InstitutionEditTest extends BrowserKitTestCase
{
    use DatabaseTransactions;

    protected $institution;

    protected $typeInstitution;

    public function setUp()
    {
        parent::setUp();
        $this->signIn();
        $this->typeInstitution = factory(TypeInstitution::class)->create();
        $this->institution = factory(Institution::class)->create();
    }

    public function test_edit_institution()
    {
        $this->visit('maintainers/institutions/'.$this->institution->id.'/edit')
            ->seeInElement('h1', 'Editar Institución: <span class="text-primary">'.$this->institution->id.'</span>')
            ->seeInField('#name', $this->institution->name)
            ->seeInElement('#type_institution_id', $this->typeInstitution->id)
            ->see('Actualizar');
    }

    public function test_update_institution()
    {
        $id = $this->institution->id + 1;
        $typeInstitution = factory(TypeInstitution::class)->create([
            'id'   => $id,
            'name' => 'test',
        ]);

        $this->visit('maintainers/institutions/'.$this->institution->id.'/edit')
            ->type('test', 'name')
            ->select($typeInstitution->id, '#type_institution_id')
            ->press('Actualizar')
            ->seeInDatabase('institutions', [
                'id'                  => $this->institution->id,
                'name'                => 'test',
                'type_institution_id' => $typeInstitution->id,
                'deleted_at'          => null,
            ]);
    }
}
