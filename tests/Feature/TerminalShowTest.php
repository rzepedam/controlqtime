<?php

use Controlqtime\Core\Entities\Commune;
use Controlqtime\Core\Entities\Province;
use Controlqtime\Core\Entities\Region;
use Controlqtime\Core\Entities\Terminal;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TerminalShowTest extends BrowserKitTestCase
{
    use DatabaseTransactions;

    protected $commune;

    protected $province;

    protected $region;

    protected $terminal;

    public function setUp()
    {
        parent::setUp();
        $this->signIn();
        $this->region = factory(Region::class)->create();
        $this->province = factory(Province::class)->create();
        $this->commune = factory(Commune::class)->create();
        $this->terminal = factory(Terminal::class)->create();
    }

    public function test_show_terminal()
    {
        $this->visit('maintainers/terminals/'.$this->terminal->id)
            ->seeInElement('h1', 'Detalle Terminal: <span class="text-primary">'.$this->terminal->id.'</span>')
            ->seeInElement('td', $this->terminal->name)
            ->seeInElement('td', $this->terminal->address.', '.$this->terminal->commune->name.'. '.$this->terminal->commune->province->name.'. '.$this->terminal->commune->province->region->name);
    }
}
