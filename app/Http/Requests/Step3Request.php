<?php

namespace App\Http\Requests;

use App\Http\Requests\Forms\SanitizedRequest;
use App\Http\Requests\Request;

class Step3Request extends SanitizedRequest
{
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
        switch($this->method()) {

            case 'POST': {

                for ($i = 0; $i < Request::get('count_disabilities'); $i++) {
                    $rules['type_disability_id' . $i] = 'required|regex:/[0-9 -()+]+$/';
                    $rules['treatment_disability' . $i] = 'required';
                }

                for ($i = 0; $i < Request::get('count_diseases'); $i++) {
                    $rules['type_disease_id' . $i] = 'required|regex:/[0-9 -()+]+$/';
                    $rules['treatment_disease' . $i] = 'required';
                }

                for ($i = 0; $i < Request::get('count_exams'); $i++) {
                    $rules['type_exam_id' . $i] = 'required|regex:/[0-9 -()+]+$/';
                    $rules['expired_exam' . $i] = 'required|date';
                }

                for ($i = 0; $i < Request::get('count_family_responsabilities'); $i++) {
                    $rules['name_responsability' . $i] = 'required|max:120';
                    $rules['rut_responsability' . $i] = 'required|max:15';
                    $rules['relationship_id' . $i] = 'required|regex:/[0-9 -()+]+$/';
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
