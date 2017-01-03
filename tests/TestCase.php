<?php

use Controlqtime\Core\Entities\User;
use Controlqtime\Core\Entities\Region;
use Controlqtime\Core\Entities\Address;
use Controlqtime\Core\Entities\Commune;
use Controlqtime\Core\Entities\Employee;
use Controlqtime\Core\Entities\Province;
use Illuminate\Support\Facades\Notification;
use Controlqtime\Core\Entities\DetailAddressLegalEmployee;

class TestCase extends Illuminate\Foundation\Testing\TestCase
{
	/**
	 * The base URL to use while testing the application.
	 *
	 * @var string
	 */
	protected $baseUrl = 'http://controlqtime.dev';
	
	protected $nationality;
	
	protected $maritalStatus;
	
	protected $employee;
	
	protected $region;
	
	protected $province;
	
	protected $commune;
	
	protected $address;
	
	protected $detailAddressLegalEmployee;
	
	protected $user;
	
	/**
	 * Creates the application.
	 *
	 * @return \Illuminate\Foundation\Application
	 */
	public function createApplication()
	{
		$app = require __DIR__ . '/../bootstrap/app.php';
		
		$app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();
		
		return $app;
	}
	
	public function signIn($user = null, $employee = null, $detailAddressLegalEmployee = null)
	{
		if ( ! $user )
		{
			$this->nationality = factory(\Controlqtime\Core\Entities\Nationality::class)->create([
				'id'   => 1,
				'name' => 'Chile'
			]);
			
			$this->maritalStatus = factory(\Controlqtime\Core\Entities\MaritalStatus::class)->create([
				'id'   => 1,
				'name' => 'Soltero'
			]);
			
			$this->region = factory(Region::class)->create([
				'id'   => 1,
				'name' => 'Región Metropolitana de Santiago'
			]);
			
			$this->province = factory(Province::class)->create([
				'id'        => 1,
				'region_id' => $this->region->id,
				'name'      => 'Santiago'
			]);
			
			$this->commune = factory(Commune::class)->create([
				'id'          => 1,
				'province_id' => $this->province->id,
				'name'        => 'La Florida'
			]);
			
			$employee = factory(Employee::class)->states('enable')->create([
				'id'                => 1,
				'nationality_id'    => $this->nationality->id,
				'marital_status_id' => $this->maritalStatus->id,
				'male_surname'      => 'Meza',
				'female_surname'    => 'Mora',
				'first_name'        => 'Raúl',
				'second_name'       => 'Elías',
				'full_name'         => 'Raúl Elías Meza Mora',
				'rut'               => '17032680-6',
				'birthday'          => '11-06-1989',
				'is_male'           => 'M',
				'email_employee'    => 'raulmeza@controlqtime.cl',
				'url'               => 'https://s3-sa-east-1.amazonaws.com/biometry/faces/2016/07/18/200031564881.jpg',
				'created_at'        => '2016-12-12 09:13:21',
				'updated_at'        => '2016-12-12 10:13:21'
			]);
			
			$this->address = factory(Address::class)->create([
				'id'               => 1,
				'addressable_id'   => 1,
				'addressable_type' => 'Controlqtime\Core\Entities\Employee',
				'address'          => 'Santa Amalia 273',
				'commune_id'       => $this->commune->id,
				'phone1'           => '+56974155784',
				'phone2'           => '222624050',
			]);
			
			$this->detailAddressLegalEmployee = factory(DetailAddressLegalEmployee::class)->create([
				'id'         => 1,
				'address_id' => $this->address->id,
				'depto'      => '303',
				'block'      => '',
				'num_home'   => ''
			]);
			
			$user = factory(User::class)->create([
				'employee_id' => 1,
				'email'       => 'raulmeza@controlqtime.cl',
				'password'    => bcrypt("raulmeza@controlqtime.cl")
			]);
		}
		
		$this->employee                   = $employee;
		$this->detailAddressLegalEmployee = $detailAddressLegalEmployee;
		$this->user                       = $user;
		$this->actingAs($this->user);
		Notification::fake();
		
		return $this;
	}
	
}
