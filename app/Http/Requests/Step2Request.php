<?php

namespace Controlqtime\Http\Requests;

use Controlqtime\Http\Requests\Forms\SanitizedRequest;

class Step2Request extends SanitizedRequest
{

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
        switch($this->method()) {

            case 'POST': {

                for ($i = 0; $i < Request::get('count_studies'); $i++) {
                    $rules['degree_id' . $i]            = 'required|regex:/[0-9 -()+]+$/';
                    $rules['name_study' . $i]           = 'required|max:100';
                    $rules['institution_study_id' . $i] = 'required|regex:/[0-9 -()+]+$/';
                    $rules['date_obtention' . $i]       = 'required|date';
                }

                for ($i = 0; $i < Request::get('count_certifications'); $i++) {
                    $rules['type_certification_id' . $i]        = 'required|regex:/[0-9 -()+]+$/';
                    $rules['expired_certification' . $i]        = 'required|date';
                    $rules['institution_certification_id' . $i] = 'required|regex:/[0-9 -()+]+$/';
                }

                for ($i = 0; $i < Request::get('count_specialities'); $i++) {
                    $rules['type_speciality_id' . $i]           = 'required|regex:/[0-9 -()+]+$/';
                    $rules['expired_speciality' . $i]           = 'required|date';
                    $rules['institution_speciality_id' . $i]    = 'required|regex:/[0-9 -()+]+$/';
                }
                
                for ($i = 0; $i < Request::get('count_professional_licenses'); $i++) {
                    $rules['type_professional_license_id' . $i] = 'required|regex:/[0-9 -()+]+$/';
                    $rules['emission_license' . $i]             = 'required|date';
                    $rules['expired_license' . $i]              = 'required|date';
                    $rules['is_donor' . $i]                     = 'required';
                }

                /*
                 * Definimos $rules en caso de no entrar en
                 *
                 * alguna de las validaciones anteriores
                 */

                if ($i == 0)
                    $rules = [
                        'success' => 'OK'
                    ];

                return $rules;

            }
        }
    }

    /**
     * @param array $errors
     * @return mixed
     */
    public function response(array $errors)
    {
        if ($this->ajax() || $this->wantsJson()) {
            return response()->json([
                "result" => "error",
                "fields" => $errors
            ]);
        }
    }
}
