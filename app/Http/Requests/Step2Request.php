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
						$rules[ 'degree_id.' . $index ]            = 'required|regex:/[0-9 -()+]+$/';
						$rules[ 'name_study.' . $index ]           = 'required|max:100';
						$rules[ 'institution_study_id.' . $index ] = 'required|regex:/[0-9 -()+]+$/';
						$rules[ 'date_obtention.' . $index ]       = 'required|date';
					}
				}

				if ( Request::get('count_certifications') > 0 )
				{
					foreach (range(0, Request::get('count_certifications') - 1) as $index)
					{
						$rules[ 'type_certification_id.' . $index ]        = 'required|regex:/[0-9 -()+]+$/';
						$rules[ 'institution_certification_id.' . $index ] = 'required|regex:/[0-9 -()+]+$/';
						$rules[ 'expired_certification.' . $index ]        = 'required|date';
					}
				}

				if ( Request::get('count_specialities') > 0 )
				{
					foreach (range(0, Request::get('count_specialities') - 1) as $index)
					{
						$rules[ 'type_speciality_id.' . $index ]        = 'required|regex:/[0-9 -()+]+$/';
						$rules[ 'institution_speciality_id.' . $index ] = 'required|regex:/[0-9 -()+]+$/';
						$rules[ 'expired_speciality.' . $index ]        = 'required|date';
					}
				}

				if ( Request::get('count_professional_licenses') > 0 )
				{
					foreach (range(0, Request::get('count_professional_licenses') - 1) as $index)
					{
						$rules[ 'type_professional_license_id.' . $index ] = 'required|regex:/[0-9 -()+]+$/';
						$rules[ 'emission_license.' . $index ]             = 'required|date';
						$rules[ 'expired_license.' . $index ]              = 'required|date';
						$rules[ 'is_donor' . $index ]                      = 'required';
					}
				}

				/*
				 * Definimos $rules en caso de no entrar en
				 *
				 * alguna de las validaciones anteriores
				 */

				return $rules;

			}
		}
	}

}
