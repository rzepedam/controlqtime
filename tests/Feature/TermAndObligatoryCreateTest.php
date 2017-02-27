<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;

class TermAndObligatoryCreateTest extends BrowserKitTestCase
{
    use DatabaseTransactions;

    protected $term;

    public function setUp()
    {
        parent::setUp();
        $this->signIn();
    }

    public function test_create_term_and_obligatory()
    {
        $this->visit('maintainers/terms-and-obligatories/create')
            ->seeInElement('h1', 'Crear Nueva Cláusula y Obligación')
            ->seeInElement('button', 'Guardar');
    }

    public function test_store_term_and_obligatory_with_default_equals_false()
    {
        $this->visit('maintainers/terms-and-obligatories/create')
            ->type('Test to new term and obligatory', 'name')
            ->press('Guardar')
            ->seeInDatabase('term_and_obligatories', [
                'name'    => 'Test to new term and obligatory',
                'default' => false,
            ]);
    }

    public function test_store_term_and_obligatory_with_default_equals_true()
    {
        $this->visit('maintainers/terms-and-obligatories/create')
            ->check('default')
            ->type('Test to Second create term and obligatory', 'name')
            ->press('Guardar')
            ->seeInDatabase('term_and_obligatories', [
                'name'    => 'Test to Second create term and obligatory',
                'default' => true,
            ]);
    }

    public function test_dont_see_default_true_in_database_when_is_save_with_false()
    {
        $this->visit('maintainers/terms-and-obligatories/create')
            ->type('Test with default equals false', 'name')
            ->press('Guardar')
            ->dontSeeInDatabase('term_and_obligatories', [
                'name'    => 'Test with default equals false',
                'default' => true,
            ]);
    }
}
