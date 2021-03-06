<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;

class TypeDisabilityDeleteTest extends BrowserKitTestCase
{
    use DatabaseTransactions;

    protected $typeDisability;

    public function setUp()
    {
        parent::setUp();
        $this->signIn();
        $this->typeDisability = factory(\Controlqtime\Core\Entities\TypeDisability::class)->create();
    }

    public function test_delete_type_disability()
    {
        $this->delete('maintainers/type-disabilities/'.$this->typeDisability->id)
            ->dontSeeInDatabase('type_disabilities', [
                'id'         => $this->typeDisability->id,
                'deleted_at' => null,
            ]);
    }
}
