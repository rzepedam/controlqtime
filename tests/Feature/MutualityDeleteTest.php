<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;

class MutualityDeleteTest extends BrowserKitTestCase
{
    use DatabaseTransactions;

    protected $mutuality;

    public function setUp()
    {
        parent::setUp();
        $this->signIn();
        $this->mutuality = factory(\Controlqtime\Core\Entities\Mutuality::class)->create();
    }

    public function test_delete_mutuality()
    {
        $this->delete('maintainers/mutualities/'.$this->mutuality->id)
            ->dontSeeInDatabase('mutualities', [
                'id'         => $this->mutuality->id,
                'deleted_at' => null,
            ]);
    }
}
