<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;

class LegalRepresentativeTest extends TestCase
{
	use DatabaseTransactions;
	
	function setUp()
	{
		parent::setUp();
		$this->signIn();
	}
	
	function test_can_formatted_rut()
	{
		$legalRepresentative = factory(\Controlqtime\Core\Entities\LegalRepresentative::class)->create([
			'rut_representative' => '17.638.322-4'
		]);
		
		$this->seeInDatabase('legal_representatives', [
			'id'                 => $legalRepresentative->id,
			'rut_representative' => '17638322-4'
		]);
	}
	
	function test_can_formatted_birthday()
	{
		$legalRepresentative = factory(\Controlqtime\Core\Entities\LegalRepresentative::class)->create([
			'birthday' => '11-04-1980',
		]);
		
		$this->seeInDatabase('legal_representatives', [
			'id'       => $legalRepresentative->id,
			'birthday' => '1980-04-11'
		]);
	}
}
