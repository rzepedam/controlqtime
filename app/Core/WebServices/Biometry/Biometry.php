<?php

namespace Controlqtime\Core\WebServices\Biometry;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Config;

class Biometry
{
    /**
     * @var Client
     */
    private $client;

    /**
     * Biometry constructor.
     */
    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => config('biometry.url'),
        ]);
    }

    /**
     * @param $employee
     */
    public function create($employee)
    {
        $this->client->post('createOrUpdatePerson', [
            'form_params' => [
                'secret_key' => config('biometry.secret_key'),
                'client'     => config('biometry.client'),
                'action'     => 'add',
                'passport'   => $employee->rut,
                'first_name' => $employee->first_name,
                'last_name'  => $employee->male_surname,
            ],
        ])->getBody();
    }

    /**
     * @param $employee
     */
    public function delete($employee)
    {
        $this->client->post('createOrUpdatePerson', [
            'form_params' => [
                'secret_key' => config('biometry.secret_key'),
                'client'     => config('biometry.client'),
                'action'     => 'delete',
                'passport'   => $employee->rut,
            ],
        ])->getBody();
    }
}
