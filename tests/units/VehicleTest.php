<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Controlqtime\Core\Entities\DateDocumentationVehicle;

class VehicleTest extends TestCase
{
	use DatabaseTransactions;
	
	function setUp()
	{
		parent::setUp();
		$this->signIn();
	}
	
	function test_get_acquisition_date_to_spanish_format_vehicle()
	{
		$vehicle = factory(\Controlqtime\Core\Entities\Vehicle::class)->states('enable')->create([
			'acquisition_date' => '12-12-2016'
		]);
		
		$this->assertEquals('lunes 12 diciembre 2016', $vehicle->acquisition_date_to_spanish_format);
		
	}
	
	function test_get_inscription_date_to_spanish_format_vehicle()
	{
		$vehicle = factory(\Controlqtime\Core\Entities\Vehicle::class)->states('enable')->create([
			'inscription_date' => '12-12-2016'
		]);
		
		$this->assertEquals('lunes 12 diciembre 2016', $vehicle->inscription_date_to_spanish_format);
		
	}
	
	function test_get_created_at_to_spanish_format_vehicle()
	{
		$vehicle = factory(\Controlqtime\Core\Entities\Vehicle::class)->states('enable')->create([
			'created_at' => '2016-12-12 17:35:02'
		]);
		
		$this->assertEquals('lunes 12 diciembre 2016 17:35:02', $vehicle->created_at_to_spanish_format);
		
	}
	
	function test_get_date_documentation_to_d_m_Y_format_vehicle()
	{
		$dateDocumentationVehicle = factory(DateDocumentationVehicle::class)->create([
			'emission_padron'       => '08-01-2014',
			'expiration_padron'     => '01-09-2017',
			'emission_insurance'    => '10-02-2015',
			'expiration_insurance'  => '10-12-2018',
			'emission_permission'   => '03-01-2010',
			'expiration_permission' => '05-10-2022'
		]);
		
		$this->assertEquals('08-01-2014', $dateDocumentationVehicle->emission_padron);
		$this->assertEquals('01-09-2017', $dateDocumentationVehicle->expiration_padron);
		$this->assertEquals('10-02-2015', $dateDocumentationVehicle->emission_insurance);
		$this->assertEquals('10-12-2018', $dateDocumentationVehicle->expiration_insurance);
		$this->assertEquals('03-01-2010', $dateDocumentationVehicle->emission_permission);
		$this->assertEquals('05-10-2022', $dateDocumentationVehicle->expiration_permission);
	}
}