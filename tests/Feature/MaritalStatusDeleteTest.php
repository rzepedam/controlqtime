<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;

class MaritalStatusDeleteTest extends BrowserKitTestCase
{
    use DatabaseTransactions;

    protected $maritalStatus;

    public function setUp()
    {
        parent::setUp();
        $this->signIn();
        $this->maritalStatus = factory(\Controlqtime\Core\Entities\MaritalStatus::class)->create();
    }

    public function test_marital_status_delete()
    {
        $this->delete('maintainers/marital-statuses/'.$this->maritalStatus->id)
            ->dontSeeInDatabase('marital_statuses', [
                'id'         => $this->maritalStatus->id,
                'deleted_at' => null,
            ]);
    }
}
