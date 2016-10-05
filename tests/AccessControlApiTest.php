<?php

use Carbon\Carbon;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AccessControlApiTest extends TestCase
{
	/**
	 * @var array
	 */
	private $headers = [
		'Authorization' => 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6IjNhZDcyOTE0YzYxZDQyOTE3ZWMwMjUyMmNjYTExOGUwYTQ4MjIyYzUyMTkxMDE4OGExOGRjZDY0NjBjM2YwZTBlMGU4NjhjMWRmNzUzNjViIn0.eyJhdWQiOiIxIiwianRpIjoiM2FkNzI5MTRjNjFkNDI5MTdlYzAyNTIyY2NhMTE4ZTBhNDgyMjJjNTIxOTEwMTg4YTE4ZGNkNjQ2MGMzZjBlMGUwZTg2OGMxZGY3NTM2NWIiLCJpYXQiOjE0NzU2NzI1NjUsIm5iZiI6MTQ3NTY3MjU2NSwiZXhwIjo0NjMxMzQ2MTY1LCJzdWIiOiIxIiwic2NvcGVzIjpbXX0.tMEsvmnSDlI038ln6WptH3F7y6BLp9zDVDwMYxTji6PKZz8j_Kf63sSw78f2qBSlzaQ370RwXLydSFfSKYjecq3P8ZsUFD-O7-sK57yT_xYOVX_HWVmA1m2wpYNMEnaGDBhXDYq3Ym74wS0VIT_AcR2SyN8geCR5Wx0j4WPoOD1t4yW1Iegl3Gpc0i9ytV9FwUPbqhYEVnWwzxFOdW1wer9YtzeqVoKwP4wSNvEQIvHw8W9NEJ_-L22NbmHyvehYKchlURP2_118Uh6GlcOdpqev4t9Ajt0biy061ap_miNCf7MxmAuhGqB30dNvnv_xFHF7_Q8-YS-l_v5Yqw-sNSrnJfZk0ypxdsLycZKG95Oy7XfijkTIwjVSrje7Bgqta7RoWEdgSFN5U1TgwemwApXZ_FN5ybjVIbbnIiC8KT4En52FLglJ5qFtNzfw8PFGLYfON_SmdIsYoRa1XG5XhWUkUf1AKtZHdoBn6n4gRj7cseZ_OByDItvzxZ3TP4tOcjWo7YqPEZ3WkRALaR6prIR3wJDtjSu5yZThbmgXWSSCEzMjuM_dM17luflRDL82qEpKT9x-Gy16bkwTbVGA2_GmXCvqo_KuztlK6qelyPah5g97BMMKEmkzsO6vq-kuJnT6JMFhQNbv5GVOVX4TyIiLszbBMfuDsm6swlKOCaE',
		'Accept'        => 'application/json',
	];
	
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
		
		$this->post('/api/access-control', $data, $this->headers)
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
		
		$this->post('/api/access-control', $data, $this->headers)
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
		
		$this->post('/api/access-control', $data, $this->headers)
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
		
		$this->post('/api/access-control', $data, $this->headers)
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
		
		$this->post('/api/access-control', $data, $this->headers)
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
		
		$this->post('/api/access-control', $data, $this->headers)
			->assertResponseStatus(422)
			->seeJsonEquals([
				'rut' => ['La combinación de Rut, Fecha Creación ya existe.']
			]);
	}
	
}
