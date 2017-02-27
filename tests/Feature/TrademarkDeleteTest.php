<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;

class TrademarkDeleteTest extends BrowserKitTestCase
{
    use DatabaseTransactions;

    protected $trademark;

    public function setUp()
    {
        parent::setUp();
        $this->signIn();
        $this->trademark = factory(\Controlqtime\Core\Entities\Trademark::class)->create();
    }

    public function test_delete_trademark()
    {
        $this->delete('maintainers/trademarks/'.$this->trademark->id)
            ->dontSeeInDatabase('trademarks', [
                'id'         => $this->trademark->id,
                'deleted_at' => null,
            ]);
    }
}
