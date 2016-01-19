<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Routing\Route;

class TypeInstitutionRequest extends Request
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
                    'name'  => 'required|max:50|unique:type_institutions'
                ];
            }

            case 'PUT':
            {
                return [
                    'name'  => 'required|max:50|unique:type_institutions,name,' . $this->route->getParameter('type_institutions')
                ];
            }
        }
    }
}
