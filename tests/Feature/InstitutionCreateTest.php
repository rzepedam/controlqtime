<?php

use Controlqtime\Core\Entities\Institution;
use Controlqtime\Core\Entities\TypeInstitution;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class InstitutionCreateTest extends BrowserKitTestCase
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

    public function test_create_institution()
    {
        $this->visit('maintainers/institutions/create')
            ->seeInElement('h1', 'Crear Nueva Institución')
            ->see('Nombre')
            ->see('Tipo de Institución')
            ->seeInElement('#type_institution_id', $this->typeInstitution->name)
            ->see('Guardar');
    }

    public function test_store_institution()
    {
        $this->visit('maintainers/institutions/create')
            ->type('test', 'name')
            ->select($this->typeInstitution->id, 'type_institution_id')
            ->press('Guardar')
            ->seeInDatabase('institutions', [
                'name'                => 'test',
                'type_institution_id' => $this->typeInstitution->id,
                'deleted_at'          => null,
            ]);
    }
}
