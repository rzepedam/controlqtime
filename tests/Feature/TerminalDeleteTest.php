<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;

class TerminalDeleteTest extends BrowserKitTestCase
{
    use DatabaseTransactions;

    protected $terminal;

    public function setUp()
    {
        parent::setUp();
        $this->signIn();
        $this->terminal = factory(\Controlqtime\Core\Entities\Terminal::class)->create();
    }

    public function test_delete_terminal()
    {
        $this->delete('maintainers/terminals/'.$this->terminal->id)
            ->dontSeeInDatabase('terminals', [
                'id'         => $this->terminal->id,
                'deleted_at' => null,
            ]);
    }
}
