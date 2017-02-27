<?php

use Controlqtime\Core\Entities\Terminal;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TerminalTest extends BrowserKitTestCase
{
    use DatabaseTransactions;

    public function setUp()
    {
        parent::setUp();
        $this->signIn();
    }

    public function test_can_get_formatted_date_terminal()
    {
        $terminal = factory(Terminal::class)->create([
            'created_at' => '2016-12-06 08:50:00',
        ]);

        $this->assertEquals('martes 6 diciembre 2016 08:50:00', $terminal->formatted_created_at);
    }
}
