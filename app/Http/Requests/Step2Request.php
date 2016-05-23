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
				$index = 0;

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
						$rules[ 'is_donor' . $index ]                      = 'required';
					}
				}

				/*
				 * Inicializamos rules en caso de no entrar en un if
				 */

				if ( $index == 0 )
					$rules = [
						'success' => 'OK'
					];

				return $rules;

			}

			case 'PUT':
			{
				$index = 0;

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
						$rules[ 'is_donor' . $index ]                      = 'required';
					}
				}

				/*
				 * Inicializamos rules en caso de no entrar en un if
				 */

				if ( $index == 0 )
					$rules = [
						'success' => 'OK'
					];

				return $rules;
			}

		}
	}

}
