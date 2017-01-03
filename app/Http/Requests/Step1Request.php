<?php

namespace Controlqtime\Http\Requests;

use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Controlqtime\Http\Requests\Forms\SanitizedRequest;

class Step1Request extends SanitizedRequest
{
	/**
	 * @var Route
	 */
	protected $route;
	
	/**
	 * Step1Request constructor.
	 *
	 * @param Route $route
	 */
	public function __construct(Route $route)
	{
		$this->route = $route;
	}
	
	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return true;
	}
	
	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		switch ( $this->method() )
		{
			case 'POST':
			{
				$rules = [
					'male_surname'      => 'required|max:30',
					'female_surname'    => 'required|max:30',
					'first_name'        => 'required|max:30',
					'second_name'       => 'max:30',
					'rut'               => 'required|max:15|unique:employees,rut',
					'birthday'          => 'required|date',
					'nationality_id'    => 'required|regex:/[0-9 -()+]+$/',
					'is_male'           => 'required|max:1',
					'marital_status_id' => 'required|regex:/[0-9 -()+]+$/',
					'address'           => 'required|max:75',
					'depto'             => 'max:5',
					'block'             => 'max:5',
					'num_home'          => 'max:5',
					'region_id'         => 'required|regex:/[0-9 -()+]+$/',
					'province_id'       => 'required|regex:/[0-9 -()+]+$/',
					'commune_id'        => 'required|regex:/[0-9 -()+]+$/',
					'email_employee'    => 'required|email|max:100|unique:employees,email_employee',
					'phone1'            => 'required|max:20',
					'phone2'            => 'max:20',
				];
				
				if ( Request::get('count_contacts') > 0 )
				{
					foreach ( range(0, Request::get('count_contacts') - 1) as $index )
					{
						$rules['id_contact.' . $index]              = 'required|in:0';
						$rules['contact_relationship_id.' . $index] = 'required|regex:/[0-9 -()+]+$/';
						$rules['name_contact.' . $index]            = 'required|max:120';
						$rules['email_contact.' . $index]           = 'email|max:60|unique:contact_employees,email_contact';
						$rules['address_contact.' . $index]         = 'required';
						$rules['tel_contact.' . $index]             = 'required|max:20';
					}
				}
				
				if ( Request::get('count_family_relationships') > 0 )
				{
					foreach ( range(0, Request::get('count_family_relationships') - 1) as $index )
					{
						$rules['id_family_relationship.' . $index] = 'required|in:0';
						$rules['relationship_id.' . $index]        = 'required|regex:/[0-9 -()+]+$/';
						$rules['employee_family_id.' . $index]     = 'required|regex:/[0-9 -()+]+$/';
					}
				}
				
				return $rules;
				
			}
			
			case 'PUT':
			{
				$rules = [
					'male_surname'      => 'required|max:30',
					'female_surname'    => 'required|max:30',
					'first_name'        => 'required|max:30',
					'second_name'       => 'max:30',
					'rut'               => 'required|max:15|unique:employees,rut,' . $this->id,
					'birthday'          => 'required|date',
					'nationality_id'    => 'required|regex:/[0-9 -()+]+$/',
					'is_male'           => 'required|max:1',
					'marital_status_id' => 'required|regex:/[0-9 -()+]+$/',
					'address'           => 'required|max:75',
					'depto'             => 'max:5',
					'block'             => 'max:5',
					'num_home'          => 'max:5',
					'region_id'         => 'required|regex:/[0-9 -()+]+$/',
					'province_id'       => 'required|regex:/[0-9 -()+]+$/',
					'commune_id'        => 'required|regex:/[0-9 -()+]+$/',
					'email_employee'    => 'required|email|max:100|unique:employees,email_employee,' . $this->id,
					'phone1'            => 'required|max:20',
					'phone2'            => 'max:20',
				];
				
				if ( Request::get('count_family_relationships') > 0 )
				{
					foreach ( range(0, Request::get('count_family_relationships') - 1) as $index )
					{
						$rules['id_family_relationship.' . $index] = 'required|regex:/[0-9 -()+]+$/';
						$rules['relationship_id.' . $index]        = 'required|regex:/[0-9 -()+]+$/';
						$rules['employee_family_id.' . $index]     = 'required|regex:/[0-9 -()+]+$/';
					}
				}
				
				if ( Request::get('count_contacts') > 0 )
				{
					foreach ( range(0, Request::get('count_contacts') - 1) as $index )
					{
						$rules['id_contact.' . $index]              = 'required|regex:/[0-9 -()+]+$/';
						$rules['contact_relationship_id.' . $index] = 'required|regex:/[0-9 -()+]+$/';
						$rules['name_contact.' . $index]            = 'required|max:120';
						
						if ( Request::get('id_contact')[$index] == 0 )
							$rules['email_contact.' . $index] = 'email|max:60|unique:contact_employees,email_contact';
						else
							$rules['email_contact.' . $index] = 'email|max:60|unique:contact_employees,email_contact,' . Request::get('id_contact')[$index];
						
						$rules['address_contact.' . $index] = 'required';
						$rules['tel_contact.' . $index]     = 'required|max:20';
					}
				}
				
				return $rules;
				
			}
		}
	}
	
	/**
	 * @return array
	 */
	public function messages()
	{
		return [
			
			//Contact employee
			'id_contact.0.required'             => 'El campo ID Contacto 1 es obligatorio.',
			'id_contact.1.required'             => 'El campo ID Contacto 2 es obligatorio.',
			'id_contact.2.required'             => 'El campo ID Contacto 3 es obligatorio.',
			'id_contact.3.required'             => 'El campo ID Contacto 4 es obligatorio.',
			'id_contact.4.required'             => 'El campo ID Contacto 5 es obligatorio.',
			'id_contact.0.in'                   => 'El campo ID Contacto 1 es inválido.',
			'id_contact.1.in'                   => 'El campo ID Contacto 2 es inválido.',
			'id_contact.2.in'                   => 'El campo ID Contacto 3 es inválido.',
			'id_contact.3.in'                   => 'El campo ID Contacto 4 es inválido.',
			'id_contact.4.in'                   => 'El campo ID Contacto 5 es inválido.',
			'id_contact.0.regex'                => 'El formato de ID Contacto 1 es inválido.',
			'id_contact.1.regex'                => 'El formato de ID Contacto 2 es inválido.',
			'id_contact.2.regex'                => 'El formato de ID Contacto 3 es inválido.',
			'id_contact.3.regex'                => 'El formato de ID Contacto 4 es inválido.',
			'id_contact.4.regex'                => 'El formato de ID Contacto 5 es inválido.',
			'name_contact.0.required'           => 'El campo Nombre Contacto 1 es obligatorio.',
			'name_contact.1.required'           => 'El campo Nombre Contacto 2 es obligatorio.',
			'name_contact.2.required'           => 'El campo Nombre Contacto 3 es obligatorio.',
			'name_contact.3.required'           => 'El campo Nombre Contacto 4 es obligatorio.',
			'name_contact.4.required'           => 'El campo Nombre Contacto 5 es obligatorio.',
			'name_contact.0.max'                => 'El campo Nombre Contacto 1 no debe ser mayor que 120 caracteres.',
			'name_contact.1.max'                => 'El campo Nombre Contacto 2 no debe ser mayor que 120 caracteres.',
			'name_contact.2.max'                => 'El campo Nombre Contacto 3 no debe ser mayor que 120 caracteres.',
			'name_contact.3.max'                => 'El campo Nombre Contacto 4 no debe ser mayor que 120 caracteres.',
			'name_contact.4.max'                => 'El campo Nombre Contacto 5 no debe ser mayor que 120 caracteres.',
			'email_contact.0.email'             => 'El Email Contacto 1 no es un correo válido',
			'email_contact.1.email'             => 'El Email Contacto 2 no es un correo válido',
			'email_contact.2.email'             => 'El Email Contacto 3 no es un correo válido',
			'email_contact.3.email'             => 'El Email Contacto 4 no es un correo válido',
			'email_contact.4.email'             => 'El Email Contacto 5 no es un correo válido',
			'email_contact.0.max'               => 'El campo Email Contacto 1 no debe ser mayor que 60 caracteres.',
			'email_contact.1.max'               => 'El campo Email Contacto 2 no debe ser mayor que 60 caracteres.',
			'email_contact.2.max'               => 'El campo Email Contacto 3 no debe ser mayor que 60 caracteres.',
			'email_contact.3.max'               => 'El campo Email Contacto 4 no debe ser mayor que 60 caracteres.',
			'email_contact.4.max'               => 'El campo Email Contacto 5 no debe ser mayor que 60 caracteres.',
			'email_contact.0.unique'            => 'El campo Email Contacto 1 ya ha sido registrado.',
			'email_contact.1.unique'            => 'El campo Email Contacto 2 ya ha sido registrado.',
			'email_contact.2.unique'            => 'El campo Email Contacto 3 ya ha sido registrado.',
			'email_contact.3.unique'            => 'El campo Email Contacto 4 ya ha sido registrado.',
			'email_contact.4.unique'            => 'El campo Email Contacto 5 ya ha sido registrado.',
			'address_contact.0.required'        => 'El campo Dirección Contacto 1 es obligatorio.',
			'address_contact.1.required'        => 'El campo Dirección Contacto 2 es obligatorio.',
			'address_contact.2.required'        => 'El campo Dirección Contacto 3 es obligatorio.',
			'address_contact.3.required'        => 'El campo Dirección Contacto 4 es obligatorio.',
			'address_contact.4.required'        => 'El campo Dirección Contacto 5 es obligatorio.',
			'tel_contact.0.required'            => 'El campo Teléfono Contacto 1 es obligatorio.',
			'tel_contact.1.required'            => 'El campo Teléfono Contacto 2 es obligatorio.',
			'tel_contact.2.required'            => 'El campo Teléfono Contacto 3 es obligatorio.',
			'tel_contact.3.required'            => 'El campo Teléfono Contacto 4 es obligatorio.',
			'tel_contact.4.required'            => 'El campo Teléfono Contacto 5 es obligatorio.',
			'tel_contact.0.max'                 => 'El campo Teléfono Contacto 1 no debe ser mayor que 20 caracteres.',
			'tel_contact.1.max'                 => 'El campo Teléfono Contacto 2 no debe ser mayor que 20 caracteres.',
			'tel_contact.2.max'                 => 'El campo Teléfono Contacto 3 no debe ser mayor que 20 caracteres.',
			'tel_contact.3.max'                 => 'El campo Teléfono Contacto 4 no debe ser mayor que 20 caracteres.',
			'tel_contact.4.max'                 => 'El campo Teléfono Contacto 5 no debe ser mayor que 20 caracteres.',
			
			//Family relationship
			'id_family_relationship.0.required' => 'El campo ID Parentesco Familiar 1 es obligatorio.',
			'id_family_relationship.1.required' => 'El campo ID Parentesco Familiar 2 es obligatorio.',
			'id_family_relationship.2.required' => 'El campo ID Parentesco Familiar 3 es obligatorio.',
			'id_family_relationship.3.required' => 'El campo ID Parentesco Familiar 4 es obligatorio.',
			'id_family_relationship.4.required' => 'El campo ID Parentesco Familiar 5 es obligatorio.',
			'id_family_relationship.0.in'       => 'El campo ID Parentesco Familiar 1 es inválido.',
			'id_family_relationship.1.in'       => 'El campo ID Parentesco Familiar 2 es inválido.',
			'id_family_relationship.2.in'       => 'El campo ID Parentesco Familiar 3 es inválido.',
			'id_family_relationship.3.in'       => 'El campo ID Parentesco Familiar 4 es inválido.',
			'id_family_relationship.4.in'       => 'El campo ID Parentesco Familiar 5 es inválido.',
			'id_family_relationship.0.regex'    => 'El formato de ID Parentesco Familiar 1 es inválido.',
			'id_family_relationship.1.regex'    => 'El formato de ID Parentesco Familiar 2 es inválido.',
			'id_family_relationship.2.regex'    => 'El formato de ID Parentesco Familiar 3 es inválido.',
			'id_family_relationship.3.regex'    => 'El formato de ID Parentesco Familiar 4 es inválido.',
			'id_family_relationship.4.regex'    => 'El formato de ID Parentesco Familiar 5 es inválido.',
			'relationship_id.0.required'        => 'El campo Relación 1 es obligatorio.',
			'relationship_id.1.required'        => 'El campo Relación 2 es obligatorio.',
			'relationship_id.2.required'        => 'El campo Relación 3 es obligatorio.',
			'relationship_id.3.required'        => 'El campo Relación 4 es obligatorio.',
			'relationship_id.4.required'        => 'El campo Relación 5 es obligatorio.',
			'relationship_id.0.regex'           => 'El formato de Relación 1 es inválido.',
			'relationship_id.1.regex'           => 'El formato de Relación 2 es inválido.',
			'relationship_id.2.regex'           => 'El formato de Relación 3 es inválido.',
			'relationship_id.3.regex'           => 'El formato de Relación 4 es inválido.',
			'relationship_id.4.regex'           => 'El formato de Relación 5 es inválido.',
			'employee_family_id.0.required'     => 'El campo Nombre Familiar 1 es obligatorio.',
			'employee_family_id.1.required'     => 'El campo Nombre Familiar 2 es obligatorio.',
			'employee_family_id.2.required'     => 'El campo Nombre Familiar 3 es obligatorio.',
			'employee_family_id.3.required'     => 'El campo Nombre Familiar 4 es obligatorio.',
			'employee_family_id.4.required'     => 'El campo Nombre Familiar 5 es obligatorio.',
			'employee_family_id.0.regex'        => 'El formato de Nombre Familiar 1 es inválido.',
			'employee_family_id.1.regex'        => 'El formato de Nombre Familiar 2 es inválido.',
			'employee_family_id.2.regex'        => 'El formato de Nombre Familiar 3 es inválido.',
			'employee_family_id.3.regex'        => 'El formato de Nombre Familiar 4 es inválido.',
			'employee_family_id.4.regex'        => 'El formato de Nombre Familiar 5 es inválido.',
		
		];
	}
	
}
