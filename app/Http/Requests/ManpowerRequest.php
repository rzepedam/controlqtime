<?php

namespace App\Http\Requests;

use App\Http\Requests\Forms\SanitizedRequest;
use Illuminate\Routing\Route;

class ManpowerRequest extends SanitizedRequest
{
    public function __construct(Route $route)
    {
        $this->route = $route;
    }

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        switch($this->method())
        {
            case 'POST':
            {
                return [
                    'male_surname'      => 'required|max:30',
                    'female_surname'    => 'required|max:30',
                    'first_name'        => 'required|max:30',
                    'second_name'       => 'max:30',
                    'rut'               => 'required|max:15',
                    'birthday'          => 'required',
                    'country_id'        => 'required|regex:/[0-9 -()+]+$/',
                    'gender_id'         => 'required|regex:/[0-9 -()+]+$/',
                    'address'           => 'required',
                    'commune_id'        => 'required|regex:/[0-9 -()+]+$/',
                    'email'             => 'required|email|max:100|unique:manpowers',
                    'phone1'            => 'required|max:20',
                    'phone2'            => 'max:20',
                    'forecast_id'       => 'required|regex:/[0-9 -()+]+$/',
                    'mutuality_id'      => 'required|regex:/[0-9 -()+]+$/',
                    'pension_id'        => 'required|regex:/[0-9 -()+]+$/',
                    'company_id'        => 'required|regex:/[0-9 -()+]+$/',
                    'rating_id'         => 'required|regex:/[0-9 -()+]+$/',
                ];
            }

            case 'PUT':
            {

            }
        }
    }
}
