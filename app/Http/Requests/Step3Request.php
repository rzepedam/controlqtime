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
				if ( Request::get('count_disabilities') > 0 )
				{
					foreach (range(0, Request::get('count_disabilities') - 1) as $index)
					{
						$rules[ 'id_disability.' . $index ]       = 'required|in:0';
						$rules[ 'type_disability_id.' . $index ]  = 'required|regex:/[0-9 -()+]+$/';
						$rules[ 'treatment_disability' . $index ] = 'required|in:0,1';
					}
				}

				if ( Request::get('count_diseases') > 0 )
				{
					foreach (range(0, Request::get('count_diseases') - 1) as $index)
					{
						$rules[ 'id_disease.' . $index ]       = 'required|in:0';
						$rules[ 'type_disease_id.' . $index ]  = 'required|regex:/[0-9 -()+]+$/';
						$rules[ 'treatment_disease' . $index ] = 'required|in:0,1';
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
						$rules[ 'rut_responsability.' . $index ]       = 'required|max:15|unique:family_responsabilities,rut_responsability';
						$rules[ 'relationship_id.' . $index ]          = 'required|regex:/[0-9 -()+]+$/';
					}
				}

				/*
				 * Inicializamos rules en caso de no entrar en un if
			 	 */

				if ( Request::get('count_disabilities') + Request::get('count_diseases') + Request::get('count_exams') + Request::get('count_family_responsabilities') == 0 )
					$rules = [
						'success' => 'OK'
					];

				return $rules;

			}

			case 'PUT':
			{
				if ( Request::get('count_disabilities') > 0 )
				{
					foreach (range(0, Request::get('count_disabilities') - 1) as $index)
					{
						$rules[ 'id_disability.' . $index ]       = 'required|regex:/[0-9 -()+]+$/';
						$rules[ 'type_disability_id.' . $index ]  = 'required|regex:/[0-9 -()+]+$/';
						$rules[ 'treatment_disability' . $index ] = 'required|in:0,1';
					}
				}

				if ( Request::get('count_diseases') > 0 )
				{
					foreach (range(0, Request::get('count_diseases') - 1) as $index)
					{
						$rules[ 'id_disease.' . $index ]       = 'required|regex:/[0-9 -()+]+$/';
						$rules[ 'type_disease_id.' . $index ]  = 'required|regex:/[0-9 -()+]+$/';
						$rules[ 'treatment_disease' . $index ] = 'required|in:0,1';
					}
				}

				if ( Request::get('count_exams') > 0 )
				{
					foreach (range(0, Request::get('count_exams') - 1) as $index)
					{
						$rules[ 'id_exam.' . $index ]       = 'required|regex:/[0-9 -()+]+$/';
						$rules[ 'type_exam_id.' . $index ]  = 'required|regex:/[0-9 -()+]+$/';
						$rules[ 'emission_exam.' . $index ] = 'required|date';
						$rules[ 'expired_exam.' . $index ]  = 'required|date';
					}
				}

				if ( Request::get('count_family_responsabilities') > 0 )
				{
					foreach (range(0, Request::get('count_family_responsabilities') - 1) as $index)
					{
						$rules[ 'id_family_responsability.' . $index ] = 'required|regex:/[0-9 -()+]+$/';
						$rules[ 'name_responsability.' . $index ]      = 'required|max:120';
						
						if (Request::get('id_family_responsability')[$index] == 0)
							$rules[ 'rut_responsability.' . $index ]       = 'required|max:15|unique:family_responsabilities,rut_responsability';
						else
							$rules[ 'rut_responsability.' . $index ]       = 'required|max:15|unique:family_responsabilities,rut_responsability,' . Request::get('id_family_responsability')[$index];

						$rules[ 'relationship_id.' . $index ]          = 'required|regex:/[0-9 -()+]+$/';
					}
				}

				/*
				 * Inicializamos rules en caso de no entrar en un if
				 */

				if ( Request::get('count_disabilities') + Request::get('count_diseases') + Request::get('count_exams') + Request::get('count_family_responsabilities') == 0 )
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

			//Disabilities
			'id_disability.0.required'						=> 'El campo ID Discapacidad 1 es obligatorio.',
			'id_disability.1.required'						=> 'El campo ID Discapacidad 2 es obligatorio.',
			'id_disability.2.required'						=> 'El campo ID Discapacidad 3 es obligatorio.',
			'id_disability.3.required'						=> 'El campo ID Discapacidad 4 es obligatorio.',
			'id_disability.4.required'						=> 'El campo ID Discapacidad 5 es obligatorio.',
			'id_disability.0.in'							=> 'El campo ID Discapacidad 1 es inválido.',
			'id_disability.1.in'							=> 'El campo ID Discapacidad 2 es inválido.',
			'id_disability.2.in'							=> 'El campo ID Discapacidad 3 es inválido.',
			'id_disability.3.in'							=> 'El campo ID Discapacidad 4 es inválido.',
			'id_disability.4.in'							=> 'El campo ID Discapacidad 5 es inválido.',
			'id_disability.0.regex'							=> 'El formato de ID Discapacidad 1 es inválido.',
			'id_disability.1.regex'							=> 'El formato de ID Discapacidad 2 es inválido.',
			'id_disability.2.regex'							=> 'El formato de ID Discapacidad 3 es inválido.',
			'id_disability.3.regex'							=> 'El formato de ID Discapacidad 4 es inválido.',
			'id_disability.4.regex'							=> 'El formato de ID Discapacidad 5 es inválido.',
			'type_disability_id.0.required'					=> 'El campo Tipo Discapacidad 1 es obligatorio.',
			'type_disability_id.1.required'					=> 'El campo Tipo Discapacidad 2 es obligatorio.',
			'type_disability_id.2.required'					=> 'El campo Tipo Discapacidad 3 es obligatorio.',
			'type_disability_id.3.required'					=> 'El campo Tipo Discapacidad 4 es obligatorio.',
			'type_disability_id.4.required'					=> 'El campo Tipo Discapacidad 5 es obligatorio.',
			'type_disability_id.0.regex'					=> 'El formato de Tipo Discapacidad 1 es inválido.',
			'type_disability_id.1.regex'					=> 'El formato de Tipo Discapacidad 2 es inválido.',
			'type_disability_id.2.regex'					=> 'El formato de Tipo Discapacidad 3 es inválido.',
			'type_disability_id.3.regex'					=> 'El formato de Tipo Discapacidad 4 es inválido.',
			'type_disability_id.4.regex'					=> 'El formato de Tipo Discapacidad 5 es inválido.',
			'treatment_disability0.required'				=> 'El campo Está en tratamiento? 1 es obligatorio.',
			'treatment_disability1.required'				=> 'El campo Está en tratamiento? 2 es obligatorio.',
			'treatment_disability2.required'				=> 'El campo Está en tratamiento? 3 es obligatorio.',
			'treatment_disability3.required'				=> 'El campo Está en tratamiento? 4 es obligatorio.',
			'treatment_disability4.required'				=> 'El campo Está en tratamiento? 5 es obligatorio.',
			'treatment_disability0.in'						=> 'El campo Está en tratamiento? 1 es inválido.',
			'treatment_disability1.in'						=> 'El campo Está en tratamiento? 2 es inválido.',
			'treatment_disability2.in'						=> 'El campo Está en tratamiento? 3 es inválido.',
			'treatment_disability3.in'						=> 'El campo Está en tratamiento? 4 es inválido.',
			'treatment_disability4.in'						=> 'El campo Está en tratamiento? 5 es inválido.',

			//Diseases
			'id_disease.0.required'						=> 'El campo ID Enfermedad 1 es obligatorio.',
			'id_disease.1.required'						=> 'El campo ID Enfermedad 2 es obligatorio.',
			'id_disease.2.required'						=> 'El campo ID Enfermedad 3 es obligatorio.',
			'id_disease.3.required'						=> 'El campo ID Enfermedad 4 es obligatorio.',
			'id_disease.4.required'						=> 'El campo ID Enfermedad 5 es obligatorio.',
			'id_disease.0.in'							=> 'El campo ID Enfermedad 1 es inválido.',
			'id_disease.1.in'							=> 'El campo ID Enfermedad 2 es inválido.',
			'id_disease.2.in'							=> 'El campo ID Enfermedad 3 es inválido.',
			'id_disease.3.in'							=> 'El campo ID Enfermedad 4 es inválido.',
			'id_disease.4.in'							=> 'El campo ID Enfermedad 5 es inválido.',
			'id_disease.0.regex'						=> 'El formato de ID Enfermedad 1 es inválido.',
			'id_disease.1.regex'						=> 'El formato de ID Enfermedad 2 es inválido.',
			'id_disease.2.regex'						=> 'El formato de ID Enfermedad 3 es inválido.',
			'id_disease.3.regex'						=> 'El formato de ID Enfermedad 4 es inválido.',
			'id_disease.4.regex'						=> 'El formato de ID Enfermedad 5 es inválido.',
			'type_disease_id.0.required'				=> 'El campo Tipo Enfermedad 1 es obligatorio.',
			'type_disease_id.1.required'				=> 'El campo Tipo Enfermedad 2 es obligatorio.',
			'type_disease_id.2.required'				=> 'El campo Tipo Enfermedad 3 es obligatorio.',
			'type_disease_id.3.required'				=> 'El campo Tipo Enfermedad 4 es obligatorio.',
			'type_disease_id.4.required'				=> 'El campo Tipo Enfermedad 5 es obligatorio.',
			'type_disease_id.0.regex'					=> 'El formato de Tipo Enfermedad 1 es inválido.',
			'type_disease_id.1.regex'					=> 'El formato de Tipo Enfermedad 2 es inválido.',
			'type_disease_id.2.regex'					=> 'El formato de Tipo Enfermedad 3 es inválido.',
			'type_disease_id.3.regex'					=> 'El formato de Tipo Enfermedad 4 es inválido.',
			'type_disease_id.4.regex'					=> 'El formato de Tipo Enfermedad 5 es inválido.',
			'treatment_disease0.required'				=> 'El campo Está en tratamiento? 1 es obligatorio.',
			'treatment_disease1.required'				=> 'El campo Está en tratamiento? 2 es obligatorio.',
			'treatment_disease2.required'				=> 'El campo Está en tratamiento? 3 es obligatorio.',
			'treatment_disease3.required'				=> 'El campo Está en tratamiento? 4 es obligatorio.',
			'treatment_disease4.required'				=> 'El campo Está en tratamiento? 5 es obligatorio.',
			'treatment_disease0.in'						=> 'El campo Está en tratamiento? 1 es inválido.',
			'treatment_disease1.in'						=> 'El campo Está en tratamiento? 2 es inválido.',
			'treatment_disease2.in'						=> 'El campo Está en tratamiento? 3 es inválido.',
			'treatment_disease3.in'						=> 'El campo Está en tratamiento? 4 es inválido.',
			'treatment_disease4.in'						=> 'El campo Está en tratamiento? 5 es inválido.',

			//Exams
			'id_exam.0.required'						=> 'El campo ID Examen Preocupacional 1 es obligatorio.',
			'id_exam.1.required'						=> 'El campo ID Examen Preocupacional 2 es obligatorio.',
			'id_exam.2.required'						=> 'El campo ID Examen Preocupacional 3 es obligatorio.',
			'id_exam.3.required'						=> 'El campo ID Examen Preocupacional 4 es obligatorio.',
			'id_exam.4.required'						=> 'El campo ID Examen Preocupacional 5 es obligatorio.',
			'id_exam.0.in'								=> 'El campo ID Examen Preocupacional 1 es inválido.',
			'id_exam.1.in'								=> 'El campo ID Examen Preocupacional 2 es inválido.',
			'id_exam.2.in'								=> 'El campo ID Examen Preocupacional 3 es inválido.',
			'id_exam.3.in'								=> 'El campo ID Examen Preocupacional 4 es inválido.',
			'id_exam.4.in'								=> 'El campo ID Examen Preocupacional 5 es inválido.',
			'id_exam.0.regex'							=> 'El formato de ID Examen Preocupacional 1 es inválido.',
			'id_exam.1.regex'							=> 'El formato de ID Examen Preocupacional 2 es inválido.',
			'id_exam.2.regex'							=> 'El formato de ID Examen Preocupacional 3 es inválido.',
			'id_exam.3.regex'							=> 'El formato de ID Examen Preocupacional 4 es inválido.',
			'id_exam.4.regex'							=> 'El formato de ID Examen Preocupacional 5 es inválido.',
			'type_exam_id.0.required'					=> 'El campo Tipo Examen Preocupacional 1 es obligatorio.',
			'type_exam_id.1.required'					=> 'El campo Tipo Examen Preocupacional 2 es obligatorio.',
			'type_exam_id.2.required'					=> 'El campo Tipo Examen Preocupacional 3 es obligatorio.',
			'type_exam_id.3.required'					=> 'El campo Tipo Examen Preocupacional 4 es obligatorio.',
			'type_exam_id.4.required'					=> 'El campo Tipo Examen Preocupacional 5 es obligatorio.',
			'type_exam_id.0.regex'						=> 'El formato de Tipo Examen Preocupacional 1 es inválido.',
			'type_exam_id.1.regex'						=> 'El formato de Tipo Examen Preocupacional 2 es inválido.',
			'type_exam_id.2.regex'						=> 'El formato de Tipo Examen Preocupacional 3 es inválido.',
			'type_exam_id.3.regex'						=> 'El formato de Tipo Examen Preocupacional 4 es inválido.',
			'type_exam_id.4.regex'						=> 'El formato de Tipo Examen Preocupacional 5 es inválido.',
			'emission_exam.0.required'					=> 'El campo Fecha Emisión Enfermedad 1 es obligatorio.',
			'emission_exam.1.required'					=> 'El campo Fecha Emisión Enfermedad 2 es obligatorio.',
			'emission_exam.2.required'					=> 'El campo Fecha Emisión Enfermedad 3 es obligatorio.',
			'emission_exam.3.required'					=> 'El campo Fecha Emisión Enfermedad 4 es obligatorio.',
			'emission_exam.4.required'					=> 'El campo Fecha Emisión Enfermedad 5 es obligatorio.',
			'emission_exam.0.date'						=> 'El campo Fecha Emisión Enfermedad 1 no es una fecha válida.',
			'emission_exam.1.date'						=> 'El campo Fecha Emisión Enfermedad 2 no es una fecha válida.',
			'emission_exam.2.date'						=> 'El campo Fecha Emisión Enfermedad 3 no es una fecha válida.',
			'emission_exam.3.date'						=> 'El campo Fecha Emisión Enfermedad 4 no es una fecha válida.',
			'emission_exam.4.date'						=> 'El campo Fecha Emisión Enfermedad 5 no es una fecha válida.',
			'expired_exam.0.required'					=> 'El campo Fecha Expiración Enfermedad 1 es obligatorio.',
			'expired_exam.1.required'					=> 'El campo Fecha Expiración Enfermedad 2 es obligatorio.',
			'expired_exam.2.required'					=> 'El campo Fecha Expiración Enfermedad 3 es obligatorio.',
			'expired_exam.3.required'					=> 'El campo Fecha Expiración Enfermedad 4 es obligatorio.',
			'expired_exam.4.required'					=> 'El campo Fecha Expiración Enfermedad 5 es obligatorio.',
			'expired_exam.0.date'						=> 'El campo Fecha Expiración Enfermedad 1 no es una fecha válida.',
			'expired_exam.1.date'						=> 'El campo Fecha Expiración Enfermedad 2 no es una fecha válida.',
			'expired_exam.2.date'						=> 'El campo Fecha Expiración Enfermedad 3 no es una fecha válida.',
			'expired_exam.3.date'						=> 'El campo Fecha Expiración Enfermedad 4 no es una fecha válida.',
			'expired_exam.4.date'						=> 'El campo Fecha Expiración Enfermedad 5 no es una fecha válida.',

			//Family responsabilities
			'id_family_responsability.0.required'	=> 'El campo ID Carga Familiar 1 es obligatorio.',
			'id_family_responsability.1.required'	=> 'El campo ID Carga Familiar 2 es obligatorio.',
			'id_family_responsability.2.required'	=> 'El campo ID Carga Familiar 3 es obligatorio.',
			'id_family_responsability.3.required'	=> 'El campo ID Carga Familiar 4 es obligatorio.',
			'id_family_responsability.4.required'	=> 'El campo ID Carga Familiar 5 es obligatorio.',
			'id_family_responsability.0.in'			=> 'El campo ID Carga Familiar 1 es inválido.',
			'id_family_responsability.1.in'			=> 'El campo ID Carga Familiar 2 es inválido.',
			'id_family_responsability.2.in'			=> 'El campo ID Carga Familiar 3 es inválido.',
			'id_family_responsability.3.in'			=> 'El campo ID Carga Familiar 4 es inválido.',
			'id_family_responsability.4.in'			=> 'El campo ID Carga Familiar 5 es inválido.',
			'id_family_responsability.0.regex'		=> 'El formato de ID Carga Familiar 1 es inválido.',
			'id_family_responsability.1.regex'		=> 'El formato de ID Carga Familiar 2 es inválido.',
			'id_family_responsability.2.regex'		=> 'El formato de ID Carga Familiar 3 es inválido.',
			'id_family_responsability.3.regex'		=> 'El formato de ID Carga Familiar 4 es inválido.',
			'id_family_responsability.4.regex'		=> 'El formato de ID Carga Familiar 5 es inválido.',
			'name_responsability.0.required'	   	=> 'El campo Nombre Completo Carga Familiar 1 es obligatorio.',
			'name_responsability.1.required'	   	=> 'El campo Nombre Completo Carga Familiar 2 es obligatorio.',
			'name_responsability.2.required'	  	=> 'El campo Nombre Completo Carga Familiar 3 es obligatorio.',
			'name_responsability.3.required'    	=> 'El campo Nombre Completo Carga Familiar 4 es obligatorio.',
			'name_responsability.4.required'    	=> 'El campo Nombre Completo Carga Familiar 5 es obligatorio.',
			'name_responsability.0.max'		    	=> 'El campo Nombre Completo Carga Familiar 1 no debe ser mayor que 120 caracteres.',
			'name_responsability.1.max'		    	=> 'El campo Nombre Completo Carga Familiar 2 no debe ser mayor que 120 caracteres.',
			'name_responsability.2.max'		    	=> 'El campo Nombre Completo Carga Familiar 3 no debe ser mayor que 120 caracteres.',
			'name_responsability.3.max'		    	=> 'El campo Nombre Completo Carga Familiar 4 no debe ser mayor que 120 caracteres.',
			'name_responsability.4.max'		    	=> 'El campo Nombre Completo Carga Familiar 5 no debe ser mayor que 120 caracteres.',
			'rut_responsability.0.required'	    	=> 'El campo Rut Carga Familiar 1 es obligatorio.',
			'rut_responsability.1.required'	    	=> 'El campo Rut Carga Familiar 2 es obligatorio.',
			'rut_responsability.2.required'	    	=> 'El campo Rut Carga Familiar 3 es obligatorio.',
			'rut_responsability.3.required'	    	=> 'El campo Rut Carga Familiar 4 es obligatorio.',
			'rut_responsability.4.required'	    	=> 'El campo Rut Carga Familiar 5 es obligatorio.',
			'rut_responsability.0.max'		    	=> 'El campo Rut Carga Familiar 1 no debe ser mayor que 15 caracteres.',
			'rut_responsability.1.max'		    	=> 'El campo Rut Carga Familiar 2 no debe ser mayor que 15 caracteres.',
			'rut_responsability.2.max'		    	=> 'El campo Rut Carga Familiar 3 no debe ser mayor que 15 caracteres.',
			'rut_responsability.3.max'		    	=> 'El campo Rut Carga Familiar 4 no debe ser mayor que 15 caracteres.',
			'rut_responsability.4.max'		    	=> 'El campo Rut Carga Familiar 5 no debe ser mayor que 15 caracteres.',
			'rut_responsability.0.unique'			=> 'El campo Rut Carga Familiar 1 ya ha sido registrado.',
			'rut_responsability.1.unique'			=> 'El campo Rut Carga Familiar 2 ya ha sido registrado.',
			'rut_responsability.2.unique'			=> 'El campo Rut Carga Familiar 3 ya ha sido registrado.',
			'rut_responsability.3.unique'			=> 'El campo Rut Carga Familiar 4 ya ha sido registrado.',
			'rut_responsability.4.unique'			=> 'El campo Rut Carga Familiar 5 ya ha sido registrado.',
			'relationship_id.0.required' 			=> 'El campo Relación Carga Familiar 1 es obligatorio.',
			'relationship_id.1.required' 			=> 'El campo Relación Carga Familiar 2 es obligatorio.',
			'relationship_id.2.required' 			=> 'El campo Relación Carga Familiar 3 es obligatorio.',
			'relationship_id.3.required' 			=> 'El campo Relación Carga Familiar 4 es obligatorio.',
			'relationship_id.4.required' 			=> 'El campo Relación Carga Familiar 5 es obligatorio.',
			'relationship_id.0.regex' 				=> 'El formato de Relación Carga Familiar 1 es inválido.',
			'relationship_id.1.regex' 				=> 'El formato de Relación Carga Familiar 2 es inválido.',
			'relationship_id.2.regex' 				=> 'El formato de Relación Carga Familiar 3 es inválido.',
			'relationship_id.3.regex' 				=> 'El formato de Relación Carga Familiar 4 es inválido.',
			'relationship_id.4.regex' 				=> 'El formato de Relación Carga Familiar 5 es inválido.',

		];
	}

}
