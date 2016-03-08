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

                for ($i = 0; $i < Request::get('count_subsidiary'); $i++) {

                    $rules['phone2_suc-' . $i]      = 'max:20';
                    $rules['phone1_suc-' . $i]      = 'required|max:20';
                    $rules['email_suc' . $i]        = 'required|email|unique:subsidiaries,email|max:100';
                    $rules['muni_license_suc' . $i] = 'required|max:50';
                    $rules['floor_suc' . $i]        = 'integer|digits_between:1,3';
                    $rules['ofi_suc' . $i]          = 'max:5';
                    $rules['lot_suc' . $i]          = 'max:20';
                    $rules['num_suc' . $i]          = 'required|integer|digits_between:1,8';
                    $rules['commune_suc_id' . $i]   = 'required|integer';
                    $rules['address_suc' . $i]      = 'required';

                }

                for ($i = 0; $i < Request::get('count_legal_representative'); $i++) {

                    $rules['phone2-' . $i]        = 'max:20';
                    $rules['phone1-' . $i]        = 'required|max:20';
                    $rules['email' . $i]          = 'required|email|unique:legal_representatives,email|max:100';
                    $rules['nationality_id' . $i] = 'required|integer';
                    $rules['birthday' . $i]       = 'required';
                    $rules['rut' . $i]            = 'required|max:15';
                    $rules['second_name' . $i]    = 'max:30';
                    $rules['first_name' . $i]     = 'required|max:30';
                    $rules['female_surname' . $i] = 'required|max:30';
                    $rules['male_surname' . $i]   = 'required|max:30';

                }

                $rules['phone2']       = 'max:20';
                $rules['phone1']       = 'required|max:20';
                $rules['email']        = 'required|email|unique:companies,email|max:100';
                $rules['muni_license'] = 'required|max:50';
                $rules['floor']        = 'integer|digits_between:1,3';
                $rules['ofi']          = 'max:5';
                $rules['lot']          = 'max:20';
                $rules['num']          = 'required|integer|digits_between:1,8';
                $rules['commune_id']   = 'required|integer';
                $rules['address']      = 'required';
                $rules['start_act']    = 'required';
                $rules['gyre']         = 'required';
                $rules['firm_name']    = 'required';
                $rules['rut']          = 'required|unique:companies,rut|max:15';

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
