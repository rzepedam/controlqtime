<?php

namespace App\Http\Requests;

use App\Http\Requests\Forms\SanitizedRequest;
use Illuminate\Routing\Route;

class Step1Request extends SanitizedRequest
{
    public function __construct(Route $route)
    {
        $this->route = $route;
    }

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

                $rules['male_surname']      = 'required|max:30';
                $rules['female_surname']    = 'required|max:30';
                $rules['first_name']        = 'required|max:30';
                $rules['second_name']       = 'max:30';
                $rules['rut']               = 'required|max:15';
                $rules['birthday']          = 'required|date';
                $rules['nationality_id']    = 'required|regex:/[0-9 -()+]+$/';
                $rules['gender_id']         = 'required|regex:/[0-9 -()+]+$/';
                $rules['address']           = 'required';
                $rules['region_id']         = 'required|regex:/[0-9 -()+]+$/';
                $rules['province_id']       = 'required|regex:/[0-9 -()+]+$/';
                $rules['commune_id']        = 'required|regex:/[0-9 -()+]+$/';
                $rules['email']             = 'required|email|max:100|unique:manpowers';
                $rules['phone1']            = 'required|max:20';
                $rules['phone2']            = 'max:20';
                $rules['forecast_id']       = 'required|regex:/[0-9 -()+]+$/';
                $rules['mutuality_id']      = 'required|regex:/[0-9 -()+]+$/';
                $rules['pension_id']        = 'required|regex:/[0-9 -()+]+$/';
                $rules['company_id']        = 'required|regex:/[0-9 -()+]+$/';
                $rules['rating_id']         = 'required|regex:/[0-9 -()+]+$/';
                $rules['area_id']           = 'required|regex:/[0-9 -()+]+$/';
                $rules['code_internal']     = 'required';

                for ($i = 0; $i < Request::get('count_family_relationships'); $i++) {
                    $rules['relationship_id' . $i]       = 'required|regex:/[0-9 -()+]+$/';
                    $rules['manpower_family_id' . $i]    = 'required|regex:/[0-9 -()+]+$/';
                }
                
                return $rules;

            }


            case 'PUT': {
                
                $rules['male_surname']      = 'required|max:30';
                $rules['female_surname']    = 'required|max:30';
                $rules['first_name']        = 'required|max:30';
                $rules['second_name']       = 'max:30';
                $rules['rut']               = 'required|max:15';
                $rules['birthday']          = 'required|date';
                $rules['nationality_id']    = 'required|regex:/[0-9 -()+]+$/';
                $rules['gender_id']         = 'required|regex:/[0-9 -()+]+$/';
                $rules['address']           = 'required';
                $rules['region_id']         = 'required|regex:/[0-9 -()+]+$/';
                $rules['province_id']       = 'required|regex:/[0-9 -()+]+$/';
                $rules['commune_id']        = 'required|regex:/[0-9 -()+]+$/';
                $rules['email']             = 'required|email|max:100|unique:manpowers,email,' . $this->id;
                $rules['phone1']            = 'required|max:20';
                $rules['phone2']            = 'max:20';
                $rules['forecast_id']       = 'required|regex:/[0-9 -()+]+$/';
                $rules['mutuality_id']      = 'required|regex:/[0-9 -()+]+$/';
                $rules['pension_id']        = 'required|regex:/[0-9 -()+]+$/';
                $rules['company_id']        = 'required|regex:/[0-9 -()+]+$/';
                $rules['rating_id']         = 'required|regex:/[0-9 -()+]+$/';
                $rules['area_id']           = 'required|regex:/[0-9 -()+]+$/';
                $rules['code_internal']     = 'required';
                
                for ($i = 0; $i < Request::get('count_family_relationships'); $i++) {
                    $rules['relationship_id' . $i]       = 'required|regex:/[0-9 -()+]+$/';
                    $rules['manpower_family_id' . $i]    = 'required|regex:/[0-9 -()+]+$/';
                }

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
