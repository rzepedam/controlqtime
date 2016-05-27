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
                $rules = [ 
                    'rut'           => 'required|unique:companies,rut|max:15',
                    'firm_name'     => 'required',
                    'gyre'          => 'required',
                    'start_act'     => 'required|date',
                    'address'       => 'required',
                    'commune_id'    => 'required|integer',
                    'num'           => 'required|regex:/[0-9 -()+]+$/|digits_between:1,8',
                    'lot'           => 'max:20',
                    'bod'           => 'max:5',
                    'ofi'           => 'max:5',
                    'floor'         => 'regex:/[0-9 -()+]+$/|digits_between:1,3',
                    'muni_license'  => 'required|max:50',
                    'phone1'        => 'required|max:20',
                    'phone2'        => 'max:20',
                    'email_company' => 'required|email|unique:companies,email|max:60',
                ];

                if (Request::get('count_legal_representative') > 0)
                {
                    foreach (range(0, Request::get('count_legal_representative') - 1) as $index)
                    {
                        $rules[ 'male_surname.' . $index ]   	= 'required|max:30';
                        $rules[ 'female_surname.' . $index ]    = 'required|max:30';
                        $rules[ 'first_name.' . $index ] 		= 'required|max:30';
                        $rules[ 'second_name.' . $index ] 		= 'max:30';
                        $rules[ 'rut_legal.' . $index ] 		= 'required|max:15|unique:legal_representatives,rut';
                        $rules[ 'birthday.' . $index ] 	    	= 'required|date';
                        $rules[ 'nationality_id.' . $index ] 	= 'required|regex:/[0-9 -()+]+$/';
                        $rules[ 'email_legal.' . $index ] 		= 'required|max:60|email|unique:legal_representatives,email,' . Request::get('id' . $i);
                        $rules[ 'phone1_legal.' . $index ] 		= 'required|max:20';
                        $rules[ 'phone2_legal.' . $index ] 		= 'max:20';
                    }
                }

                return $rules;
            }

            case 'PUT':
            {
                /*

                return $rules;*/
            }
        }
    }
}
