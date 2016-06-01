<?php

namespace Controlqtime\Http\Requests;

use Controlqtime\Http\Requests\Forms\SanitizedRequest;

class Step2Request extends SanitizedRequest {

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
				if ( Request::get('count_studies') > 0 )
				{
					foreach (range(0, Request::get('count_studies') - 1) as $index)
					{
						$rules[ 'id_study.' . $index ]       		= 'required|in:0';
						$rules[ 'degree_id.' . $index ]            	= 'required|regex:/[0-9 -()+]+$/';
						$rules[ 'name_study.' . $index ]           	= 'required|max:100';
						$rules[ 'institution_study_id.' . $index ] 	= 'required|regex:/[0-9 -()+]+$/';
						$rules[ 'date_obtention.' . $index ]       	= 'required|date';
					}
				}

				if ( Request::get('count_certifications') > 0 )
				{
					foreach (range(0, Request::get('count_certifications') - 1) as $index)
					{
						$rules[ 'id_certification.' . $index ]       		= 'required|in:0';
						$rules[ 'type_certification_id.' . $index ]        	= 'required|regex:/[0-9 -()+]+$/';
						$rules[ 'institution_certification_id.' . $index ] 	= 'required|regex:/[0-9 -()+]+$/';
						$rules[ 'emission_certification.' . $index ]        = 'required|date';
						$rules[ 'expired_certification.' . $index ]        	= 'required|date';
					}
				}

				if ( Request::get('count_specialities') > 0 )
				{
					foreach (range(0, Request::get('count_specialities') - 1) as $index)
					{
						$rules[ 'id_speciality.' . $index ]       			= 'required|in:0';
						$rules[ 'type_speciality_id.' . $index ]        	= 'required|regex:/[0-9 -()+]+$/';
						$rules[ 'institution_speciality_id.' . $index ] 	= 'required|regex:/[0-9 -()+]+$/';
						$rules[ 'emission_speciality.' . $index ]        	= 'required|date';
						$rules[ 'expired_speciality.' . $index ]        	= 'required|date';
					}
				}

				if ( Request::get('count_professional_licenses') > 0 )
				{
					foreach (range(0, Request::get('count_professional_licenses') - 1) as $index)
					{
						$rules[ 'id_professional_license.' . $index ]      = 'required|in:0';
						$rules[ 'type_professional_license_id.' . $index ] = 'required|regex:/[0-9 -()+]+$/';
						$rules[ 'emission_license.' . $index ]             = 'required|date';
						$rules[ 'expired_license.' . $index ]              = 'required|date';
						$rules[ 'is_donor' . $index ]                      = 'required|in:0,1';
					}
				}

				/*
				 * Inicializamos rules en caso de no entrar en un if
			 	 */

				if ( Request::get('count_studies') + Request::get('count_certifications') + Request::get('count_specialities') + Request::get('count_professional_licenses') == 0 )
					$rules = [
						'success' => 'OK'
					];

