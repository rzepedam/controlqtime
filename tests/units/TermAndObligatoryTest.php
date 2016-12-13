<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;

class TermAndObligatoryTest extends TestCase
{
	use DatabaseTransactions;
	
	protected $term;
	
	function setUp()
	{
		parent::setUp();
		$this->signIn();
	}
	
    function test_save_with_default_true_term_and_obligatory()
    {
        $termAndObligatory = factory(\Controlqtime\Core\Entities\TermAndObligatory::class)->create([
        	'default' => 'on'
        ]);
        
        $this->assertTrue($termAndObligatory->default);
    }
	
	function test_save_with_default_false_term_and_obligatory()
	{
		$termAndObligatory = factory(\Controlqtime\Core\Entities\TermAndObligatory::class)->create([
			'default' => false
		]);
		
		$this->assertFalse($termAndObligatory->default);
	}
}
