<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;

class TypeSpecialityDeleteTest extends BrowserKitTestCase
{
    use DatabaseTransactions;

    protected $typeSpeciality;

    public function setUp()
    {
        parent::setUp();
        $this->signIn();
        $this->typeSpeciality = factory(\Controlqtime\Core\Entities\TypeSpeciality::class)->create();
    }

    public function test_delete_type_speciality()
    {
        $this->delete('maintainers/type-specialities/'.$this->typeSpeciality->id)
            ->dontSeeInDatabase('type_specialities', [
                'id'         => $this->typeSpeciality->id,
                'deleted_at' => null,
            ]);
    }
}
