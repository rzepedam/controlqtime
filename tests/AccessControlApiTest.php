<?php

use Carbon\Carbon;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AccessControlApiTest extends TestCase
{
	use DatabaseTransactions;
	
	protected $token;
	
	function setUp()
	{
		parent::setUp();
		$this->signIn();
		$this->token = $this->user->createToken('Biometry')->accessToken;
	}
	
	function test_url_access_control_api()
	{
		$response = $this->call('POST', '/api/access-control');
		
		$this->assertEquals(302, $response->getStatusCode());
	}
	
	function test_unauthenticated_access_control_api()
	{
		$headers = [
			'Authorization' => 'Bearer test',
			'Accept'        => 'application/json',
		];
		
		$this->post('/api/access-control', [], $headers)
			->dontSeeJson([
				'error' => 'Unauthenticated.'
			]);
	}
	
	function test_create_access_control_api_success()
	{
		$rut = str_replace('.', '', $this->employee->rut);
		
		$data = [
			'rut'        => $rut,
			'num_device' => 'CE9D8A76-AD2C-40A0-9A61-007259F42CBA',
			'status'     => 1,
			'created_at' => Carbon::now()
		];
		
		$this->post('/api/access-control', $data, [
			'Authorization' => 'Bearer ' . $this->token,
			'Accept'        => 'application/json'])
			->seeJson([
				'success' => true,
			]);
	}
	
	function test_not_create_access_control_if_rut_not_exists()
	{
		$data = [
			'rut'        => '21955225-4',
			'num_device' => 'CE9D8A76-AD2C-40A0-9A61-007259F42CBA',
			'status'     => 1,
			'created_at' => Carbon::now()
		];
		
		$this->post('/api/access-control', $data, [
			'Authorization' => 'Bearer ' . $this->token,
			'Accept'        => 'application/json'])
			->assertResponseStatus(500);
	}
	
	function test_not_create_access_control_if_rut_is_empty()
	{
		$data = [
			'rut'        => '',
			'num_device' => 'CE9D8A76-AD2C-40A0-9A61-007259F42CBA',
			'status'     => 1,
			'created_at' => Carbon::now()
		];
		
		$this->post('/api/access-control', $data, [
			'Authorization' => 'Bearer ' . $this->token,
			'Accept'        => 'application/json'])
			->assertResponseStatus(422)
			->seeJsonEquals([
				'rut' => ['El campo <strong>Rut</strong> es obligatorio.']
			]);
		
	}
	
	function test_not_create_access_control_if_num_device_is_empty()
	{
		$data = [
			'rut'        => '17032680-6',
			'num_device' => '',
			'status'     => 1,
			'created_at' => Carbon::now()
		];
		
		$this->post('/api/access-control', $data, [
			'Authorization' => 'Bearer ' . $this->token,
			'Accept'        => 'application/json'])
			->assertResponseStatus(422)
			->seeJsonEquals([
				'num_device' => ['El campo <strong>Nº Dispositivo</strong> es obligatorio.']
			]);
	}
	
	function test_not_create_access_control_if_status_is_empty()
	{
		$data = [
			'rut'        => '17032680-6',
			'num_device' => 'CE9D8A76-AD2C-40A0-9A61-007259F42CBA',
			'status'     => '',
			'created_at' => Carbon::now()
		];
		
		$this->post('/api/access-control', $data, [
			'Authorization' => 'Bearer ' . $this->token,
			'Accept'        => 'application/json'])
			->assertResponseStatus(422)
			->seeJsonEquals([
				'status' => ['El campo <strong>status</strong> es obligatorio.']
			]);
	}
	
	function test_not_create_access_control_if_created_at_is_empty()
	{
		$data = [
			'rut'        => '17032680-6',
			'num_device' => 'CE9D8A76-AD2C-40A0-9A61-007259F42CBA',
			'status'     => 1,
			'created_at' => ''
		];
		
		$this->post('/api/access-control', $data, [
			'Authorization' => 'Bearer ' . $this->token,
			'Accept'        => 'application/json'])
			->assertResponseStatus(422)
			->seeJsonEquals([
				'created_at' => ['El campo <strong>Fecha Creación</strong> es obligatorio.']
			]);
	}
	
	function test_not_save_if_data_is_duplicate()
	{
		$now = Carbon::now();
		$rut = str_replace('.', '', $this->employee->rut);
		
		$data = [
			'rut'        => $rut,
			'num_device' => 'CE9D8A76-AD2C-40A0-9A61-007259F42CBA',
			'status'     => 1,
			'created_at' => $now
		];
		
		$this->post('/api/access-control', $data, [
			'Authorization' => 'Bearer ' . $this->token,
			'Accept'        => 'application/json'])
			->assertResponseOk();
		
		$this->post('/api/access-control', $data, [
			'Authorization' => 'Bearer ' . $this->token,
			'Accept'        => 'application/json'])
			->assertResponseStatus(422)
			->seeJsonEquals([
				'rut' => ['La combinación de valores ingresados ya existe.']
			]);
	}
	
}
