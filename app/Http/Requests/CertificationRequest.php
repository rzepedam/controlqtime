<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Routing\Route;

class CertificationRequest extends Request
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
                    'name'              => 'required|max:100|unique:certifications',
                    'institution_id'    => 'required'
                ];
            }

            case 'PUT':
            {
                return [
                    'name'              => 'required|max:100|unique:certifications,name,' . $this->route->getParameter('certifications'),
                    'institution_id'    => 'required'
                ];
            }
        }
    }
}
