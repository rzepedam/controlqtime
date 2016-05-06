<?php

namespace Controlqtime\Http\Requests;

use Controlqtime\Http\Requests\Forms\SanitizedRequest;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Request;

class CompanyRequest extends SanitizedRequest
{
    protected $route;

    public function __construct(Route $route, Request $request)
    {
        $this->route = $route;
        $this->request = $request;
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
                /*$rules['rut']           = 'required|unique:companies,rut|max:15';
                $rules['firm_name']     = 'required';
                $rules['gyre']          = 'required';
                $rules['start_act']     = 'required';
                $rules['address']       = 'required';
                $rules['commune_id']    = 'required|integer';
                $rules['num']           = 'required|regex:/[0-9 -()+]+$/|digits_between:1,8';
                $rules['lot']           = 'max:20';
                $rules['ofi']           = 'max:5';
                $rules['floor']         = 'regex:/[0-9 -()+]+$/|digits_between:1,3';
                $rules['muni_license']  = 'required|max:50';
                $rules['email']         = 'required|email|unique:companies,email|max:100';
                $rules['phone1']        = 'required|max:20';*/
                $rules['phone2']        = 'max:20';

                /*for ($i = 0; $i < $this->request->get('count_legal_representative'); $i++) {

                    $rules['male_surname.' . $i]    = 'required|max:30';
                    $rules['female_surname'][$i]    = 'required|max:30';
                    $rules['first_name'][$i]        = 'required|max:30';
                    $rules['second_name'][$i]       = 'max:30';
                    $rules['rut_legal'][$i]         = 'required|max:15';
                    $rules['birthday'][$i]          = 'required';
                    $rules['nationality_id'][$i]    = 'required|integer';
                    $rules['email_legal'][$i]       = 'required|email|unique:legal_representatives,email|max:100';
                    $rules['phone1_legal'][$i]      = 'required|max:20';
                    $rules['phone2_legal'][$i]      = 'max:20';

                }

                for ($i = 0; $i < Request::get('count_subsidiary'); $i++) {

                    $rules['address_suc' . $i]      = 'required';
                    $rules['commune_suc_id' . $i]   = 'required|integer';
                    $rules['num_suc' . $i]          = 'required|regex:/[0-9 -()+]+$/|digits_between:1,8';
                    $rules['lot_suc' . $i]          = 'max:20';
                    $rules['ofi_suc' . $i]          = 'max:5';
                    $rules['floor_suc' . $i]        = 'regex:/[0-9 -()+]+$/|digits_between:1,3';
                    $rules['muni_license_suc' . $i] = 'required|max:50';
                    $rules['email_suc' . $i]        = 'required|email|unique:subsidiaries,email|max:100';
                    $rules['phone1_suc-' . $i]      = 'required|max:20';
                    $rules['phone2_suc-' . $i]      = 'max:20';

                }*/

                return $rules;
            }

            case 'PUT':
            {
                /*$rules['rut']          = 'required|max:15|unique:companies,rut,' . $this->route->getParameter('companies');
                $rules['firm_name']    = 'required';
                $rules['gyre']         = 'required';
                $rules['start_act']    = 'required';
                $rules['address']      = 'required';
                $rules['commune_id']   = 'required|integer';
                $rules['num']          = 'required|regex:/[0-9 -()+]+$/|digits_between:1,8';
                $rules['lot']          = 'max:20';
                $rules['ofi']          = 'max:5';
                $rules['floor']        = 'regex:/[0-9 -()+]+$/|digits_between:1,3';
                $rules['muni_license'] = 'required|max:50';
                $rules['email']        = 'required|max:100|email|unique:companies,email,' . $this->route->getParameter('companies');
                $rules['phone1']       = 'required|max:20';*/
                $rules['phone2']       = 'max:20';

                /*for ($i = 0; $i < Request::get('count_legal_representative'); $i++) {

                    $rules['male_surname' . $i]   = 'required|max:30';
                    $rules['female_surname' . $i] = 'required|max:30';
                    $rules['first_name' . $i]     = 'required|max:30';
                    $rules['second_name' . $i]    = 'max:30';
                    $rules['rut' . $i]            = 'required|max:15';
                    $rules['birthday' . $i]       = 'required';
                    $rules['nationality_id' . $i] = 'required|integer';
                    $rules['email' . $i]          = 'required|max:100|email|unique:legal_representatives,email,' . Request::get('id' . $i);
                    $rules['phone1-' . $i]        = 'required|max:20';
                    $rules['phone2-' . $i]        = 'max:20';

                }

                for ($i = 0; $i < Request::get('count_subsidiary'); $i++) {

                    $rules['address_suc' . $i]      = 'required';
                    $rules['commune_suc_id' . $i]   = 'required|integer';
                    $rules['num_suc' . $i]          = 'required|regex:/[0-9 -()+]+$/|digits_between:1,8';
                    $rules['lot_suc' . $i]          = 'max:20';
                    $rules['ofi_suc' . $i]          = 'max:5';
                    $rules['floor_suc' . $i]        = 'regex:/[0-9 -()+]+$/|digits_between:1,3';
                    $rules['muni_license_suc' . $i] = 'required|max:50';
                    $rules['email_suc' . $i]        = 'required|max:100|email|unique:subsidiaries,email,' . Request::get('id_suc' . $i);
                    $rules['phone1_suc-' . $i]      = 'required|max:20';
                    $rules['phone2_suc-' . $i]      = 'max:20';

                }*/

                return $rules;
            }
        }
    }
}
