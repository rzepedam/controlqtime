<?php

namespace Controlqtime\Http\Requests;

use Controlqtime\Http\Requests\Forms\SanitizedRequest;
use Illuminate\Routing\Route;

class TypeDiseaseRequest extends SanitizedRequest
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
                    'name'  => 'required|max:120|unique:type_diseases',
                ];
            }

            case 'PUT':
            {
                return [
                    'name'  => 'required|max:120|unique:type_diseases,name,' . $this->route->getParameter('type_disease')
                ];
            }
        }
    }
}
