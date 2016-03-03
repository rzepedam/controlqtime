<?php

namespace App\Http\Requests;

use App\Http\Requests\Forms\SanitizedRequest;
use Illuminate\Routing\Route;

class CompanyRequest extends SanitizedRequest
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
                $rules['rut']          = 'required|unique:companies,rut|max:15';
                $rules['firm_name']    = 'required';
                $rules['gyre']         = 'required';
                $rules['start_act']    = 'required';
                $rules['address']      = 'required';
                $rules['commune_id']   = 'required|integer';
                $rules['num']          = 'required|integer|digits_between:1,8';
                $rules['lot']          = 'max:20';
                $rules['ofi']          = 'max:5';
                $rules['floor']        = 'integer|digits_between:1,3';
                $rules['muni_license'] = 'required|max:50';
                $rules['email']        = 'required|email|unique:companies,email|max:100';
                $rules['phone1']       = 'required|max:20';
                $rules['phone2']       = 'max:20';

                for ($i = 0; $i < Request::get('count_legal_representative'); $i++){

                    $rules['male_surname' . $i]   = 'required|max:30';
                    $rules['female_surname' . $i] = 'required|max:30';
                    $rules['first_name' . $i]     = 'required|max:30';
                    $rules['second_name' . $i]    = 'max:30';
                    $rules['rut' . $i]            = 'required|max:15';
                    $rules['birthday' . $i]       = 'required';
                    $rules['nationality_id' . $i] = 'required|integer';
                    $rules['email' . $i]          = 'required|email|unique:legal_representatives,email|max:100';
                    $rules['phone1-' . $i]        = 'required|max:20';
                    $rules['phone2-' . $i]        = 'max:20';

                }

                return $rules;
            }

            case 'PUT':
            {
                return [

                ];
            }
        }
    }
}