				return $rules;

			}

			case 'PUT':
			{
				if ( Request::get('count_studies') > 0 )
				{
					foreach (range(0, Request::get('count_studies') - 1) as $index)
					{
						$rules[ 'id_study.' . $index ]       		= 'required|regex:/[0-9 -()+]+$/';
						$rules[ 'degree_id.' . $index ]            	= 'required|regex:/[0-9 -()+]+$/';
						$rules[ 'name_study.' . $index ]           	= 'required|max:100';
						$rules[ 'institution_study_id.' . $index ] 	= 'required|regex:/[0-9 -()+]+$/';
						$rules[ 'date_obtention.' . $index ]       	= 'required|date';
					}
				}

				if ( Request::get('count_certifications') > 0 )
				{
					foreach (range(0, Request::get('count_certifications') - 1) as $index)
					{
						$rules[ 'id_certification.' . $index ]  			= 'required|regex:/[0-9 -()+]+$/';
						$rules[ 'type_certification_id.' . $index ]        	= 'required|regex:/[0-9 -()+]+$/';
						$rules[ 'institution_certification_id.' . $index ] 	= 'required|regex:/[0-9 -()+]+$/';
						$rules[ 'emission_certification.' . $index ]        = 'required|date';
						$rules[ 'expired_certification.' . $index ]        	= 'required|date';
					}
				}

				if ( Request::get('count_specialities') > 0 )
				{
					foreach (range(0, Request::get('count_specialities') - 1) as $index)
					{
						$rules[ 'id_speciality.' . $index ]  			= 'required|regex:/[0-9 -()+]+$/';
						$rules[ 'type_speciality_id.' . $index ]        = 'required|regex:/[0-9 -()+]+$/';
						$rules[ 'institution_speciality_id.' . $index ] = 'required|regex:/[0-9 -()+]+$/';
						$rules[ 'emission_speciality.' . $index ]       = 'required|date';
						$rules[ 'expired_speciality.' . $index ]        = 'required|date';
					}
				}

				if ( Request::get('count_professional_licenses') > 0 )
				{
					foreach (range(0, Request::get('count_professional_licenses') - 1) as $index)
					{
						$rules[ 'id_professional_license.' . $index ]      = 'required|regex:/[0-9 -()+]+$/';
						$rules[ 'type_professional_license_id.' . $index ] = 'required|regex:/[0-9 -()+]+$/';
						$rules[ 'emission_license.' . $index ]             = 'required|date';
						$rules[ 'expired_license.' . $index ]              = 'required|date';
						$rules[ 'is_donor' . $index ]                      = 'required|in:0,1';
					}
				}

				/*
				 * Inicializamos rules en caso de no entrar en un if
			 	 */

				if ( Request::get('count_studies') + Request::get('count_certifications') + Request::get('count_specialities') + Request::get('count_professional_licenses') == 0 )
					$rules = [
						'success' => 'OK'
					];

				return $rules;

			}

		}
	}

	public function messages()
	{
		return [

			//Studies
			'id_study.0.required'						=> 'El campo ID Estudio Académico 1 es obligatorio.',
			'id_study.1.required'						=> 'El campo ID Estudio Académico 2 es obligatorio.',
			'id_study.2.required'						=> 'El campo ID Estudio Académico 3 es obligatorio.',
			'id_study.3.required'						=> 'El campo ID Estudio Académico 4 es obligatorio.',
			'id_study.4.required'						=> 'El campo ID Estudio Académico 5 es obligatorio.',
			'id_study.0.in'								=> 'El campo ID Estudio Académico 1 es inválido.',
			'id_study.1.in'								=> 'El campo ID Estudio Académico 2 es inválido.',
			'id_study.2.in'								=> 'El campo ID Estudio Académico 3 es inválido.',
			'id_study.3.in'								=> 'El campo ID Estudio Académico 4 es inválido.',
			'id_study.4.in'								=> 'El campo ID Estudio Académico 5 es inválido.',
			'id_study.0.regex'							=> 'El formato de ID Estudio Académico 1 es inválido.',
			'id_study.1.regex'							=> 'El formato de ID Estudio Académico 2 es inválido.',
			'id_study.2.regex'							=> 'El formato de ID Estudio Académico 3 es inválido.',
			'id_study.3.regex'							=> 'El formato de ID Estudio Académico 4 es inválido.',
			'id_study.4.regex'							=> 'El formato de ID Estudio Académico 5 es inválido.',
			'degree_id.0.required'						=> 'El campo Nivel Estudio 1 es obligatorio.',
			'degree_id.1.required'						=> 'El campo Nivel Estudio 2 es obligatorio.',
			'degree_id.2.required'						=> 'El campo Nivel Estudio 3 es obligatorio.',
			'degree_id.3.required'						=> 'El campo Nivel Estudio 4 es obligatorio.',
			'degree_id.4.required'						=> 'El campo Nivel Estudio 5 es obligatorio.',
			'degree_id.0.regex'							=> 'El formato de Nivel Estudio 1 es inválido.',
			'degree_id.1.regex'							=> 'El formato de Nivel Estudio 2 es inválido.',
			'degree_id.2.regex'							=> 'El formato de Nivel Estudio 3 es inválido.',
			'degree_id.3.regex'							=> 'El formato de Nivel Estudio 4 es inválido.',
			'degree_id.4.regex'							=> 'El formato de Nivel Estudio 5 es inválido.',
			'name_study.0.required'						=> 'El campo Profesión u Oficio 1 es obligatorio.',
			'name_study.1.required'						=> 'El campo Profesión u Oficio 2 es obligatorio.',
			'name_study.2.required'						=> 'El campo Profesión u Oficio 3 es obligatorio.',
			'name_study.3.required'						=> 'El campo Profesión u Oficio 4 es obligatorio.',
			'name_study.4.required'						=> 'El campo Profesión u Oficio 5 es obligatorio.',
			'name_study.0.max'							=> 'El campo Profesión u Oficio 1 no debe ser mayor que 100 caracteres.',
			'name_study.1.max'							=> 'El campo Profesión u Oficio 2 no debe ser mayor que 100 caracteres.',
			'name_study.2.max'							=> 'El campo Profesión u Oficio 3 no debe ser mayor que 100 caracteres.',
			'name_study.3.max'							=> 'El campo Profesión u Oficio 4 no debe ser mayor que 100 caracteres.',
			'name_study.4.max'							=> 'El campo Profesión u Oficio 5 no debe ser mayor que 100 caracteres.',
			'institution_study_id.0.required'			=> 'El campo Institución 1 es obligatorio.',
			'institution_study_id.1.required'			=> 'El campo Institución 2 es obligatorio.',
			'institution_study_id.2.required'			=> 'El campo Institución 3 es obligatorio.',
			'institution_study_id.3.required'			=> 'El campo Institución 4 es obligatorio.',
			'institution_study_id.4.required'			=> 'El campo Institución 5 es obligatorio.',
			'institution_study_id.0.regex'				=> 'El formato de Institución 1 es inválido.',
			'institution_study_id.1.regex'				=> 'El formato de Institución 2 es inválido.',
			'institution_study_id.2.regex'				=> 'El formato de Institución 3 es inválido.',
			'institution_study_id.3.regex'				=> 'El formato de Institución 4 es inválido.',
			'institution_study_id.4.regex'				=> 'El formato de Institución 5 es inválido.',
			'date_obtention.0.required'					=> 'El campo Fecha Obtención 1 es obligatorio.',
			'date_obtention.1.required'					=> 'El campo Fecha Obtención 2 es obligatorio.',
			'date_obtention.2.required'					=> 'El campo Fecha Obtención 3 es obligatorio.',
			'date_obtention.3.required'					=> 'El campo Fecha Obtención 4 es obligatorio.',
			'date_obtention.4.required'					=> 'El campo Fecha Obtención 5 es obligatorio.',
			'date_obtention.0.date'						=> 'El campo Fecha Obtención 1 no es una fecha válida.',
			'date_obtention.1.date'						=> 'El campo Fecha Obtención 2 no es una fecha válida.',
			'date_obtention.2.date'						=> 'El campo Fecha Obtención 3 no es una fecha válida.',
			'date_obtention.3.date'						=> 'El campo Fecha Obtención 4 no es una fecha válida.',
			'date_obtention.4.date'						=> 'El campo Fecha Obtención 5 no es una fecha válida.',

			//Certifications
			'id_certification.0.required'				=> 'El campo ID Certificación 1 es obligatorio.',
			'id_certification.1.required'				=> 'El campo ID Certificación 2 es obligatorio.',
			'id_certification.2.required'				=> 'El campo ID Certificación 3 es obligatorio.',
			'id_certification.3.required'				=> 'El campo ID Certificación 4 es obligatorio.',
			'id_certification.4.required'				=> 'El campo ID Certificación 5 es obligatorio.',
			'id_certification.0.in'						=> 'El campo ID Certificación 1 es inválido.',
			'id_certification.1.in'						=> 'El campo ID Certificación 2 es inválido.',
			'id_certification.2.in'						=> 'El campo ID Certificación 3 es inválido.',
			'id_certification.3.in'						=> 'El campo ID Certificación 4 es inválido.',
			'id_certification.4.in'						=> 'El campo ID Certificación 5 es inválido.',
			'id_certification.0.regex'					=> 'El formato de ID Certificación 1 es inválido.',
			'id_certification.1.regex'					=> 'El formato de ID Certificación 2 es inválido.',
			'id_certification.2.regex'					=> 'El formato de ID Certificación 3 es inválido.',
			'id_certification.3.regex'					=> 'El formato de ID Certificación 4 es inválido.',
			'id_certification.4.regex'					=> 'El formato de ID Certificación 5 es inválido.',
			'type_certification_id.0.required'			=> 'El campo Tipo Certificación 1 es obligatorio.',
			'type_certification_id.1.required'			=> 'El campo Tipo Certificación 2 es obligatorio.',
			'type_certification_id.2.required'			=> 'El campo Tipo Certificación 3 es obligatorio.',
			'type_certification_id.3.required'			=> 'El campo Tipo Certificación 4 es obligatorio.',
			'type_certification_id.4.required'			=> 'El campo Tipo Certificación 5 es obligatorio.',
			'type_certification_id.0.regex'				=> 'El formato de Tipo Certificación 1 es inválido.',
			'type_certification_id.1.regex'				=> 'El formato de Tipo Certificación 2 es inválido.',
			'type_certification_id.2.regex'				=> 'El formato de Tipo Certificación 3 es inválido.',
			'type_certification_id.3.regex'				=> 'El formato de Tipo Certificación 4 es inválido.',
			'type_certification_id.4.regex'				=> 'El formato de Tipo Certificación 5 es inválido.',
			'institution_certification_id.0.required'	=> 'El campo Institución Certificación 1 es obligatorio.',
			'institution_certification_id.1.required'	=> 'El campo Institución Certificación 2 es obligatorio.',
			'institution_certification_id.2.required'	=> 'El campo Institución Certificación 3 es obligatorio.',
			'institution_certification_id.3.required'	=> 'El campo Institución Certificación 4 es obligatorio.',
			'institution_certification_id.4.required'	=> 'El campo Institución Certificación 5 es obligatorio.',
			'institution_certification_id.0.regex'		=> 'El formato de Institución Certificación 1 es inválido.',
			'institution_certification_id.1.regex'		=> 'El formato de Institución Certificación 2 es inválido.',
			'institution_certification_id.2.regex'		=> 'El formato de Institución Certificación 3 es inválido.',
			'institution_certification_id.3.regex'		=> 'El formato de Institución Certificación 4 es inválido.',
			'institution_certification_id.4.regex'		=> 'El formato de Institución Certificación 5 es inválido.',
			'emission_certification.0.required'			=> 'El campo Fecha Emisión Certificación 1 es obligatorio.',
			'emission_certification.1.required'			=> 'El campo Fecha Emisión Certificación 2 es obligatorio.',
			'emission_certification.2.required'			=> 'El campo Fecha Emisión Certificación 3 es obligatorio.',
			'emission_certification.3.required'			=> 'El campo Fecha Emisión Certificación 4 es obligatorio.',
			'emission_certification.4.required'			=> 'El campo Fecha Emisión Certificación 5 es obligatorio.',
			'emission_certification.0.date'				=> 'El campo Fecha Emisión Certificación 1 no es una fecha válida.',
			'emission_certification.1.date'				=> 'El campo Fecha Emisión Certificación 2 no es una fecha válida.',
			'emission_certification.2.date'				=> 'El campo Fecha Emisión Certificación 3 no es una fecha válida.',
			'emission_certification.3.date'				=> 'El campo Fecha Emisión Certificación 4 no es una fecha válida.',
			'emission_certification.4.date'				=> 'El campo Fecha Emisión Certificación 5 no es una fecha válida.',
			'expired_certification.0.required'			=> 'El campo Fecha Expiración Certificación 1 es obligatorio.',
			'expired_certification.1.required'			=> 'El campo Fecha Expiración Certificación 2 es obligatorio.',
			'expired_certification.2.required'			=> 'El campo Fecha Expiración Certificación 3 es obligatorio.',
			'expired_certification.3.required'			=> 'El campo Fecha Expiración Certificación 4 es obligatorio.',
			'expired_certification.4.required'			=> 'El campo Fecha Expiración Certificación 5 es obligatorio.',
			'expired_certification.0.date'				=> 'El campo Fecha Expiración Certificación 1 no es una fecha válida.',
			'expired_certification.1.date'				=> 'El campo Fecha Expiración Certificación 2 no es una fecha válida.',
			'expired_certification.2.date'				=> 'El campo Fecha Expiración Certificación 3 no es una fecha válida.',
			'expired_certification.3.date'				=> 'El campo Fecha Expiración Certificación 4 no es una fecha válida.',
			'expired_certification.4.date'				=> 'El campo Fecha Expiración Certificación 5 no es una fecha válida.',

			//Specialities
			'id_speciality.0.required'				=> 'El campo ID Especialidad 1 es obligatorio.',
			'id_speciality.1.required'				=> 'El campo ID Especialidad 2 es obligatorio.',
			'id_speciality.2.required'				=> 'El campo ID Especialidad 3 es obligatorio.',
			'id_speciality.3.required'				=> 'El campo ID Especialidad 4 es obligatorio.',
			'id_speciality.4.required'				=> 'El campo ID Especialidad 5 es obligatorio.',
			'id_speciality.0.in'					=> 'El campo ID Especialidad 1 es inválido.',
			'id_speciality.1.in'					=> 'El campo ID Especialidad 2 es inválido.',
			'id_speciality.2.in'					=> 'El campo ID Especialidad 3 es inválido.',
			'id_speciality.3.in'					=> 'El campo ID Especialidad 4 es inválido.',
			'id_speciality.4.in'					=> 'El campo ID Especialidad 5 es inválido.',
			'id_speciality.0.regex'					=> 'El formato de ID Especialidad 1 es inválido.',
			'id_speciality.1.regex'					=> 'El formato de ID Especialidad 2 es inválido.',
			'id_speciality.2.regex'					=> 'El formato de ID Especialidad 3 es inválido.',
			'id_speciality.3.regex'					=> 'El formato de ID Especialidad 4 es inválido.',
			'id_speciality.4.regex'					=> 'El formato de ID Especialidad 5 es inválido.',
			'type_speciality_id.0.required'			=> 'El campo Tipo Especialidad 1 es obligatorio.',
			'type_speciality_id.1.required'			=> 'El campo Tipo Especialidad 2 es obligatorio.',
			'type_speciality_id.2.required'			=> 'El campo Tipo Especialidad 3 es obligatorio.',
			'type_speciality_id.3.required'			=> 'El campo Tipo Especialidad 4 es obligatorio.',
			'type_speciality_id.4.required'			=> 'El campo Tipo Especialidad 5 es obligatorio.',
			'type_speciality_id.0.regex'			=> 'El formato de Tipo Especialidad 1 es inválido.',
			'type_speciality_id.1.regex'			=> 'El formato de Tipo Especialidad 2 es inválido.',
			'type_speciality_id.2.regex'			=> 'El formato de Tipo Especialidad 3 es inválido.',
			'type_speciality_id.3.regex'			=> 'El formato de Tipo Especialidad 4 es inválido.',
			'type_speciality_id.4.regex'			=> 'El formato de Tipo Especialidad 5 es inválido.',
			'institution_speciality_id.0.required'	=> 'El campo Institución Especialidad 1 es obligatorio.',
			'institution_speciality_id.1.required'	=> 'El campo Institución Especialidad 2 es obligatorio.',
			'institution_speciality_id.2.required'	=> 'El campo Institución Especialidad 3 es obligatorio.',
			'institution_speciality_id.3.required'	=> 'El campo Institución Especialidad 4 es obligatorio.',
			'institution_speciality_id.4.required'	=> 'El campo Institución Especialidad 5 es obligatorio.',
			'institution_speciality_id.0.regex'		=> 'El formato de Institución Especialidad 1 es inválido.',
			'institution_speciality_id.1.regex'		=> 'El formato de Institución Especialidad 2 es inválido.',
			'institution_speciality_id.2.regex'		=> 'El formato de Institución Especialidad 3 es inválido.',
			'institution_speciality_id.3.regex'		=> 'El formato de Institución Especialidad 4 es inválido.',
			'institution_speciality_id.4.regex'		=> 'El formato de Institución Especialidad 5 es inválido.',
			'emission_speciality.0.required'		=> 'El campo Fecha Emisión Especialidad 1 es obligatorio.',
			'emission_speciality.1.required'		=> 'El campo Fecha Emisión Especialidad 2 es obligatorio.',
			'emission_speciality.2.required'		=> 'El campo Fecha Emisión Especialidad 3 es obligatorio.',
			'emission_speciality.3.required'		=> 'El campo Fecha Emisión Especialidad 4 es obligatorio.',
			'emission_speciality.4.required'		=> 'El campo Fecha Emisión Especialidad 5 es obligatorio.',
			'emission_speciality.0.date'			=> 'El campo Fecha Emisión Especialidad 1 no es una fecha válida.',
			'emission_speciality.1.date'			=> 'El campo Fecha Emisión Especialidad 2 no es una fecha válida.',
			'emission_speciality.2.date'			=> 'El campo Fecha Emisión Especialidad 3 no es una fecha válida.',
			'emission_speciality.3.date'			=> 'El campo Fecha Emisión Especialidad 4 no es una fecha válida.',
			'emission_speciality.4.date'			=> 'El campo Fecha Emisión Especialidad 5 no es una fecha válida.',
			'expired_speciality.0.required'			=> 'El campo Fecha Expiración Especialidad 1 es obligatorio.',
			'expired_speciality.1.required'			=> 'El campo Fecha Expiración Especialidad 2 es obligatorio.',
			'expired_speciality.2.required'			=> 'El campo Fecha Expiración Especialidad 3 es obligatorio.',
			'expired_speciality.3.required'			=> 'El campo Fecha Expiración Especialidad 4 es obligatorio.',
			'expired_speciality.4.required'			=> 'El campo Fecha Expiración Especialidad 5 es obligatorio.',
			'expired_speciality.0.date'				=> 'El campo Fecha Expiración Especialidad 1 no es una fecha válida.',
			'expired_speciality.1.date'				=> 'El campo Fecha Expiración Especialidad 2 no es una fecha válida.',
			'expired_speciality.2.date'				=> 'El campo Fecha Expiración Especialidad 3 no es una fecha válida.',
			'expired_speciality.3.date'				=> 'El campo Fecha Expiración Especialidad 4 no es una fecha válida.',
			'expired_speciality.4.date'				=> 'El campo Fecha Expiración Especialidad 5 no es una fecha válida.',

			//Professional Licenses
			'id_professional_license.0.required'				=> 'El campo ID Licencia Profesional 1 es obligatorio.',
			'id_professional_license.1.required'				=> 'El campo ID Licencia Profesional 2 es obligatorio.',
			'id_professional_license.2.required'				=> 'El campo ID Licencia Profesional 3 es obligatorio.',
			'id_professional_license.3.required'				=> 'El campo ID Licencia Profesional 4 es obligatorio.',
			'id_professional_license.4.required'				=> 'El campo ID Licencia Profesional 5 es obligatorio.',
			'id_professional_license.0.in'						=> 'El campo ID Licencia Profesional 1 es inválido.',
			'id_professional_license.1.in'						=> 'El campo ID Licencia Profesional 2 es inválido.',
			'id_professional_license.2.in'						=> 'El campo ID Licencia Profesional 3 es inválido.',
			'id_professional_license.3.in'						=> 'El campo ID Licencia Profesional 4 es inválido.',
			'id_professional_license.4.in'						=> 'El campo ID Licencia Profesional 5 es inválido.',
			'id_professional_license.0.regex'					=> 'El formato de ID Licencia Profesional 1 es inválido.',
			'id_professional_license.1.regex'					=> 'El formato de ID Licencia Profesional 2 es inválido.',
			'id_professional_license.2.regex'					=> 'El formato de ID Licencia Profesional 3 es inválido.',
			'id_professional_license.3.regex'					=> 'El formato de ID Licencia Profesional 4 es inválido.',
			'id_professional_license.4.regex'					=> 'El formato de ID Licencia Profesional 5 es inválido.',
			'emission_license.0.required'						=> 'El campo Fecha Emisión Licencia Profesional 1 es obligatorio.',
			'emission_license.1.required'						=> 'El campo Fecha Emisión Licencia Profesional 2 es obligatorio.',
			'emission_license.2.required'						=> 'El campo Fecha Emisión Licencia Profesional 3 es obligatorio.',
			'emission_license.3.required'						=> 'El campo Fecha Emisión Licencia Profesional 4 es obligatorio.',
			'emission_license.4.required'						=> 'El campo Fecha Emisión Licencia Profesional 5 es obligatorio.',
			'emission_license.0.date'							=> 'El campo Fecha Emisión Licencia Profesional 1 no es una fecha válida.',
			'emission_license.1.date'							=> 'El campo Fecha Emisión Licencia Profesional 2 no es una fecha válida.',
			'emission_license.2.date'							=> 'El campo Fecha Emisión Licencia Profesional 3 no es una fecha válida.',
			'emission_license.3.date'							=> 'El campo Fecha Emisión Licencia Profesional 4 no es una fecha válida.',
			'emission_license.4.date'							=> 'El campo Fecha Emisión Licencia Profesional 5 no es una fecha válida.',
			'expired_license.0.required'						=> 'El campo Fecha Expiración Licencia Profesional 1 es obligatorio.',
			'expired_license.1.required'						=> 'El campo Fecha Expiración Licencia Profesional 2 es obligatorio.',
			'expired_license.2.required'						=> 'El campo Fecha Expiración Licencia Profesional 3 es obligatorio.',
			'expired_license.3.required'						=> 'El campo Fecha Expiración Licencia Profesional 4 es obligatorio.',
			'expired_license.4.required'						=> 'El campo Fecha Expiración Licencia Profesional 5 es obligatorio.',
			'expired_license.0.date'							=> 'El campo Fecha Expiración Licencia Profesional 1 no es una fecha válida.',
			'expired_license.1.date'							=> 'El campo Fecha Expiración Licencia Profesional 2 no es una fecha válida.',
			'expired_license.2.date'							=> 'El campo Fecha Expiración Licencia Profesional 3 no es una fecha válida.',
			'expired_license.3.date'							=> 'El campo Fecha Expiración Licencia Profesional 4 no es una fecha válida.',
			'expired_license.4.date'							=> 'El campo Fecha Expiración Licencia Profesional 5 no es una fecha válida.',
			'is_donor0.required'								=> 'El campo Es Donante? 1 es obligatorio.',
			'is_donor1.required'								=> 'El campo Es Donante? 2 es obligatorio.',
			'is_donor2.required'								=> 'El campo Es Donante? 3 es obligatorio.',
			'is_donor3.required'								=> 'El campo Es Donante? 4 es obligatorio.',
			'is_donor4.required'								=> 'El campo Es Donante? 5 es obligatorio.',
			'is_donor0.in'										=> 'El campo Es Donante? 1 es inválido.',
			'is_donor1.in'										=> 'El campo Es Donante? 2 es inválido.',
			'is_donor2.in'										=> 'El campo Es Donante? 3 es inválido.',
			'is_donor3.in'										=> 'El campo Es Donante? 4 es inválido.',
			'is_donor4.in'										=> 'El campo Es Donante? 5 es inválido.',

		];
	}

}

