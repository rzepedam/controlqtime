<?php

namespace Controlqtime\Http\Requests;

use Controlqtime\Http\Requests\Forms\SanitizedRequest;
use Illuminate\Routing\Route;

class LaborUnionRequest extends SanitizedRequest
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
                    'name'  => 'required|unique:labor_unions'
                ];
            }

            case 'PUT':
            {
                return [
                    'name'  => 'required|unique:labor_unions,name,' . $this->route->getParameter('labor_unions')
                ];
            }
        }
    }
}
