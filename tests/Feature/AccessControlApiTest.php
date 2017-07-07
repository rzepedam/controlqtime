<?php

use Carbon\Carbon;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AccessControlApiTest extends BrowserKitTestCase
{
	use DatabaseTransactions;

    protected $token;

    public function setUp()
    {
		parent::setUp();
		$this->signIn();
		$this->token = $this->user->createToken('Biometry')->accessToken;
	}

    /** @test */
    function url_access_control_api()
    {
        $response = $this->post('/api/access-control');

		$response->assertResponseStatus(302);
    }

    /** @test */
    function unauthenticated_access_control_api()
    {
        $headers = [
			'Authorization' => 'Bearer test',
        ];

        $this->json('POST', '/api/access-control', [], $headers)
            ->seeJson([ 'error' => 'Unauthenticated.' ]);
    }

	/** @test */
	function does_not_store_mark_when_num_device_is_wrong()
	{
		$rut = str_replace('.', '', $this->employee->rut);

		$data = [
			'rut'        => $rut,
			'num_device' => 'CE9D8A76-AD2C-40A0-9A61-007259F42CBA',
			'status'     => 1,
			'created_at' => '2017-07-03 19:18:10',
		];

		$this->json('POST', '/api/access-control', $data, [
					'Authorization' => 'Bearer ' . $this->token ])
			->assertResponseStatus(422)
			->seeJsonEquals(['num_device' => ['<strong>Nº Dispositivo</strong> es inválido.']]);
	}

    /** @test */
    function do_not_store_mark_when_is_duplicate()
    {
		$rut = str_replace('.', '', $this->employee->rut);

		$data = [
			'rut'        => $rut,
			'num_device' => 'DDFF4EC6-182B-4E37-961D-28211D63E45B',
			'status'     => 1,
			'created_at' => '2017-07-03 12:53:10',
		];

		// Primera inserción de datos
		$this->json('POST', '/api/access-control', $data, [
			'Authorization' => 'Bearer ' . $this->token ]);

		// Debe lanzar la duplicación de registros
		$this->json('POST', '/api/access-control', $data, [
				'Authorization' => 'Bearer ' . $this->token ])
			->assertResponseStatus(422)
			->seeJsonEquals(['rut' => ['La combinación de Rut, Fecha Creación ya existe.']]);
    }

    /** @test */
    function do_not_store_access_control_if_rut_does_not_exist()
    {
        $data = [
            'rut'        => '21955225-4',
            'num_device' => 'DDFF4EC6-182B-4E37-961D-28211D63E45B',
            'status'     => 1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ];

        $this->json('POST', '/api/access-control', $data, [
            	'Authorization' => 'Bearer ' . $this->token ])
			->assertResponseStatus(422)
			->seeJsonEquals(['rut' => ['El campo <strong>Rut</strong> no es válido.']]);
    }

    /** @test */
    function do_not_store_access_control_if_rut_is_empty()
    {
        $data = [
            'rut'        => '',
            'num_device' => 'DDFF4EC6-182B-4E37-961D-28211D63E45B',
            'status'     => 1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ];

        $this->json('POST', '/api/access-control', $data, [
            	'Authorization' => 'Bearer '.$this->token])
            ->assertResponseStatus(422)
            ->seeJsonEquals([
                'rut' => ['El campo <strong>Rut</strong> es obligatorio.'],
            ]);
    }

    /** @test */
    function do_not_store_access_control_if_num_device_is_empty()
    {
        $data = [
            'rut'        => '17032680-6',
            'num_device' => '',
            'status'     => 1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ];

        $this->json('POST', '/api/access-control', $data, [
            	'Authorization' => 'Bearer '.$this->token])
            ->assertResponseStatus(422)
            ->seeJsonEquals([
				'num_device' => ['<strong>Nº Dispositivo</strong> es inválido.'],
            ]);
    }

	/** @test */
	function do_not_store_access_control_if_num_device_is_wrong()
	{
		$data = [
			'rut'        => '17032680-6',
			'num_device' => 'AAVV4EC6-5500-4E37-961D-763483HADJH',
			'status'     => 1,
			'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
		];

		$this->json('POST', '/api/access-control', $data, [
			'Authorization' => 'Bearer '.$this->token])
			->assertResponseStatus(422)
			->seeJsonEquals([
				'num_device' => ['<strong>Nº Dispositivo</strong> es inválido.'],
			]);
	}

    /** @test */
    function do_not_store_access_control_if_status_is_empty()
    {
        $data = [
            'rut'        => '17032680-6',
            'num_device' => 'DDFF4EC6-182B-4E37-961D-28211D63E45B',
            'status'     => '',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ];

        $this->json('POST', '/api/access-control', $data, [
            	'Authorization' => 'Bearer '.$this->token])
            ->assertResponseStatus(422)
            ->seeJsonEquals([
                'status' => ['El campo <strong>status</strong> es obligatorio.'],
            ]);
    }

    /** @test */
    function do_not_store_access_control_if_created_at_is_empty()
    {
        $data = [
            'rut'        => '17032680-6',
            'num_device' => 'DDFF4EC6-182B-4E37-961D-28211D63E45B',
            'status'     => 1,
            'created_at' => '',
        ];

        $this->json('POST', '/api/access-control', $data, [
            	'Authorization' => 'Bearer '.$this->token])
            ->assertResponseStatus(422)
            ->seeJsonEquals([
                'created_at' => ['El campo <strong>Fecha Creación</strong> es obligatorio.'],
            ]);
    }

	/** @test */
	function create_access_control_api_success()
	{
		$rut = str_replace('.', '', $this->employee->rut);

		$data = [
			'rut'        => $rut,
			'num_device' => '06787B04-2454-4896-ACEB-D459610C4E61',
			'status'     => 1,
			'created_at' => '2017-07-04 10:42:39',
		];

		$this->json('POST', '/api/access-control', $data, [
				'Authorization' => 'Bearer ' . $this->token
			])->seeInDatabase('daily_assistance_apis', [
				'employee_id'	 				=> $this->employee->id,
				'period_every_eight_hour_id' 	=> 2,
				'rut' 							=> '17032680-6',
				'num_device' 					=> '06787B04-2454-4896-ACEB-D459610C4E61',
				'status' 						=> 1,
				'created_at' 					=> '2017-07-04 10:42:39',
			])->seeJsonEquals(['status' => true]);
	}

    /** @test */
    /*function update_image_profile_employee_when_is_registry_in_biometry()
    {
        $data = [
            'rut' => '17032689-6',
            'url' => 'https://s3-sa-east-1.amazonaws.com/biometry/faces/2016/07/18/200031564881.jpg',
        ];

        $this->put('api/updateEmployeeImage', $data, [
            'Authorization' => 'Bearer '.$this->token,
            'Accept'        => 'application/json', ])
            ->seeInDatabase('employees', [
                'rut' => '17032680-6',
                'url' => 'https://s3-sa-east-1.amazonaws.com/biometry/faces/2016/07/18/200031564881.jpg',
            ]);
    }*/
}
