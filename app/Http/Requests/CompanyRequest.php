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
                $rules['rut']          = 'required|unique:companies,rut';
                $rules['firm_name']    = 'required';
                $rules['gyre']         = 'required';
                $rules['start_act']    = 'required';
                $rules['address']      = 'required';
                $rules['commune_id']   = 'required|integer';
                $rules['num']          = 'required|integer';
                $rules['floor']        = 'integer';
                $rules['muni_license'] = 'required';
                $rules['email']        = 'required|email|unique:companies,email';
                $rules['phone1']       = 'required';

                for ($i = 0; $i < Request::get('count_legal_representative'); $i++){

                    $rules['male_surname' . $i]   = 'required';
                    $rules['female_surname' . $i] = 'required';
                    $rules['first_name' . $i]     = 'required';
                    $rules['rut' . $i]            = 'required';
                    $rules['country_id' . $i]     = 'required|integer';
                    $rules['email' . $i]          = 'required|email|unique:legal_representatives,email';
                    $rules['phone1-' . $i]        = 'required';
                    $rules['phone2-' . $i]        = 'required';

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
