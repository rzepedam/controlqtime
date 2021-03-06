<?php

use Controlqtime\Core\Entities\TypeCertification;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TypeCertificationEditTest extends BrowserKitTestCase
{
    use DatabaseTransactions;

    protected $typeCertification;

    public function setUp()
    {
        parent::setUp();
        $this->signIn();
        $this->typeCertification = factory(TypeCertification::class)->create();
    }

    public function test_edit_trademark()
    {
        $this->visit('maintainers/type-certifications/'.$this->typeCertification->id.'/edit')
            ->seeInField('#name', $this->typeCertification->name)
            ->see('Nombre')
            ->seeInElement('button', 'Actualizar');
    }

    public function test_update_trademark()
    {
        $this->visit('maintainers/type-certifications/'.$this->typeCertification->id.'/edit')
            ->type('test', 'name')
            ->press('Actualizar')
            ->seeInDatabase('type_certifications', [
                'id'         => $this->typeCertification->id,
                'name'       => 'test',
                'deleted_at' => null,
            ]);
    }
}
