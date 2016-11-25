<?php

namespace Controlqtime\Http\Requests;

use Illuminate\Routing\Route;
use Illuminate\Validation\Rule;
use Controlqtime\Http\Requests\Forms\SanitizedRequest;

class TypeDisabilityRequest extends SanitizedRequest
{
    private $route;

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
                    'name'  => 'required|max:120|unique:type_disabilities,name,NULL,id,deleted_at,NULL',
                ];
            }

            case 'PUT':
            {
                return [
                    'name'  => 'required|max:120|unique:type_disabilities,name,' . $this->route->getParameter('type_disability')
                ];
            }
        }
    }
}
