<?php

namespace Controlqtime\Core\WebServices\Biometry;

use Controlqtime\Core\Contracts\BiometryInterface;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Config;

class Biometry implements BiometryInterface{

	private $client;

	public function __construct()
	{
		$this->client = new Client([
			'base_uri' => Config::get('biometry.url')
		]);
	}   

	public function create($employee)
	{
		$this->client->post('createOrUpdatePerson', [
			'form_params' => [
				'secret_key' => Config::get('biometry.secret_key'),
				'client'     => Config::get('biometry.client'),
				'action'     => 'add',
				'passport'   => $employee->rut,
				'first_name' => $employee->first_name,
				'last_name'  => $employee->male_surname
			]
		])->getBody();

	}
	
	public function delete($employee)
	{
		$this->client->post('createOrUpdatePerson', [
			'form_params' => [
				'secret_key' => Config::get('biometry.secret_key'),
				'client'     => Config::get('biometry.client'),
				'action'     => 'delete',
				'passport'   => $employee->rut,
			]
		])->getBody();

	}
}