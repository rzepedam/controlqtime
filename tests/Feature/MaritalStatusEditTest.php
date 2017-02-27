<?php

use Controlqtime\Core\Entities\MaritalStatus;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class MaritalStatusEditTest extends BrowserKitTestCase
{
    use DatabaseTransactions;

    protected $maritalStatus;

    public function setUp()
    {
        parent::setUp();
        $this->signIn();
        $this->maritalStatus = factory(MaritalStatus::class)->create();
    }

    public function test_edit_marital_status()
    {
        $this->visit('maintainers/marital-statuses/'.$this->maritalStatus->id.'/edit')
            ->seeInElement('h1', 'Editar Estado Civil: <span class="text-primary">'.$this->maritalStatus->id.'</span>')
            ->seeInField('#name', $this->maritalStatus->name)
            ->seeInElement('button', 'Actualizar');
    }

    public function test_update_marital_status()
    {
        $this->visit('maintainers/marital-statuses/'.$this->maritalStatus->id.'/edit')
            ->type('test', 'name')
            ->press('Actualizar')
            ->seeInDatabase('marital_statuses', [
                'name'       => 'test',
                'deleted_at' => null,
            ]);
    }
}
