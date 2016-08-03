<?php

namespace Controlqtime\Http\Requests;

use Controlqtime\Http\Requests\Forms\SanitizedRequest;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Request;

class CompanyRequest extends SanitizedRequest {

	protected $route;

	public function __construct(Route $route, Request $request)
	{
		$this->route   = $route;
		$this->request = $request;
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
					'type_company_id' => 'required|regex:/[0-9 -()+]+$/',
					'rut'             => 'required|unique:companies,rut|max:10',
					'firm_name'       => 'required',
					'gyre'            => 'required',
					'start_act'       => 'required|date',
					'address'         => 'required',
					'commune_id'      => 'required|integer',
					'lot'             => 'max:20',
					'bod'             => 'max:5',
					'ofi'             => 'max:5',
					'floor'           => 'regex:/[0-9 -()+]+$/|digits_between:1,3',
					'muni_license'    => 'required|max:50',
					'phone1'          => 'required|max:20',
					'phone2'          => 'max:20',
					'email_company'   => 'required|email|unique:companies,email_company|max:60',
				];

				if ( Request::get('count_representative_company') > 0 )
				{
					foreach (range(0, Request::get('count_representative_company') - 1) as $index)
					{
						$rules[ 'id_representative.' . $index ]     = 'required|in:0';
						$rules[ 'male_surname.' . $index ]          = 'required|max:30';
						$rules[ 'female_surname.' . $index ]        = 'required|max:30';
						$rules[ 'first_name.' . $index ]            = 'required|max:30';
						$rules[ 'second_name.' . $index ]           = 'max:30';
						$rules[ 'rut_representative.' . $index ]    = 'required|max:15|unique:representative_companies,rut_representative';
						$rules[ 'birthday.' . $index ]              = 'required|date';
						$rules[ 'nationality_id.' . $index ]        = 'required|regex:/[0-9 -()+]+$/';
						$rules[ 'phone1_representative.' . $index ] = 'required|max:20';
						$rules[ 'phone2_representative.' . $index ] = 'max:20';
						$rules[ 'email_representative.' . $index ]  = 'required|max:60|email|unique:representative_companies,email_representative';
					}
				}

