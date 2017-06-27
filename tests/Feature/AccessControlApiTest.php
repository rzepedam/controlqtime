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
    public function url_access_control_api()
    {
        $response = $this->post('/api/access-control');

		$response->assertResponseStatus(302);
    }

    /** @test */
    public function unauthenticated_access_control_api()
    {
        $headers = [
            'Authorization' => 'Bearer test',
        ];

        $this->json('POST', '/api/access-control', [], $headers)
            ->dontSeeJson([
                'error' => 'Unauthenticated.',
            ]);
    }

	/** @test */
    public function does_not_store_mark_when_device_number_is_wrong()
    {
		$rut = str_replace('.', '', $this->employee->rut);

		$data = [
			'rut'        => $rut,
			'num_device' => 'CE9D8A76-AD2C-40A0-9A61-007259F42CBA',
			'status'     => 1,
			'created_at' => Carbon::now(),
		];

		$this->json('POST', '/api/access-control', $data, [
			'Authorization' => 'Bearer ' . $this->token ])
			->seeJson(['status' => true]);
		dd($r->decodeResponseJson());
    }
    
    /** @test */
    public function create_access_control_api_success()
    {
        $rut = str_replace('.', '', $this->employee->rut);

        $data = [
            'rut'        => $rut,
            'num_device' => 'CE9D8A76-AD2C-40A0-9A61-007259F42CBA',
            'status'     => 1,
            'created_at' => Carbon::now(),
        ];

        $this->json('POST', '/api/access-control', $data, [
					'Authorization' => 'Bearer ' . $this->token ])
			->seeJson(['status' => true]);
    }

    /** @test */
    /*function not_create_access_control_if_rut_not_exists()
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
    }*/

    /** @test */
    public function not_create_access_control_if_rut_is_empty()
    {
        $data = [
            'rut'        => '',
            'num_device' => 'CE9D8A76-AD2C-40A0-9A61-007259F42CBA',
            'status'     => 1,
            'created_at' => Carbon::now(),
        ];

        $this->post('/api/access-control', $data, [
            'Authorization' => 'Bearer '.$this->token,
            'Accept'        => 'application/json', ])
            ->assertResponseStatus(422)
            ->seeJsonEquals([
                'rut' => ['El campo <strong>Rut</strong> es obligatorio.'],
            ]);
    }

    /** @test */
    public function not_create_access_control_if_num_device_is_empty()
    {
        $data = [
            'rut'        => '17032680-6',
            'num_device' => '',
            'status'     => 1,
            'created_at' => Carbon::now(),
        ];

        $this->post('/api/access-control', $data, [
            'Authorization' => 'Bearer '.$this->token,
            'Accept'        => 'application/json', ])
            ->assertResponseStatus(422)
            ->seeJsonEquals([
                'num_device' => ['El campo <strong>Nº Dispositivo</strong> es obligatorio.'],
            ]);
    }

    /** @test */
    public function not_create_access_control_if_status_is_empty()
    {
        $data = [
            'rut'        => '17032680-6',
            'num_device' => 'CE9D8A76-AD2C-40A0-9A61-007259F42CBA',
            'status'     => '',
            'created_at' => Carbon::now(),
        ];

        $this->post('/api/access-control', $data, [
            'Authorization' => 'Bearer '.$this->token,
            'Accept'        => 'application/json', ])
            ->assertResponseStatus(422)
            ->seeJsonEquals([
                'status' => ['El campo <strong>status</strong> es obligatorio.'],
            ]);
    }

    /** @test */
    public function not_create_access_control_if_created_at_is_empty()
    {
        $data = [
            'rut'        => '17032680-6',
            'num_device' => 'CE9D8A76-AD2C-40A0-9A61-007259F42CBA',
            'status'     => 1,
            'created_at' => '',
        ];

        $this->post('/api/access-control', $data, [
            'Authorization' => 'Bearer '.$this->token,
            'Accept'        => 'application/json', ])
            ->assertResponseStatus(422)
            ->seeJsonEquals([
                'created_at' => ['El campo <strong>Fecha Creación</strong> es obligatorio.'],
            ]);
    }

    /** @test */
    /*function not_save_if_data_is_duplicate()
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
            'Accept'        => 'application/json'
        ]);

        $this->post('/api/access-control', $data, [
            'Authorization' => 'Bearer ' . $this->token,
            'Accept'        => 'application/json'])
            ->assertResponseStatus(422)
            ->seeJsonEquals([
                'rut' => ['La combinación de valores ingresados ya existe.']
            ]);
    }*/

    /** @test */
    public function update_image_profile_employee_when_is_registry_in_biometry()
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
    }
}
