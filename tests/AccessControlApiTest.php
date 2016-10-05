<?php

use Carbon\Carbon;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AccessControlApiTest extends TestCase
{
	use DatabaseTransactions;
	
	function test_url_exists()
	{
		$response = $this->call('POST', '/api/access-control');
		
		$this->assertEquals(302, $response->getStatusCode());
	}
	
	function test_unauthenticated_access()
	{
		$headers = [
			'Authorization' => 'Bearer test',
			'Accept'        => 'application/json',
		];
		
		$this->post('/api/access-control', [], $headers)
			->seeJson([
				'error' => 'Unauthenticated.'
			]);
	}
	
	function test_create_access_control_success()
	{
		$data = [
			'rut'        => '13262628-6',
			'num_device' => 'CE9D8A76-AD2C-40A0-9A61-007259F42CBA',
			'status'     => 1,
			'created_at' => Carbon::now()
		];
		
		$this->post('/api/access-control', $data, [
				'Authorization' => getenv('BIOMETRY_BEARER'),
				'Accept'        => 'application/json'])
			->seeJson([
				'success' => true,
			]);
	}
	
	function test_not_create_access_control_if_rut_not_exists()
	{
		$data = [
			'rut'        => '',
			'num_device' => 'CE9D8A76-AD2C-40A0-9A61-007259F42CBA',
			'status'     => 1,
			'created_at' => Carbon::now()
		];
		
		$this->post('/api/access-control', $data, [
				'Authorization' => getenv('BIOMETRY_BEARER'),
				'Accept'        => 'application/json'])
			->assertResponseStatus(422)
			->seeJsonEquals([
				'rut' => ['El campo <strong>Rut</strong> es obligatorio.']
			]);
		
	}
	
	function test_not_create_access_control_if_num_device_not_exists()
	{
		$data = [
			'rut'        => '13262628-6',
			'num_device' => '',
			'status'     => 1,
			'created_at' => Carbon::now()
		];
		
		$this->post('/api/access-control', $data, [
				'Authorization' => getenv('BIOMETRY_BEARER'),
				'Accept'        => 'application/json'])
			->assertResponseStatus(422)
			->seeJsonEquals([
				'num_device' => ['El campo <strong>Nº Dispositivo</strong> es obligatorio.']
			]);
	}
	
	function test_not_create_access_control_if_status_not_exists()
	{
		$data = [
			'rut'        => '5809778-0',
			'num_device' => 'CE9D8A76-AD2C-40A0-9A61-007259F42CBA',
			'status'     => '',
			'created_at' => Carbon::now()
		];
		
		$this->post('/api/access-control', $data, [
				'Authorization' => getenv('BIOMETRY_BEARER'),
				'Accept'        => 'application/json'])
			->assertResponseStatus(422)
			->seeJsonEquals([
				'status' => ['El campo <strong>status</strong> es obligatorio.']
			]);
	}
	
	function test_not_create_access_control_if_created_at_not_exists()
	{
		$data = [
			'rut'        => '5809778-0',
			'num_device' => 'CE9D8A76-AD2C-40A0-9A61-007259F42CBA',
			'status'     => 1,
			'created_at' => ''
		];
		
		$this->post('/api/access-control', $data, [
				'Authorization' => getenv('BIOMETRY_BEARER'),
				'Accept'        => 'application/json'])
			->assertResponseStatus(422)
			->seeJsonEquals([
				'created_at' => ['El campo <strong>Fecha Creación</strong> es obligatorio.']
			]);
	}
	
	function test_not_save_if_data_is_duplicate()
	{
		$data = [
			'rut'        => '5809778-0',
			'num_device' => 'CE9D8A76-AD2C-40A0-9A61-007259F42CBA',
			'status'     => 1,
			'created_at' => '2016-10-05 12:00:00'
		];
		
		$this->post('/api/access-control', $data, [
				'Authorization' => getenv('BIOMETRY_BEARER'),
				'Accept'        => 'application/json'])
			->assertResponseOk();
		
		$this->post('/api/access-control', $data, [
			'Authorization' => getenv('BIOMETRY_BEARER'),
			'Accept'        => 'application/json'])
			->assertResponseStatus(422)
			->seeJsonEquals([
				'rut' => ['La combinación de Rut, Fecha Creación ya existe.']
			]);
	}
	
}
