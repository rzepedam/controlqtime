<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;

class TypeContractDeleteTest extends BrowserKitTestCase
{
    use DatabaseTransactions;

    protected $typeContract;

    public function setUp()
    {
        parent::setUp();
        $this->signIn();
        $this->typeContract = factory(\Controlqtime\Core\Entities\TypeContract::class)->create([
            'name' => 'Plazo Fijo',
        ]);
    }

    public function test_delete_type_contract()
    {
        $this->delete('maintainers/type-contracts/'.$this->typeContract->id)
            ->dontSeeInDatabase('type_contracts', [
                'id'         => $this->typeContract->id,
                'deleted_at' => null,
            ]);
    }
}
