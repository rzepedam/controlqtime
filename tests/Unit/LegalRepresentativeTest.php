<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;

class LegalRepresentativeTest extends BrowserKitTestCase
{
	use DatabaseTransactions;
	
	function setUp()
	{
		parent::setUp();
		$this->signIn();
	}
	
	function test_can_formatted_rut_legal_representative()
	{
		$legalRepresentative = factory(\Controlqtime\Core\Entities\LegalRepresentative::class)->create([
			'rut_representative' => '17.638.322-4'
		]);
		
		$this->seeInDatabase('legal_representatives', [
			'id'                 => $legalRepresentative->id,
			'rut_representative' => '17638322-4'
		]);
	}
	
	function test_get_rut_with_points_legal_representative()
	{
		$legalRepresentative = factory(\Controlqtime\Core\Entities\LegalRepresentative::class)->create([
			'rut_representative' => '17.638.322-4'
		]);
		
		$this->assertEquals('17.638.322-4', $legalRepresentative->rut_representative);
	}
	
	function test_can_formatted_birthday_legalRepresentative()
	{
		$legalRepresentative = factory(\Controlqtime\Core\Entities\LegalRepresentative::class)->create([
			'birthday' => '11-04-1980',
		]);
		
		$this->seeInDatabase('legal_representatives', [
			'id'       => $legalRepresentative->id,
			'birthday' => '1980-04-11'
		]);
	}
	
	function test_get_age_legal_representative()
	{
		$legalRepresentative = factory(\Controlqtime\Core\Entities\LegalRepresentative::class)->create([
			'birthday' => '11-04-1980',
		]);
		
		$this->assertEquals('36', $legalRepresentative->age);
	}
}