				return $rules;
			}

			case 'PUT':
			{
				$rules = [
					'type_company_id' => 'required|regex:/[0-9 -()+]+$/',
					'rut'             => 'required|max:10|unique:companies,rut,' . $this->route->getParameter('companies'),
					'firm_name'       => 'required',
					'gyre'            => 'required',
					'start_act'       => 'required|date',
					'address'         => 'required',
					'commune_id'      => 'required|integer',
					'lot'             => 'max:20',
					'bod'             => 'max:5',
					'ofi'             => 'max:5',
					'floor'           => 'regex:/[0-9 -()+]+$/|digits_between:1,3',
					'muni_license'    => 'required|max:50',
					'phone1'          => 'required|max:20',
					'phone2'          => 'max:20',
					'email_company'   => 'required|email|max:60|unique:companies,email_company,' . $this->route->getParameter('companies'),
				];

				if ( Request::get('count_representative_company') > 0 )
				{
					foreach (range(0, Request::get('count_representative_company') - 1) as $index)
					{
						$rules[ 'id_representative.' . $index ]     = 'required|regex:/[0-9 -()+]+$/';
						$rules[ 'male_surname.' . $index ]          = 'required|max:30';
						$rules[ 'female_surname.' . $index ]        = 'required|max:30';
						$rules[ 'first_name.' . $index ]            = 'required|max:30';
						$rules[ 'second_name.' . $index ]           = 'max:30';
						$rules[ 'rut_representative.' . $index ]    = 'required|max:15|unique:representative_companies,rut_representative,' . Request::get('id_representative')[ $index ];
						$rules[ 'birthday.' . $index ]              = 'required|date';
						$rules[ 'nationality_id.' . $index ]        = 'required|regex:/[0-9 -()+]+$/';
						$rules[ 'phone1_representative.' . $index ] = 'required|max:20';
						$rules[ 'phone2_representative.' . $index ] = 'max:20';

						if ( Request::get('id_representative')[ $index ] == 0 )
							$rules[ 'email_representative.' . $index ] = 'required|max:60|email|unique:representative_companies,email_representative';
						else
							$rules[ 'email_representative.' . $index ] = 'required|max:60|email|unique:representative_companies,email_representative,' . Request::get('id_representative')[ $index ];
					}
				}

				return $rules;
			}
		}
	}

	public function messages()
	{
		return [
			'id_representative.0.required'     => 'El campo ID Representante Empresa 1 es obligatorio.',
			'id_representative.1.required'     => 'El campo ID Representante Empresa 2 es obligatorio.',
			'id_representative.2.required'     => 'El campo ID Representante Empresa 3 es obligatorio.',
			'id_representative.3.required'     => 'El campo ID Representante Empresa 4 es obligatorio.',
			'id_representative.4.required'     => 'El campo ID Representante Empresa 5 es obligatorio.',
			'id_representative.0.in'           => 'El campo ID Representante Empresa 1 es inválido.',
			'id_representative.1.in'           => 'El campo ID Representante Empresa 2 es inválido.',
			'id_representative.2.in'           => 'El campo ID Representante Empresa 3 es inválido.',
			'id_representative.3.in'           => 'El campo ID Representante Empresa 4 es inválido.',
			'id_representative.4.in'           => 'El campo ID Representante Empresa 5 es inválido.',
			'id_representative.0.regex'        => 'El formato de ID Representante Empresa 1 es inválido.',
			'id_representative.1.regex'        => 'El formato de ID Representante Empresa 2 es inválido.',
			'id_representative.2.regex'        => 'El formato de ID Representante Empresa 3 es inválido.',
			'id_representative.3.regex'        => 'El formato de ID Representante Empresa 4 es inválido.',
			'id_representative.4.regex'        => 'El formato de ID Representante Empresa 5 es inválido.',
			'male_surname.0.required'          => 'El campo Apellido Paterno Representante Empresa 1 es obligatorio.',
			'male_surname.1.required'          => 'El campo Apellido Paterno Representante Empresa 2 es obligatorio.',
			'male_surname.2.required'          => 'El campo Apellido Paterno Representante Empresa 3 es obligatorio.',
			'male_surname.3.required'          => 'El campo Apellido Paterno Representante Empresa 4 es obligatorio.',
			'male_surname.4.required'          => 'El campo Apellido Paterno Representante Empresa 5 es obligatorio.',
			'male_surname.0.max'               => 'El campo Apellido Paterno Representante Empresa 1 no debe ser mayor que 30 caracteres.',
			'male_surname.1.max'               => 'El campo Apellido Paterno Representante Empresa 2 no debe ser mayor que 30 caracteres.',
			'male_surname.2.max'               => 'El campo Apellido Paterno Representante Empresa 3 no debe ser mayor que 30 caracteres.',
			'male_surname.3.max'               => 'El campo Apellido Paterno Representante Empresa 4 no debe ser mayor que 30 caracteres.',
			'male_surname.4.max'               => 'El campo Apellido Paterno Representante Empresa 5 no debe ser mayor que 30 caracteres.',
			'female_surname.0.required'        => 'El campo Apellido Materno Representante Empresa 1 es obligatorio.',
			'female_surname.1.required'        => 'El campo Apellido Materno Representante Empresa 2 es obligatorio.',
			'female_surname.2.required'        => 'El campo Apellido Materno Representante Empresa 3 es obligatorio.',
			'female_surname.3.required'        => 'El campo Apellido Materno Representante Empresa 4 es obligatorio.',
			'female_surname.4.required'        => 'El campo Apellido Materno Representante Empresa 5 es obligatorio.',
			'female_surname.0.max'             => 'El campo Apellido Materno Representante Empresa 1 no debe ser mayor que 30 caracteres.',
			'female_surname.1.max'             => 'El campo Apellido Materno Representante Empresa 2 no debe ser mayor que 30 caracteres.',
			'female_surname.2.max'             => 'El campo Apellido Materno Representante Empresa 3 no debe ser mayor que 30 caracteres.',
			'female_surname.3.max'             => 'El campo Apellido Materno Representante Empresa 4 no debe ser mayor que 30 caracteres.',
			'female_surname.4.max'             => 'El campo Apellido Materno Representante Empresa 5 no debe ser mayor que 30 caracteres.',
			'first_name.0.required'            => 'El campo Primer Nombre Representante Empresa 1 es obligatorio.',
			'first_name.1.required'            => 'El campo Primer Nombre Representante Empresa 2 es obligatorio.',
			'first_name.2.required'            => 'El campo Primer Nombre Representante Empresa 3 es obligatorio.',
			'first_name.3.required'            => 'El campo Primer Nombre Representante Empresa 4 es obligatorio.',
			'first_name.4.required'            => 'El campo Primer Nombre Representante Empresa 5 es obligatorio.',
			'first_name.0.max'                 => 'El campo Primer Nombre Representante Empresa 1 no debe ser mayor que 30 caracteres.',
			'first_name.1.max'                 => 'El campo Primer Nombre Representante Empresa 2 no debe ser mayor que 30 caracteres.',
			'first_name.2.max'                 => 'El campo Primer Nombre Representante Empresa 3 no debe ser mayor que 30 caracteres.',
			'first_name.3.max'                 => 'El campo Primer Nombre Representante Empresa 4 no debe ser mayor que 30 caracteres.',
			'first_name.4.max'                 => 'El campo Primer Nombre Representante Empresa 5 no debe ser mayor que 30 caracteres.',
			'second_name.0.max'                => 'El campo Segundo Nombre Representante Empresa 1 no debe ser mayor que 30 caracteres.',
			'second_name.1.max'                => 'El campo Segundo Nombre Representante Empresa 2 no debe ser mayor que 30 caracteres.',
			'second_name.2.max'                => 'El campo Segundo Nombre Representante Empresa 3 no debe ser mayor que 30 caracteres.',
			'second_name.3.max'                => 'El campo Segundo Nombre Representante Empresa 4 no debe ser mayor que 30 caracteres.',
			'second_name.4.max'                => 'El campo Segundo Nombre Representante Empresa 5 no debe ser mayor que 30 caracteres.',
			'rut_representative.0.required'    => 'El campo Rut Representante Empresa 1 es obligatorio.',
			'rut_representative.1.required'    => 'El campo Rut Representante Empresa 2 es obligatorio.',
			'rut_representative.2.required'    => 'El campo Rut Representante Empresa 3 es obligatorio.',
			'rut_representative.3.required'    => 'El campo Rut Representante Empresa 4 es obligatorio.',
			'rut_representative.4.required'    => 'El campo Rut Representante Empresa 5 es obligatorio.',
			'rut_representative.0.max'         => 'El campo Rut Representante Empresa 1 no debe ser mayor que 15 caracteres.',
			'rut_representative.1.max'         => 'El campo Rut Representante Empresa 2 no debe ser mayor que 15 caracteres.',
			'rut_representative.2.max'         => 'El campo Rut Representante Empresa 3 no debe ser mayor que 15 caracteres.',
			'rut_representative.3.max'         => 'El campo Rut Representante Empresa 4 no debe ser mayor que 15 caracteres.',
			'rut_representative.4.max'         => 'El campo Rut Representante Empresa 5 no debe ser mayor que 15 caracteres.',
			'rut_representative.0.unique'      => 'El campo Rut Representante Empresa 1 ya ha sido registrado.',
			'rut_representative.1.unique'      => 'El campo Rut Representante Empresa 2 ya ha sido registrado.',
			'rut_representative.2.unique'      => 'El campo Rut Representante Empresa 3 ya ha sido registrado.',
			'rut_representative.3.unique'      => 'El campo Rut Representante Empresa 4 ya ha sido registrado.',
			'rut_representative.4.unique'      => 'El campo Rut Representante Empresa 5 ya ha sido registrado.',
			'birthday.0.required'              => 'El campo Fecha Nac. Representante Empresa 1 es obligatorio.',
			'birthday.1.required'              => 'El campo Fecha Nac. Representante Empresa 2 es obligatorio.',
			'birthday.2.required'              => 'El campo Fecha Nac. Representante Empresa 3 es obligatorio.',
			'birthday.3.required'              => 'El campo Fecha Nac. Representante Empresa 4 es obligatorio.',
			'birthday.4.required'              => 'El campo Fecha Nac. Representante Empresa 5 es obligatorio.',
			'birthday.0.date'                  => 'El campo Fecha Nac. Representante Empresa 1 no es una fecha válida.',
			'birthday.1.date'                  => 'El campo Fecha Nac. Representante Empresa 2 no es una fecha válida.',
			'birthday.2.date'                  => 'El campo Fecha Nac. Representante Empresa 3 no es una fecha válida.',
			'birthday.3.date'                  => 'El campo Fecha Nac. Representante Empresa 4 no es una fecha válida.',
			'birthday.4.date'                  => 'El campo Fecha Nac. Representante Empresa 5 no es una fecha válida.',
			'nationality_id.0.required'        => 'El campo Nacionalidad Representante Empresa 1 es obligatorio.',
			'nationality_id.1.required'        => 'El campo Nacionalidad Representante Empresa 2 es obligatorio.',
			'nationality_id.2.required'        => 'El campo Nacionalidad Representante Empresa 3 es obligatorio.',
			'nationality_id.3.required'        => 'El campo Nacionalidad Representante Empresa 4 es obligatorio.',
			'nationality_id.4.required'        => 'El campo Nacionalidad Representante Empresa 5 es obligatorio.',
			'nationality_id.0.regex'           => 'El formato de Nacionalidad Representante Empresa 1 es inválido.',
			'nationality_id.1.regex'           => 'El formato de Nacionalidad Representante Empresa 2 es inválido.',
			'nationality_id.2.regex'           => 'El formato de Nacionalidad Representante Empresa 3 es inválido.',
			'nationality_id.3.regex'           => 'El formato de Nacionalidad Representante Empresa 4 es inválido.',
			'nationality_id.4.regex'           => 'El formato de Nacionalidad Representante Empresa 5 es inválido.',
			'phone1_representative.0.required' => 'El campo Teléfono 1 Representante Empresa 1 es obligatorio.',
			'phone1_representative.1.required' => 'El campo Teléfono 1 Representante Empresa 2 es obligatorio.',
			'phone1_representative.2.required' => 'El campo Teléfono 1 Representante Empresa 3 es obligatorio.',
			'phone1_representative.3.required' => 'El campo Teléfono 1 Representante Empresa 4 es obligatorio.',
			'phone1_representative.4.required' => 'El campo Teléfono 1 Representante Empresa 5 es obligatorio.',
			'phone1_representative.0.max'      => 'El campo Teléfono 1 Representante Empresa 1 no debe ser mayor que 20 caracteres.',
			'phone1_representative.1.max'      => 'El campo Teléfono 1 Representante Empresa 2 no debe ser mayor que 20 caracteres.',
			'phone1_representative.2.max'      => 'El campo Teléfono 1 Representante Empresa 3 no debe ser mayor que 20 caracteres.',
			'phone1_representative.3.max'      => 'El campo Teléfono 1 Representante Empresa 4 no debe ser mayor que 20 caracteres.',
			'phone1_representative.4.max'      => 'El campo Teléfono 1 Representante Empresa 5 no debe ser mayor que 20 caracteres.',
			'phone2_representative.0.max'      => 'El campo Teléfono 2 Representante Empresa 1 no debe ser mayor que 20 caracteres.',
			'phone2_representative.1.max'      => 'El campo Teléfono 2 Representante Empresa 2 no debe ser mayor que 20 caracteres.',
			'phone2_representative.2.max'      => 'El campo Teléfono 2 Representante Empresa 3 no debe ser mayor que 20 caracteres.',
			'phone2_representative.3.max'      => 'El campo Teléfono 2 Representante Empresa 4 no debe ser mayor que 20 caracteres.',
			'phone2_representative.4.max'      => 'El campo Teléfono 2 Representante Empresa 5 no debe ser mayor que 20 caracteres.',
			'email_representative.0.required'  => 'El campo Email Representante Empresa 1 es obligatorio.',
			'email_representative.1.required'  => 'El campo Email Representante Empresa 2 es obligatorio.',
			'email_representative.2.required'  => 'El campo Email Representante Empresa 3 es obligatorio.',
			'email_representative.3.required'  => 'El campo Email Representante Empresa 4 es obligatorio.',
			'email_representative.4.required'  => 'El campo Email Representante Empresa 5 es obligatorio.',
			'email_representative.0.email'     => 'El Email Representante Empresa 1 no es un correo válido',
			'email_representative.1.email'     => 'El Email Representante Empresa 2 no es un correo válido',
			'email_representative.2.email'     => 'El Email Representante Empresa 3 no es un correo válido',
			'email_representative.3.email'     => 'El Email Representante Empresa 4 no es un correo válido',
			'email_representative.4.email'     => 'El Email Representante Empresa 5 no es un correo válido',
			'email_representative.0.max'       => 'El campo Email Representante Empresa 1 no debe ser mayor que 60 caracteres.',
			'email_representative.1.max'       => 'El campo Email Representante Empresa 2 no debe ser mayor que 60 caracteres.',
			'email_representative.2.max'       => 'El campo Email Representante Empresa 3 no debe ser mayor que 60 caracteres.',
			'email_representative.3.max'       => 'El campo Email Representante Empresa 4 no debe ser mayor que 60 caracteres.',
			'email_representative.4.max'       => 'El campo Email Representante Empresa 5 no debe ser mayor que 60 caracteres.',
			'email_representative.0.unique'    => 'El campo Email Representante Empresa 1 ya ha sido registrado.',
			'email_representative.1.unique'    => 'El campo Email Representante Empresa 2 ya ha sido registrado.',
			'email_representative.2.unique'    => 'El campo Email Representante Empresa 3 ya ha sido registrado.',
			'email_representative.3.unique'    => 'El campo Email Representante Empresa 4 ya ha sido registrado.',
			'email_representative.4.unique'    => 'El campo Email Representante Empresa 5 ya ha sido registrado.',
		];
	}
}
