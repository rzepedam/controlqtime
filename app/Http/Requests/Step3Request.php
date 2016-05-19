<?php

namespace Controlqtime\Http\Requests;

use Controlqtime\Http\Requests\Forms\SanitizedRequest;

class Step3Request extends SanitizedRequest {

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

				if ( Request::get('count_disabilities') > 0 )
				{
					foreach (range(0, Request::get('count_disabilities') - 1) as $index)
					{
						$rules[ 'id_disability.' . $index ]       = 'required|in:0';
						$rules[ 'type_disability_id.' . $index ]  = 'required|regex:/[0-9 -()+]+$/';
						$rules[ 'treatment_disability' . $index ] = 'required|regex:/[0-9 -()+]+$/|in:0,1';
					}
				}

				if ( Request::get('count_diseases') > 0 )
				{
					foreach (range(0, Request::get('count_diseases') - 1) as $index)
					{
						$rules[ 'id_disease.' . $index ]       = 'required|in:0';
						$rules[ 'type_disease_id.' . $index ]  = 'required|regex:/[0-9 -()+]+$/';
						$rules[ 'treatment_disease' . $index ] = 'required|regex:/[0-9 -()+]+$/|in:0,1';
					}
				}

				if ( Request::get('count_exams') > 0 )
				{
					foreach (range(0, Request::get('count_exams') - 1) as $index)
					{
						$rules[ 'id_exam.' . $index ]       = 'required|in:0';
						$rules[ 'type_exam_id.' . $index ]  = 'required|regex:/[0-9 -()+]+$/';
						$rules[ 'emission_exam.' . $index ] = 'required|date';
						$rules[ 'expired_exam.' . $index ]  = 'required|date';
					}
				}

				if ( Request::get('count_family_responsabilities') > 0 )
				{
					foreach (range(0, Request::get('count_family_responsabilities') - 1) as $index)
					{
						$rules[ 'id_family_responsability.' . $index ] = 'required|in:0';
						$rules[ 'name_responsability.' . $index ]      = 'required|max:120';
						$rules[ 'rut_responsability.' . $index ]       = 'required|max:15';
						$rules[ 'relationship_id.' . $index ]          = 'required|regex:/[0-9 -()+]+$/';
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
