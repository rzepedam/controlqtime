<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;

class AreaWithTrashedTest extends BrowserKitTestCase
{
    use DatabaseTransactions;

    protected $area;

    public function setUp()
    {
        parent::setUp();
        $this->signIn();
        $this->area = factory(\Controlqtime\Core\Entities\Area::class)->create();
    }

    public function test_edit_area_when_terminal_is_deleted()
    {
        $this->delete('maintainers/terminals/'.$this->area->terminal->id);

        $this->visit('maintainers/areas/'.$this->area->id.'/edit')
            ->seeInField('name', $this->area->name)
            ->seeInElement('#terminal_id', 'Seleccione Terminal...');
    }
}
