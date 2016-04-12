<?php

namespace App\Http\Requests;

use App\Http\Requests\Forms\SanitizedRequest;
use Illuminate\Routing\Route;

class TypeSpecialityRequest extends SanitizedRequest
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
                    'name'              => 'required|max:100|unique:type_specialities'
                ];
            }

            case 'PUT':
            {
                return [
                    'name'              => 'required|max:100|unique:type_specialities,name,' . $this->route->getParameter('type_specialities')
                ];
            }
        }
    }
}
