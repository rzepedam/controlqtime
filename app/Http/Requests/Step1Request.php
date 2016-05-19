<?php

namespace Controlqtime\Http\Requests;

use Controlqtime\Http\Requests\Forms\SanitizedRequest;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;

class Step1Request extends SanitizedRequest {

	protected $route;

	public function __construct(Route $route)
	{
		$this->route   = $route;
	}

	public function authorize()
	{
		return true;
	}

	public function rules()
	{
		switch ($this->method())
		{
			case 'POST':
			{
				$rules = [
					'male_surname'   => 'required|max:30',
					'female_surname' => 'required|max:30',
					'first_name'     => 'required|max:30',
					'second_name'    => 'max:30',
					'rut'            => 'required|max:15',
					'birthday'       => 'required|date',
					'nationality_id' => 'required|regex:/[0-9 -()+]+$/',
					'gender_id'      => 'required|regex:/[0-9 -()+]+$/',
					'address'        => 'required',
					'region_id'      => 'required|regex:/[0-9 -()+]+$/',
					'province_id'    => 'required|regex:/[0-9 -()+]+$/',
					'commune_id'     => 'required|regex:/[0-9 -()+]+$/',
					'email'          => 'required|email|max:100|unique:employees',
					'phone1'         => 'required|max:20',
					'phone2'         => 'max:20',
					'company_id'     => 'required|regex:/[0-9 -()+]+$/',
					'code'           => 'required'
				];

				if (Request::get('count_family_relationships') > 0)
				{
					foreach (range(0, Request::get('count_family_relationships') - 1) as $index)
					{
						$rules[ 'relationship_id.' . $index ]    = 'required|regex:/[0-9 -()+]+$/';
						$rules[ 'employee_family_id.' . $index ] = 'required|regex:/[0-9 -()+]+$/';
					}
				}

				return $rules;

			}


			case 'PUT':
			{

				$rules = [
					'male_surname'   => 'required|max:30',
					'female_surname' => 'required|max:30',
					'first_name'     => 'required|max:30',
					'second_name'    => 'max:30',
					'rut'            => 'required|max:15',
					'birthday'       => 'required|date',
					'nationality_id' => 'required|regex:/[0-9 -()+]+$/',
					'gender_id'      => 'required|regex:/[0-9 -()+]+$/',
					'address'        => 'required',
					'region_id'      => 'required|regex:/[0-9 -()+]+$/',
					'province_id'    => 'required|regex:/[0-9 -()+]+$/',
					'commune_id'     => 'required|regex:/[0-9 -()+]+$/',
					'email'          => 'required|email|max:100|unique:manpowers,email,' . $this->id,
					'phone1'         => 'required|max:20',
					'phone2'         => 'max:20',
					'company_id'     => 'required|regex:/[0-9 -()+]+$/',
					'code'           => 'required'
				];

				for ($i = 0; $i < Request::get('count_family_relationships'); $i ++)
				{
					$rules[ 'relationship_id' . $i ]    = 'required|regex:/[0-9 -()+]+$/';
					$rules[ 'employee_family_id' . $i ] = 'required|regex:/[0-9 -()+]+$/';
				}

				return $rules;

			}

		}
	}

	public function messages()
	{
		return [
			'relationship_id.0.required' 	=> 'El campo Relación 1 es obligatorio.',
			'relationship_id.1.required' 	=> 'El campo Relación 2 es obligatorio.',
			'relationship_id.2.required' 	=> 'El campo Relación 3 es obligatorio.',
			'relationship_id.3.required' 	=> 'El campo Relación 4 es obligatorio.',
			'relationship_id.4.required' 	=> 'El campo Relación 5 es obligatorio.',
			'employee_family_id.0.required' => 'El campo Nombre Familiar 1 es obligatorio.',
			'employee_family_id.1.required' => 'El campo Nombre Familiar 2 es obligatorio.',
			'employee_family_id.2.required' => 'El campo Nombre Familiar 3 es obligatorio.',
			'employee_family_id.3.required' => 'El campo Nombre Familiar 4 es obligatorio.',
			'employee_family_id.4.required' => 'El campo Nombre Familiar 5 es obligatorio.',
			'relationship_id.0.regex' 		=> 'El formato de Relación 1 es inválido.',
			'relationship_id.1.regex' 		=> 'El formato de Relación 2 es inválido.',
			'relationship_id.2.regex' 		=> 'El formato de Relación 3 es inválido.',
			'relationship_id.3.regex' 		=> 'El formato de Relación 4 es inválido.',
			'relationship_id.4.regex' 		=> 'El formato de Relación 5 es inválido.',
			'employee_family_id.0.regex' 	=> 'El formato de Nombre Familiar 1 es inválido.',
			'employee_family_id.1.regex' 	=> 'El formato de Nombre Familiar 2 es inválido.',
			'employee_family_id.2.regex' 	=> 'El formato de Nombre Familiar 3 es inválido.',
			'employee_family_id.3.regex' 	=> 'El formato de Nombre Familiar 4 es inválido.',
			'employee_family_id.4.regex' 	=> 'El formato de Nombre Familiar 5 es inválido.',
		];
	}

}
