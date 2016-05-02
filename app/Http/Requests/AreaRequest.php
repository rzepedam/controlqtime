<?php

namespace Controlqtime\Http\Requests;

use Controlqtime\Http\Requests\Forms\SanitizedRequest;
use Illuminate\Routing\Route;

class AreaRequest extends SanitizedRequest
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
                    //'name'  => 'required|max:50|unique:areas'
                ];
            }

            case 'PUT':
            {
                return [
                    //'name'  => 'required|max:50|unique:areas,name,' . $this->route->getParameter('areas')
                ];
            }
        }
    }
}
